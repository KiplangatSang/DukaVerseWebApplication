<?php

namespace App\Http\Controllers\Retailer\Bills;

use App\Bills\Bills;
use App\Http\Controllers\Controller;
use App\Repositories\ThirdPartyRepository;
use Illuminate\Http\Request;

class BillPaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($bill_id)
    {
        //


        $thirdPartyRepo = new ThirdPartyRepository();
        $thirdPartyImages = $thirdPartyRepo->getThirdPartyImages();
        $bill = Bills::where('id',$bill_id)->first();
                $billPaymentData = array(
            'thirdPartyImages' => $thirdPartyImages,
            'bill'  => $bill,
        );

          // dd($loanPaymentData);

        return view('client.bills.payment.index',compact('billPaymentData'));

    }


    public function show($id)
    {
        //
    if($id == "MPESA"){
        return redirect('/payments/mpesapayments');

    }elseif($id == "KCB"){

    }elseif($id == "EQUITY"){

    }else{

        return back()->with('message', "Sorry!! Error processing Request");
    }

    }

}
