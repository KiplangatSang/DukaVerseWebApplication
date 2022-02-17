<?php

namespace App\Http\Controllers\payments\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MpesaController extends Controller
{
    static $phone_number;

    public function __construct()
    {
        $this->middleware('auth');
       // $this->phone = Auth::user()->phonenumber;
    }

    public function index(){
       if(session()->has('payment')){
        $payment = session()->get('payment');

        $phone_number = auth()->user()->phoneno;

        $amount = $payment['payAmount'];
        $account = $payment['payDescription'];
        $mpesadata = array(
            'phone_number'=> $phone_number,
            'amount'=> $amount,
            'account'=> $account,
        );


       return view('payments.mpesapayments',compact('mpesadata'));
       }else{
          return redirect('/bills/index');
       }
    }

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
              CURLOPT_SSL_VERIFYPEER => false,
              CURLOPT_HEADER =>false,
              CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY'). ":" . env('MPESA_CONSUMER_SECRET')
            )
            );
            $response = json_decode(curl_exec($curl));
            curl_close($curl);
           return $response->access_token;
    }
/* get from   safaricom app*/
    public function makeHttp($url,$body){

     // dd($body);

    // dd( $this ->getAccessToken());

    // {
    //     "access_token": "3PAPCKzoby8PVMrfpQVj0IWUbl4D",
    //     "expires_in": "3599"
    //   }

        $curl = curl_init();
         curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array('Content-Type: application/json', 'Authorization:Bearer '. $this ->getAccessToken()),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_POST =>true,
                CURLOPT_POSTFIELDS => json_encode($body),

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
        ?' https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl'
        :'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';
     $response = $this ->makeHttp($url,$body);
      return $response;
    }

//register URLs
    public function simulateTransaction(Request $request){

       dd($this->registerUrls());


        $request->validate([
            'amount' => 'required',
            'account' => 'required',
            ]
        );
        $body = array(
            'ShortCode' => env('MPESA_SHORTCODE') != '000' ?env('MPESA_SHORTCODE') : 1111,
            'Msisdn' => env( 'MPESA_TEST_MSISDN'),
            'Amount' => $request -> amount,
            'BillRefNumber' => $request ->account,
            'CommandID' =>'CustomerPayBillOnline'
        );

        $url = env('MPESA_ENV') == 0
        ?'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate'
        :'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';

        $response = $this ->makeHttp($url,$body);
       return $response;
    }



    public function stkPush(Request $request){

       /// dd($this->registerUrls());


         $request->validate([
             'amount' => 'required',
             'account' => 'required',
             ]
         );
         $timeStamp = date('YmdHis');


             $password = env('MPESA_STK_SHORTCODE').env('MPESA_PASSKEY').$timeStamp;
         $body = array(
             //business shortcode is store number in buy goods
             'BusinessShortCode' => env('MPESA_STK_SHORTCODE'),
             'Password'=> base64_encode($password),
             'Timestamp' =>$timeStamp,
             'TransactionType' => 'CustomerPayBillOnline',
             'Amount' => $request -> amount,
             'PartyA'=> $request -> phone,
             'PartyB'=> env('MPESA_STK_SHORTCODE'),
             'PhoneNumber'=> $request -> phone,
             'CallBackURL'=>env('MPESA_TEST_URL'). '/stkpush',
             'AccountReference'=> $request ->account,
            'TransactionDesc'=>$request ->account,
         );

        //  {"BusinessShortCode":"174379",
        //     "Password":"MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMjIwMTI3MTIyNzI2",
        //     "Timestamp":"20220127122726",
        //     "TransactionType":"CustomerPayBillOnline",
        //     "Amount":"1",
        //     "PartyA":"254714680763",
        //     "PartyB":"174379",
        //     "PhoneNumber":"254714680763",
        //     "CallBackURL":"https://5787-154-79-186-111.ngrok.io/stkpush",
        //     "AccountReference":"Test","TransactionDesc":"Test"
        //     }

        // dd(json_encode($body));

         $url = env('MPESA_ENV') == 0
         ?'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'
         :'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';

         $response = $this ->makeHttp($url,$body);
        return $response;
     }



     public function stkPushResponse(Request $request){
         $data = array(
             'Status'=>1,
             $request,
         );
         return $data;
        // dd($request);
     }
}
