<?php

namespace App\Http\Controllers\Admin\Loans;

use App\Http\Controllers\Controller;
use App\LoanApplication;
use App\Loans\Loans;
use App\Repositories\LoansRepository;
use Illuminate\Http\Request;

class PaidLoanController extends Controller
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
   public function index()
   {
       //
       $loans = LoanApplication::where('loan_status', 1)->get();
       //dd( $loans);

       foreach ($loans as $loanApplication) {
           $styling = array();

           $loansRepository = new LoansRepository();
           $loanStatus = $loansRepository->loansStatusReport($loanApplication);
           //dd( $loanStatus);
           $loanApplication = $loanStatus['loanApplication'];
           $loanApplication->loan_duration = $loanApplication->loan_duration . " Days";
           $styling = $loanStatus['styling'];
       }
       $loandata['loan'] = $loans;

       return view("Admin.Loans.PayedLoans.index", compact('loans'));
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
       $loanApplication = LoanApplication::where('id', $id)->first();
       $loan = Loans::where('id', $loanApplication->loan_id)->first();
       $styling = array();

       $loansRepository = new LoansRepository();
       $loanStatus = $loansRepository->loansStatusReport($loanApplication);
       // dd( $loanStatus);
       $loanApplication = $loanStatus['loanApplication'];
       $loanApplication->loan_duration = $loanApplication->loan_duration . " Days";
       $styling = $loanStatus['styling'];



       $appliedLoan = array(
           'loan' => $loan,
           'loanapplication' =>  $loanApplication,
           'styling' => $styling,
       );

       return view("Admin.Loans.PayedLoans.show", compact('appliedLoan'));
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
       $loan = Loans::where('id', $id)->first();

       $loandata['loan'] = $loan;
       return view("Admin.Loans.PayedLoans.edit", compact('$loandata'));
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
       $loan = LoanApplication::where('id', $id)->first();
       //dd($loan);
       $loan->update([
           'loan_status' => 0,
           'loan_assigned_at' => now(),
           'loan_assigned_by' => auth()->user()->id,

       ]);

       return redirect('/admin/loans/paid/show/' . $id)->with('success', 'Loan Proccessed Successfully');
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
       $loanApplication = LoanApplication::where('id', $id)->first();
       $loan_id = $loanApplication->loan_id;

       $loanApplication = LoanApplication::destroy($id);


       return redirect('/admin/loans/PayedLoans/index/'. $loan_id)->with('success', 'Deletion Successfull');
   }
}
