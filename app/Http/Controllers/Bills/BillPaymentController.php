<?php

namespace App\Http\Controllers\Bills;

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

        return view('Bills.Payment.index',compact('billPaymentData'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
