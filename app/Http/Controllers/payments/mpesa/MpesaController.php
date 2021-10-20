<?php

namespace App\Http\Controllers\payments\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MpesaController extends Controller
{
    public function getAccessToken(){
        $url = env('MPESA_ENV') == 0
        ?'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
        :'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl = curl_init($url);
        curl_setopt_array(
            $curl,
            array(
              CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf8'],
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_HEADER =>false,
              CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY'). ":" . env('MPESA_CONSUMER_SECRET')
            )
            );
            $response = json_decode(curl_exec($curl));
            curl_close($curl);
            return $response;
    }
/* get from   safaricom app*/
    public function makeHttp($url,$body){
        $url = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'Authorization:Bearer', $this ->getAccessToken()),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST =>true,
                CURLOPT_POSTFIELDS =>JSON_ENCODE($body)

            )

        );
            $curl_response = curl_exec($curl);
            curl_close($curl);
            return $curl_response;
    }


    /*
    Regiser url
    */

    public  function registerUrls(){
        $body = array(
            'shortCode' => env('MPESA_SHORTCODE'),
            'RepsonseType' => 'Completed',
            'ConfirmationUrl' => env('MPESA_TEST_URL').'/api/confirmation',
            'validationURL' => env('MPESA_TEST_URL').'/api/validation'
        );
        $url = env('MPESA_ENV') == 0
        ?'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest'
        :'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
     $response = $this ->makeHttp($url,$body);
      return $response;
    }

//register URLs
    public function simulateTransaction(Request $request){
        $body = array(
            'ShortCode' => env('MPESA_SHORTCODE'),
            'Msisdn' => env( 'MPESA_TEST_MSISDN'),
            'Amount' => $request -> Amount,
            'BillRefNumber' => $request ->Account,
            'CommandID' =>'CustomerPayBillOnline'
        );

        $url = env('MPESA_ENV') == 0
        ?''
        :'';

        $response = $this ->makeHttp($url,$body);
       return $response;
    }
}
