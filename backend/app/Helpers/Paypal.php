<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentCard;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Exception\PayPalConnectionException;

class Paypal
{
    /**
     * PayPal api context
     */
    private $_api_context;

    
  /**
   * Paypal constructor.
   * Setup PayPal api context
   */
    public function __construct()
    {
        $this->_api_context = new ApiContext(new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret')));
        $this->_api_context->setConfig(config('paypal.settings'));
    }

    /**
     * Make a credit card payment
     *
     * @param $cardRow
     * @param $services
     * @return int|mixed|Payment
     */
    public function creditCardPay($cardRow, $services)
    {
        try {
            // Set credit card from payment should made
            $card = new PaymentCard();
            $card->setType("visa")
                ->setNumber(preg_replace('/\s+/', '', $cardRow->number))
                ->setExpireMonth($cardRow->month)
                ->setExpireYear($cardRow->year)
                ->setFirstName($cardRow->first_name)
                ->setLastName($cardRow->last_name)
                ->setBillingCountry("US");

            $fi = new FundingInstrument();
            $fi->setPaymentCard($card);

            $payer = new Payer();
            $payer->setPaymentMethod("credit_card")->setFundingInstruments(array($fi));

            // Set items
            $items = [];

            foreach ($services as $row) {
                $item = new Item();
                $item->setName($row->name)
                    ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setPrice($row->price);
                array_push($items, $item);
            }

            $itemList = new ItemList();
            $itemList->setItems($items);

            // Additional payment details
            $details = new Details();
            $details->setSubtotal(Cart::getSubTotal());

            // Set total amount
            $amount = new Amount();
            $amount->setCurrency("USD")
                ->setTotal(Cart::getTotal())
                ->setDetails($details);

            // Set transaction for payment
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($itemList)
//                ->setDescription("Payment description")
                // Set a unique ID for payment
                ->setInvoiceNumber(uniqid());
            // Set payment intent type
            $payment = new Payment();
            $payment->setIntent("sale")
                ->setPayer($payer)
                ->setTransactions(array($transaction));

            // Make payment from api
            $payment->create($this->_api_context);
            return $payment;
        } catch (PayPalConnectionException $exp) {
            return 0;
        }
    }
  
  /**
   * @param $services
   *
   * @return null|string
   */
    public function checkout($services) {
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $items = [];

        foreach ($services as $row) {
            $item = new Item();
            $item->setName($row->name)
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($row->price);
            array_push($items, $item);
        }

        $itemList = new ItemList();
        $itemList->setItems($items);

        // Additional payment details
        $details = new Details();
        $details->setSubtotal(Cart::getSubTotal());

        // Set total amount
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(Cart::getTotal())
            ->setDetails($details);

        // Set transaction for payment
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)

            // Set a unique ID for payment
            ->setInvoiceNumber(uniqid());


        $baseUrl = env('APP_URL');
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("$baseUrl/client/account/paypal/callback")
            ->setCancelUrl("$baseUrl/client/account/paypal/cancel");


        // Set payment intent type
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        // Make payment from api
        $payment->create($this->_api_context);

        $approvalUrl = $payment->getApprovalLink();

        return $approvalUrl;
    }
  
  
  /**
   * @param $request
   *
   * @return int|Payment
   */
    public function accountPay($request)
    {
        $paymentId = $request->get('paymentId');
        $payment = Payment::get($paymentId, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));


        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setSubtotal(Cart::getSubTotal());

        $amount->setCurrency('USD');
        $amount->setTotal(Cart::getTotal());
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);

        try {
            $result = $payment->execute($execution, $this->_api_context);
            try {
                $payment = Payment::get($paymentId, $this->_api_context);
            } catch (\Exception $ex) {
                return 0;
            }
        } catch (\Exception $ex) {
            return 0;
        }
        return $payment;
    }
}