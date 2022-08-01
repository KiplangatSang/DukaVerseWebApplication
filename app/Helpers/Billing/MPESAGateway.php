<?php

namespace App\Helpers\Billing;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class MPESAGateway implements PaymentGatewayContract
{
    protected $gateway;

    public $purposable_type, $purposable_id = null;
    private $currency = null;
    private $trans_type = null;
    private $discount = null;
    static $phone_number;

    public function __construct($currency, $trans_type)
    {
        $this->currency =  $currency;
        $this->trans_type =  $trans_type;
        $this->registerUrls();
    }

    public function charge($transaction)
    {
        return $this->stkPush($transaction->amount, $transaction->account, $transaction->message);
    }


    public function setDiscount($amount)
    {
        # code...
        $this->discount = $amount;
    }

    public function getAccessToken()
    {

        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
            : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        try {
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
            if (!$response)
                return false;
            return $response->access_token;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    /* get from   safaricom app*/
    public function makeHttp($url, $body)
    {
        $token = $this->getAccessToken();


        if (!$token)
            return "false";

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
        if (!$curl_response)
            return "error";

        // dd("curl_response");

        return $curl_response;
    }


    /*
        Regiser url
        */

    public  function registerUrls()
    {
        $validaton = env('MPESA_TEST_URL') . '/api/validation/';
        $confirmation = env('MPESA_TEST_URL') . '/api/confirmation/{id}';
        $body = array(
            'ShortCode' => env('MPESA_SHORTCODE'),
            "ResponseType" => "[Cancelled/Completed]",
            'ConfirmationURL' => $confirmation,
            'ValidationURL' => $validaton,
        );

        //dd($body);
        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl'
            : 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';
        $response = $this->makeHttp($url, $body);
        if (!$response)
            return "Error Registering Urls";

        return $response;
    }



    //register URLs
    // public function simulateTransaction(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'amount' => 'required',
    //             'account' => 'required',
    //         ]
    //     );
    //     $body = array(
    //         'ShortCode' => env('MPESA_SHORTCODE') != '000' ? env('MPESA_SHORTCODE') : 1111,
    //         'Msisdn' => env('MPESA_TEST_MSISDN'),
    //         'Amount' => $request->amount,
    //         'BillRefNumber' => $request->account,
    //         'CommandID' => 'CustomerPayBillOnline'
    //     );

    //     $url = env('MPESA_ENV') == 0
    //         ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate'
    //         : 'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';

    //     $response = $this->makeHttp($url, $body);

    //     return $response;
    // }



    public function stkPush($amount, $account, $message)
    {

        $timeStamp = date('YmdHis');
        $callbackUrl = env('MPESA_TEST_URL') . '/api/stkpush';
        $password = env('MPESA_STK_SHORTCODE') . env('MPESA_PASSKEY') . $timeStamp;
        $body = array(
            //business shortcode is store number in buy goods
            'BusinessShortCode' => env('MPESA_STK_SHORTCODE'),
            'Password' => base64_encode($password),
            'Timestamp' => $timeStamp,
            //'TransactionType' => 'CustomerBuyGoodsOnline',
            'TransactionType' => 'CustomerBuyGoodsOnline',
            'Amount' => $amount,
            'PartyA' =>  env('MPESA_TEST_MSISDN'),
            'PartyB' => env('MPESA_STK_SHORTCODE'),
            'PhoneNumber' => env('MPESA_TEST_MSISDN'),
            'CallBackURL' => $callbackUrl,
            'AccountReference' => env('MPESA_TEST_MSISDN'),
            'TransactionDesc' => $message,
        );

        // dd($body);

        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'
            : 'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';

        $response = $this->makeHttp($url, $body);
        $result = (array)json_decode($response);
        // dd($result);

        return $result;
    }



    // public function stkPushResponse(Request $request)
    // {
    //     $data = array(
    //         'Status' => 1,
    //         $request,
    //     );
    //     return $data;
    //     // dd($request);
    // }



}
