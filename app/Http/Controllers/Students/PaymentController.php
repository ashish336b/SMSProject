<?php

namespace App\Http\Controllers\Students;

use App\Admin;
use App\Notifications\SchoolFeePaid;
use App\Paypal\Paypal;
use App\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use App\Model\Payment as PaymentRecord;

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
            $payment = Payment::get($paymentId, $paypal->apiContext);

            $execution = new PaymentExecution();
            $execution->setPayerId($request->PayerID);
            $result = $payment->execute($execution, $paypal->apiContext);
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
                        'isFeePaid' => 1
                    ]);
                    if ($updateStudentRecord) {
                        $invoice = PaymentRecord::where('paymentId', $request->paymentId)->first();
                        Notification::send(Admin::all(), new SchoolFeePaid($invoice));
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
