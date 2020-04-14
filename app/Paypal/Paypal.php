<?php
namespace App\Paypal;

use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class Paypal
{
    public $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('paypal.studentFeePayment.client_id'),     // ClientID
                config('paypal.studentFeePayment.client_secret')      // ClientSecret
            )
        );
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
        return $approvalUrl;
    }

}
