<?php

namespace App\Http\Controllers\payments\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaResponseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validation(Request $request){
        Log::info('Validation endpoint hit');
        Log::info($request ->all());

        return [
            'ResultCode' => 0,
            'ResultDesc' => 'Accept Service',
            'ThirdPartyTransID' => rand(3000,10000)
        ];
    }

    public function confirmation(Request $request){
        Log::info('confirmation endpoint hit');
        Log::info($request ->all());

        return [
            'ResultCode' => 0,
            'ResultDesc' => 'Accept Service',
            'ThirdPartyTransID' => rand(3000,10000)
        ];
    }

     public function stkPushResponse(Request $request)
    {
        # code...
        Log::info('Endpoint Hit');
        dd($request);
    }
}
