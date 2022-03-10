<?php

namespace App\Http\Controllers\Loans;

use App\Http\Controllers\Controller;
use App\LoanApplication;
use App\Loans\Loans;
use App\Repositories\ThirdPartyRepository;
use Illuminate\Http\Request;

class LoansApplicationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index($loan_id){


    }

    public function showAppliedLoanItem($loan_id,$loanapplication_id){
//        $loanapplication_id = 1;
        $loan = Loans::where('id',$loan_id)->first();
        $loanApplication = LoanApplication::where('id',$loanapplication_id)->first();
        $styling = array(
            'loan_status_color' => '',

        );


            if ($loanApplication->loan_status == -1) {
                $loanApplication->loan_status = "Waiting";
                $loanApplication->loan_assigned_at = "N/A";
                $loanApplication->loan_assigned_by =  "N/A";
                $loanApplication->loan_repaid_amount =  "N/A";
                $styling['loan_status_color']="text-danger";
            } elseif ($loan->loan_status == 0) {
                $loanApplication->loan_status = "Processed";
                $styling['loan_status_color']="text-info";
            } else {
                $loanApplication->loan_status = "Paid";
                $styling['loan_status_color']="text-success";

            }
            $loanApplication->loan_duration = $loanApplication->loan_duration . " Days";




        $appliedLoan = array(
            'loan' =>$loan,
            'loanapplication' =>  $loanApplication,
            'styling'=>$styling,
        );

        return view('Loans.appliedloanitem',compact('appliedLoan'));

    }

    public function payLoanRequest($loanapplication_id){

        $thirdPartyRepo = new ThirdPartyRepository();
        $thirdPartyImages = $thirdPartyRepo->getThirdPartyImages();
        $loanApplication = LoanApplication::where('id',$loanapplication_id)->first();
        $loanPaymentData = array(
            'thirdPartyImages' => $thirdPartyImages,
            'loanApplication'  => $loanApplication,
        );

          // dd($loanPaymentData);
       return view('Loans.loanpayments',compact('loanPaymentData'));
    }
}
