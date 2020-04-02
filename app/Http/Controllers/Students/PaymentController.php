<?php

namespace App\Http\Controllers\Students;

use App\Paypal\Paypal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

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
             if ($result)
             {
                 return redirect(route('students.payment'))->with('success', 'Payment Made Successfully');
//                 echo  $result->toJSON();
                 //logic here
             }
        }
    }

    public function createPayment()
    {
        $paypal = new Paypal();
        return redirect($paypal->createPayment());
    }
}
