<?php

namespace App\Http\Controllers\Students;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\Payment as PaymentRecord;
use App\Notifications\SchoolFeePaid;
use App\Paypal\Paypal;
use App\Students;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;

class PaymentController extends Controller
{
    public function index()
    {
        return view("students.payment.index");
    }

    public function executePayment(Request $request)
    {
        $paypal = new Paypal();
        if ($request->has('success') && $request->success == 'true') {
            $paymentId = $request->paymentId;
            try {
                $payment = Payment::get($paymentId, $paypal->apiContext);
            } catch (PayPalConnectionException $ex) {
                die("Internet is Quiet Slow Please Refresh Again.");
            } catch (Exception $ex) {
                die("Internet is Quiet Slow Please Refresh Again.");
            }
            $execution = new PaymentExecution();
            $execution->setPayerId($request->PayerID);
            try {
                $result = $payment->execute($execution, $paypal->apiContext);
            } catch (PayPalConnectionException $ex) {
                die("Internet is Quiet Slow Please Refresh Again or Try again. Transation is Not completed");
            } catch (Exception $ex) {
                die("Internet is Quiet Slow Please Refresh Again or Try again. Transation is Not completed");
            }
            if ($result) {
                $makePaymentRecord = PaymentRecord::create([
                    'paymentId' => $paymentId,
                    'payerId' => $request->PayerID,
                    'students_id' => Auth::user()->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
                if ($makePaymentRecord) {
                    $updateStudentRecord = Students::where('id', Auth::user()->id)->update([
                        'isFeePaid' => 1,
                    ]);
                    if ($updateStudentRecord) {
                        $invoice = PaymentRecord::where('paymentId', $request->paymentId)->first();
                        $notificationMessage = Auth::user()->firstName . " " . Auth::user()->lastName . " Paid School Fee";
                        Notification::send(Admin::all(), new SchoolFeePaid($invoice, $notificationMessage, '$4000'));
                        return redirect(route('students.payment'))->with('success', 'Payment Made Successfully');
                    }
                }
            }
        }
        return null;
    }

    public function createPayment()
    {
        $checkifPaidAlready = Students::where('id', Auth::user()->id)->first();
        if ($checkifPaidAlready->isFeePaid) {
            return redirect(route('students.payment'))->with('success', 'Payment is Already Made. No need to Pay');
        }
        $paypal = new Paypal();
        return redirect($paypal->createPayment());
    }
}
