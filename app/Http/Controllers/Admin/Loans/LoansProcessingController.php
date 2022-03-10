<?php

namespace App\Http\Controllers\Admin\Loans;

use App\Http\Controllers\Controller;
use App\LoanApplication;
use App\Loans\Loans;
use App\Repositories\LoansRepository;
use Illuminate\Http\Request;

class LoansProcessingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allLoans()
    {
           //
           $loans = Loans::all();
           // dd($loans);
           return view('Admin.Loans.index', compact('loans'));
    }

    public function index($id)
    {
        $loans = LoanApplication::where('loan_id', $id)->get();
        //dd( $loans);

        foreach ($loans as $loanApplication) {
           // dd( $loanApplication);

            $styling = array();

            $loansRepository = new LoansRepository();
            $loanStatus = $loansRepository->loansStatusReport($loanApplication);
            //dd( $loanStatus);
            $loanApplication = $loanStatus['loanApplication'];
            $loanApplication->loan_duration = $loanApplication->loan_duration . " Days";
            $styling = $loanStatus['styling'];
        }
        $loandata['loan'] = $loans;

        return view("Admin.Loans.ProcessLoan.index", compact('loans'));
    }
    public function show($id)
    {
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

        return view("Admin.Loans.ProcessLoan.show", compact('appliedLoan'));
    }

    public function edit($id)
    {
        $loan = Loans::where('id', $id)->first();

        $loandata['loan'] = $loan;
        return view("Admin.Loans.ProcessingLoan.edit", compact('$loandata'));
    }

    public function update(Request $request, $id)
    {
        //    $request->validate([
        //        'id'=> "required",
        //        "userid"=>"required",
        //        "password"=>"required",
        //    ]);



        $loan = LoanApplication::where('id', $id)->first();
        //dd($loan);
        $loan->update([
            'loan_status' => 0,
            'loan_assigned_at' => now(),
            'loan_assigned_by' => auth()->user()->id,

        ]);

        return redirect('/admin/loans/appliedloans/show/' . $id)->with('success', 'Loan Proccessed Successfully');
    }

    public function destroy($id)
    {
        $loanApplication = LoanApplication::where('id', $id)->first();
        $loan_id = $loanApplication->loan_id;

        $loanApplication = LoanApplication::destroy($id);


        return redirect('/admin/loans/appliedloans/index/'. $loan_id)->with('success', 'Deletion Successfull');
    }
}
