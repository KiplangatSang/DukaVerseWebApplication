<?php


namespace App\Admin\Loaning\LoanPayment;


class MPesaLoanPayment extends LoanPayment
{
    protected $gateWay, $account, $amount, $status, $date,$party_B,$purpose;
    public function __construct($transaction)
    {
        $this->gateWay = $this->setGateWay($transaction->gateWay);
        $this->account = $this->setAccount($transaction->account);
        $this->amount = $this->setPaymentAmount($transaction->amount);
        $this->party_B = $this->setPaymentAmount($transaction->party_B);
        $this->purpose = $this->setPaymentAmount($transaction->purpose);

    }

    public function pay()
    {
        $timeStamp = date('YmdHis');
        $password = env('MPESA_STK_SHORTCODE') . env('MPESA_PASSKEY') . $timeStamp;
        $body = array(
            'BusinessShortCode' => env('MPESA_SHORTCODE'),
            'Password' => base64_encode($password),
            'Timestamp' => $timeStamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $this->amount,
            'PartyA' => $this->party_B,
            'PartyB' => env('MPESA_STK_SHORTCODE'),
            'PhoneNumber' => $this->party_B,
            'CallBackURL' => env('MPESA_TEST_URL') . '/stkpush',
            'AccountReference' =>  $this->purpose,
            'TransactionDesc' => "Loan Payment",
        );


        //dd($body);
        $response = $this->makeHttp($this->getUrl(), $body);
        return $response;
    }

    public function saveTransaction($transaction)
    {
    }

    public function getUrl()
    {
        # code...
        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'
            : 'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';

        return $url;
    }

    public function makeHttp($url, $body)
    {
        $access =  $this->getAccessToken();
        if (!$access)
            return false;

            $token = $access->access_token;
        /// dd( $token);

        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'Authorization:Bearer ' . $token),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => json_encode($body),

            )

        );
        $curl_response = curl_exec($curl);
        curl_close($curl);
        return $curl_response;
    }

    public function getAccessToken()
    {
        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
            : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl = curl_init($url);
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf8'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_HEADER => false,
                CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY') . ":" . env('MPESA_CONSUMER_SECRET')
            )
        );
        $response = json_decode(curl_exec($curl));
        curl_close($curl);
        //dd( $response);
        return $response;
    }

    /*
         Register urls

    */

    public  function registerUrls()
    {



        $body = array(
            'ShortCode' => 600990,
            'RepsonseType' => 'Completed',
            'ConfirmationURL' => "https://mydomain.com/confirmation",
            'ValidationURL' => "https://mydomain.com/validation",
        );

        // curl_setopt($ch, CURLOPT_POSTFIELDS, {
        //     "ShortCode": 600990,
        //     "ResponseType": "Completed",
        //     "ConfirmationURL": "https://mydomain.com/confirmation",
        //     "ValidationURL": "https://mydomain.com/validation",
        //   });

        $url = env('MPESA_ENV') == 0
            ? ' https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl'
            : 'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
        $response = $this->makeHttp($url, $body);
        return $response;
    }

    /*
    */
    public function simulateTransaction($account,$amount)
    {
        $body = array(
            'ShortCode' => env('MPESA_SHORTCODE') != '000' ? env('MPESA_SHORTCODE') : 1111,
            'Msisdn' => env('MPESA_TEST_MSISDN'),
            'Amount' => $amount,
            'BillRefNumber' => $account,
            'CommandID' => 'CustomerPayBillOnline'
        );

        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate'
            : 'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';

        $response = $this->makeHttp($url, $body);
        return $response;
    }
}
