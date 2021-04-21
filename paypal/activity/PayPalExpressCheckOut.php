<?php

class PayPalExpressCheckOut
{
    public $api;

    function __construct()
    {
        // paypal
        //use PayPal\Rest\ApiContext;
        //use PayPal\Auth\OAuthTokenCredential;
        require __DIR__ . '/../../paypal/autoload.php';

        //API
        $this->api = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AaNAcDswIPbXSy2jpr3HPIUXZGTj224CTmtnYNZtLUgNlD7sxg3qcs2jOp6L69DZa3a5yYqZA3BolsoF',
                'EJtWtuvpMpx8UFu92jK0R9gOLaEMAj-92DYCLSMKACDmCY7PRloTAXhFBCa2mtpK1eMN-QW9a7CY0Xx3'
            )
        );

        $this->api->setConfig([
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => true,
            'log.FileName' => 'PayPal.log',
            'log.LogLevel' => 'FINE',
            'validation.level' => 'log'

        ]);
    }

    function checkOut(array $pal)
    {

        //payer
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('PayPal');

        //Details
        $details = new \PayPal\Api\Details();
        $details->setShipping($pal['shipping'])
            ->setTax($pal['tax'])
            ->setSubtotal($pal['price']);

        //Amount
        $amount = new \PayPal\Api\Amount();
        $amount->setCurrency($pal['currency'])
            ->setTotal($pal['shipping']+$pal['tax']+$pal['price'])
            ->setDetails($details);

        //Transaction
        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount)
            ->setDescription($pal['description']);

        //Payment
        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions([$transaction]);

        //Redirect
        $redirecturls = new \PayPal\Api\Redirecturls();
        $redirecturls->setReturnUrl($pal['returnUrl'])
            ->setCancelUrl($pal['cancelUrl']);

        // Redirect after payment
        $payment->setRedirectUrls($redirecturls);


        try {
            $payment->create($this->api);
            return $payment;

        } catch (\PayPal\Exception\PPConectionException $e) {
            header('Location: '.$pal['cancelUrl']);
            return false;

        }
    }

    /**
     * Call This function after transaction is completed.
     * This will confirm charge to payer
     * This will call in success page
     */
    public function chargePayer( $paymentId = ''){
        try{
            $payerID = $_GET['PayerID'];
            // Extra Layer of security
            if (empty($paymentId)) {
                $paymentId = $_GET['paymentId'];
            }
           // echo 'payerId: '.$payerID;
           // echo 'paymentId: '.$paymentId;

            // Get Payment
            $payment = \PayPal\Api\Payment::get($paymentId, $this->api);

            $execution = new \PayPal\Api\PaymentExecution();
            $execution->setPayerId($payerID);

            //Execute Paypal payment(charge)
            $payment->execute($execution, $this->api);
            return $payment;

        }catch(\PayPal\Api\PayPalConnectionException $e){
            //echo "Error 111111";
            die($e);
        }catch (Exception $ex) {
            //echo "Error 2222222 <pre>";
            die($ex);
        }
    }
}
