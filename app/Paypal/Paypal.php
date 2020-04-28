<?php
namespace App\Paypal;

use Exception;
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;

class Paypal
{
    public $apiContext;

    public function __construct()
    {
        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('paypal.studentFeePayment.client_id'), // ClientID
                config('paypal.studentFeePayment.client_secret') // ClientSecret
            )
        );
        $this->apiContext->setConfig([
            'log.LogEnabled' => true,
            'log.FileName' => 'PayPal.log',
            'log.LogLevel' => 'DEBUG',
            'http.ConnectionTimeOut' => 30,
        ]);
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
            ->setCancelUrl(url('/students/payment/executePayment?success=false'));

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->apiContext);
        } catch (PayPalConnectionException $ex) {
            die("Internet is Quiet Slow Please Refresh Again or Try again. Transation is Not completed");
        } catch (Exception $ex) {
            die("Internet is Quiet Slow Please Refresh Again or Try again. Transation is Not completed");
        }
        $approvalUrl = $payment->getApprovalLink();
        return $approvalUrl;
    }

}
