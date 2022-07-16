<?php

namespace App\Http\Controllers\Retailer\payments\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaResponseController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function validation(Request $request){
        Log::info('Validation endpoint hit');
        Log::info($request ->all());
        return true;
    }

    public function confirmation(Request $request){
        Log::info('confirmation endpoint hit');
        Log::info($request ->all());
        return true;
    }

    public function reversal(Request $request){
        Log::info(' reversal endpoint hit');
        Log::info($request ->all());

        return true;
    }

     public function stkPushResponse(Request $request)
    {
        # code...
        Log::info('stkPushResponse Endpoint Hit');
        Log::info($request->all());

    //     'Body' =>
    //     array (
    //       'stkCallback' =>
    //       array (
    //         'MerchantRequestID' => '30442-18687519-1',
    //         'CheckoutRequestID' => 'ws_CO_27062022194347496714680763',
    //         'ResultCode' => 1032,
    //         'ResultDesc' => 'Request cancelled by user',
    //       ),
    //     ),
    //   )


       return true;
    }

    public function queryResult(Request $request){
        Log::info(' queryResult endpoint hit');
        Log::info($request ->all());

        return true;
    }

    public function queryConfirmation(Request $request){
        Log::info(' queryConfirmation endpoint hit');
        Log::info($request ->all());

        return true;
    }


}
