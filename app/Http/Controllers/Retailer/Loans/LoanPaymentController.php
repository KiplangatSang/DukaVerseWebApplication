<?php

namespace App\Http\Controllers\Retailer\Loans;

use App\Admin\Loaning\LoanPayment\MPesaLoanPayment;
use App\Billing\BillPayment\MPesaBillPayment;
use App\Http\Controllers\BaseController;
use App\Repositories\LoansRepository;
use App\Repositories\ThirdPartyRepository;
use App\Repositories\TransactionsRepository;
use Illuminate\Http\Request;

class LoanPaymentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $retail;

    public function __construct()
    {
        $this->middleware('auth');
        // $this->retail = $this->getRetail();
    }

    public function loansRepository()
    {
        # code...

        $this->retail = $this->getRetail();

        if (!$this->retail) {
            return redirect('/retails/addretail')->with('message', __('retail.create'));
        }

        $this->ordersRepo = new LoansRepository($this->retail);
        return $this->ordersRepo;
    }

    public function index($application_id)
    {
        //
        $thirdPartyRepo = new ThirdPartyRepository();
        $thirdPartyImages = $thirdPartyRepo->getThirdPartyImages();

        $loanApplication = $this->getRetail()->loanApplications()->where('id', $application_id)->first();
        $loanPaymentData = array(
            'thirdPartyImages' => $thirdPartyImages,
            'loanApplication'  => $loanApplication,
        );

        return view('client.loans.loanpayments', compact('loanPaymentData'));
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

    public function show($id)
    {
        //
        $transResult = null;

        if ($id == "MPESA") {


            $transRepo = new TransactionsRepository($this->getRetail());

            $mpesadata = $transRepo->saveTransaction("MPESA", "0714680763","1", "DukaVerse Loan Payment",  1, 0, "ksh",__("app.pay_loan_purpose"));

           // dd($mpesadata);
             return view('client.payments.mpesapayments', compact('mpesadata'));


        } elseif ($id == "KCB" || $id == "EQUITY") {
        } else {

            return back()->with('message', "Sorry!! Error processing Request");
        }

        return $transResult;
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

    public function MPesaPayment()
    {
        # code...
    }

    public function DukaVersePayment()
    {
        # code...
    }

    public function BankPayment()
    {
        # code...
    }

    public function CardPayment()
    {
        # code...
    }
}
