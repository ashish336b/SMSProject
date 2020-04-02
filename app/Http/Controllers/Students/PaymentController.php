<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaymentController extends Controller
{
    public $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AeEwKTEsfKC5y7pxN5mJVOVL22xzEtIQfGQwGR_clWktSJfJoqjxGEygBMfKFvCtJcx7F27EO61GweLb',     // ClientID
                'EIuQDgRENQfwFHvl6NT2BoZjJ2U7ZGQAjiSY1Oh3bIPI7ItOhNEgXRTXkxpB6xBYbBi4aodK9Abx3g9f'      // ClientSecret
            )
        );
    }

    public function index()
    {
        return view("students.payment.index");
    }

    public function executePayment(Request $request)
    {
        if ($request->has('success') && $request->success == 'true') {
            $paymentId = $request->paymentId;
            $payment = Payment::get($paymentId, $this->apiContext);

            $execution = new PaymentExecution();
            $execution->setPayerId($request->PayerID);
            $result = $payment->execute($execution, $this->apiContext);
             if ($result)
             {
                 echo  $result->toJSON();
                 //logic here
             }
        }
    }

    public function createPayment()
    {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item1 = new Item();
        $item1->setName('School Fee')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice(4000);

        $itemList = new ItemList();
        $itemList->setItems(array($item1));


        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(4000);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Your School Fee Payment")
            ->setInvoiceNumber(uniqid());

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(url('/students/payment/executePayment?success=true'))
            ->setCancelUrl(url('/executePayment?success=false'));

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $payment->create($this->apiContext);
        $approvalUrl = $payment->getApprovalLink();
        return redirect($approvalUrl);
    }
}
