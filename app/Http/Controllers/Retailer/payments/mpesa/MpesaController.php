<?php

namespace App\Http\Controllers\Retailer\payments\mpesa;

use App\Admin\Loaning\LoanPayment\MPesaLoanPayment;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class MpesaController extends BaseController
{
    static $phone_number;

    public function __construct()
    {
        $this->middleware('auth');
        // $this->phone = Auth::user()->phonenumber;
    }

    public function index(Request $request)
    {

        $payment = session()->get('payment');

        $phone_number = auth()->user()->phoneno;

        // $amount = $payment['payAmount'];
        // $account = $payment['payDescription'];
        $amount = 1;
        $account = "payDescription";
        $mpesadata = array(
            'phone_number' => $phone_number,
            'amount' => $amount,
            'account' => $account,
        );


        return view('client.payments.mpesapayments', compact('mpesadata'));
        if (session()->has('payment')) {
        } else {
            //  return back()->with('message',"Could not process request");
        }
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
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $response->access_token;
    }


    /* get from   safaricom app*/
    public function makeHttp($url, $body)
    {
        $token = $this->getAccessToken();

        if (!$token)
            return false;

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

        return $curl_response;
    }


    /*
    Regiser url
    */

    public  function registerUrls()
    {
        $validaton = env('MPESA_TEST_URL') . '/api/validation';
        $confirmation = env('MPESA_TEST_URL') . '/api/confirmation';
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
    public function simulateTransaction(Request $request)
    {
        $request->validate(
            [
                'amount' => 'required',
                'account' => 'required',
            ]
        );
        $body = array(
            'ShortCode' => env('MPESA_SHORTCODE') != '000' ? env('MPESA_SHORTCODE') : 1111,
            'Msisdn' => env('MPESA_TEST_MSISDN'),
            'Amount' => $request->amount,
            'BillRefNumber' => $request->account,
            'CommandID' => 'CustomerPayBillOnline'
        );

        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate'
            : 'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';

        $response = $this->makeHttp($url, $body);

        return $response;
    }



    public function stkPush(Request $request)
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
            'Amount' => $request->mpesadata->amount,
            'PartyA' =>  env('MPESA_TEST_MSISDN'),
            'PartyB' => env('MPESA_STK_SHORTCODE'),
            'PhoneNumber' => env('MPESA_TEST_MSISDN'),
            'CallBackURL' => $callbackUrl,
            'AccountReference' => $request->mpesadata->party_B,
            'TransactionDesc' => $request->mpesadata->message,
        );

        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest'
            : 'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';

        $response = $this->makeHttp($url, $body);
        $result = (array)json_decode($response);

        dd($response);
        return $result;
    }



    public function stkPushResponse(Request $request)
    {
        $data = array(
            'Status' => 1,
            $request,
        );
        return $data;
        // dd($request);
    }

    public function reverseMpesa()
    {
        //
        $timeStamp = date('YmdHis');

        $password = env('MPESA_STK_SHORTCODE') . env('MPESA_PASSKEY') . $timeStamp;

        $reversealUrl = env('MPESA_TEST_URL') . '/api/reverse';
        $confirmationUrl = env('MPESA_TEST_URL') . '/api/confirmation';
        $body = array(
            "Initiator" =>  env('MPESA_B2C_INITIATOR'),
            "SecurityCredential" => env('MPESA_B2C_SECURITY'),
            "CommandID" => "TransactionReversal",
            "TransactionID" => "'QFS8HM23GI'",
            "Amount" => 1,
            "ReceiverParty" =>  env('MPESA_SHORTCODE'),
            "RecieverIdentifierType" => "11",
            "ResultURL" => $reversealUrl,
            "QueueTimeOutURL" => $confirmationUrl,
            "Remarks" => "please",
            "Occasion" => "work"
        );
        //EQoN7lqVh9NlQVDUwLrcu7SFnfnq1M4du0Wc7c8jyxoLY2F5FbpzGg4kDLvYDdzEqVAXB2SZG9AV40QcBmk/LvnQ5XP4WVVczickj6cDt7RPvcpTuucLD1eGnAK2wZZl006a6tqod8EuPX68n/Y6oXozhxNHdAWlZRXfSHmtKo9ue/S3cyqwdY2AxSjKhjJgmPxY5e9wCCJYrIGxpWrXPbFjNFAqvWHXaLEEExU7PttitKRp8givnDwQLWSgHCojbSAOHWMfu8bSy0JR+IA9Y2KWHGCodc8gcjhqz6HOu91/lcv8KAXWL9Pubr8jEiqCPzEHu9klzXCb1imUNI2AEA==
        //dd($body);
        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/reversal/v1/request'
            : 'https://api.safaricom.co.ke/mpesa/reversal/v1/request';
        $response = $this->makeHttp($url, $body);
        if (!$response)
            return "Error Reversing the money";

        return $response;
    }


    public function MpesaPay($trans_id, Request $request)
    {
        $transaction =  $this->retail->accountTransactions()->where("id", $trans_id)->first();
        $MPESAPayment = new MPesaLoanPayment($transaction);
        $transResult =  $MPESAPayment->pay();
        if (!$transResult)
            return back()->with("error", "Could not proccess request");

        $transResult = json_decode($transResult);

        if ($transResult->ResponseCode == "0")
            return back()->with("success", $transResult->CustomerMessage);
    }

    public function MpesaB2B()
    {
        $resultUrl = env('MPESA_TEST_URL') . '/api/query/result';
        $queryUrl = env('MPESA_TEST_URL') . '/api/query/confirmation';

        //https://sandbox.safaricom.co.ke/mpesa/b2b/v1/paymentrequest

        $body = array( # code...
            "Initiator" =>  env('MPESA_B2C_INITIATOR'),
            "SecurityCredential" => env('MPESA_B2C_SECURITY'),
            "CommandID" => "TransactionStatusQuery",
            "TransactionID" => "QFS8HM23GI",
            "PartyA" => env('MPESA_STK_SHORTCODE'),
            "IdentifierType" => 4,
            "ResultURL" => $resultUrl,
            "QueueTimeOutURL" =>  $queryUrl,
            "Remarks" => "Paid",
            "Occassion" => "Paid",
        );

        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query'
            : 'https://api.safaricom.co.ke/mpesa/transactionstatus/v1/query';

        // dd($body);

        $response = $this->makeHttp($url, $body);
        if (!$response)
            return "Error Reversing the money";


        return $response;
    }
    public function mpesaResponse()
    {
        # code...

        //     $bodydata = array(
        //         'Body' => 'stkCallback' =>

        //   'MerchantRequestID' => '7442-20184037-1',
        //   'CheckoutRequestID' => 'ws_CO_28062022105514278714680763',
        //   'ResultCode' => 0,
        //   'ResultDesc' => 'The service request is processed successfully.',
        //   'CallbackMetadata' =>

        //     'Item' =>
        //       0 =>
        //         'Name' => 'Amount',
        //         'Value' => 1.0,
        //       ,
        //       1 =>
        //         'Name' => 'MpesaReceiptNumber',
        //         'Value' => 'QFS8HM23GI',
        //       ,
        //       2 =>

        //         'Name' => 'TransactionDate',
        //         'Value' => 20220628105533,
        //      ,
        //       "3" =>
        //         'Name' => 'PhoneNumber',
        //         'Value' => 254714680763,
    }
    public function MpesaB2C()
    {
        $resultUrl = env('MPESA_TEST_URL') . '/api/query/result';
        $queryUrl = env('MPESA_TEST_URL') . '/api/query/confirmation';

        //

        $body = array( # code..

            "InitiatorName" => "TestG2Init",
            "SecurityCredential" => "EsJocK7+NjqZPC3I3EO+TbvS+xVb9TymWwaKABoaZr/Z/n0UysSsEfea4eQyeWWmyx0t7K1vmfUlGk....",
            //"InitiatorName" =>env('MPESA_B2C_INITIATOR'),
            //  "SecurityCredential" => env('MPESA_B2C_SECURITY'),
            "CommandID" => "BusinessPayment",
            "Amount" => "10",
            "PartyA" =>  env('MPESA_STK_SHORTCODE'),
            "PartyB" => "254714680763",
            "Remarks" => "here are my remarks",
            "QueueTimeOutURL" => $queryUrl,
            "ResultURL" => $resultUrl,
            "Occassion" => "Paid right now"

        );

        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/b2c/v1/paymentrequest'
            : 'https://api.safaricom.co.ke/mpesa/b2c/v1/paymentrequest';

        // dd($body);

        $response = $this->makeHttp($url, $body);
        if (!$response)
            return "Error Reversing the money";


        return $response;
    }

    public function transactionQuery()
    {

        $resultUrl = env('MPESA_TEST_URL') . '/api/query/result';
        $queryUrl = env('MPESA_TEST_URL') . '/api/query/confirmation';

        //

        $body = array( # code...
            // "Initiator" =>  env('MPESA_B2C_INITIATOR'),
            // "SecurityCredential" => env('MPESA_B2C_SECURITY'),
            "Initiator" => "apitest361",
            "SecurityCredential" => "iDIurkCG4r9F7lCCNNkctseY9MgiddL6F1VmmJH1DSk5n5U4HPkE3gj1+UFNQ+3MUIzIkR7EgBov9/rqzeXJVb8JeTTD/10XSdTU5eJJeWsqI1VSXpIe/j4xa7HNuezxRJ/KtTWu3bdq9heozyXMn/5ErogjfwIlfQ4Bkhw8+9SEGoNkRA95Idp1PSg/ElPOVnrKuPFTf0HS/iTmuKvVBkY6oAFSObVx7DmqqoL2K4P8ZNh3EDVfQtCQGUnF1OLOab5X46wqVW5p7UJ/5kVFdN8Yuw172VNOjyNILjUXwqqAhS4WKXC28cXd4faYrG5E5AQfGGjNIlYRqWse8w23fw==",
            "CommandID" => "TransactionStatusQuery",
            "TransactionID" => "QFS8HM23GI",
            "PartyA" => env('MPESA_STK_SHORTCODE'),
            "IdentifierType" => 11,
            "ResultURL" => $resultUrl,
            "QueueTimeOutURL" =>  $queryUrl,
            "Remarks" => "Paid",
            "Occassion" => "Paid",
        );

        //   echo(json_encode($body));

        $url = env('MPESA_ENV') == 0
            ? 'https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query'
            : 'https://api.safaricom.co.ke/mpesa/transactionstatus/v1/query';

        // dd($body);

        $response = $this->makeHttp($url, $body);
        if (!$response)
            return "Error Reversing the money";


        return $response;
    }
}
