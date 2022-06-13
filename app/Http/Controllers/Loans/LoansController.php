<?php

namespace App\Http\Controllers\Loans;

use App\Http\Controllers\Controller;
use App\LoanApplication;
use App\Loans\Loans;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoansController extends Controller
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
        $loans = Loans::all();
        // dd($loans);
        return view('client.loans.loanitems.index', compact('loans'));
    }


    public function showAppliedLoans()
    {

        $user = auth()->user();
        $loans = LoanApplication::whereIn('loanapplicable_id', $user)->orderBy('created_at', 'DESC')->get();


        foreach ($loans as $loan) {
            if ($loan->loan_status == -1) {
                $loan->loan_status = "Waiting";
                $loan->loan_assigned_at = "N/A";
                $loan->loan_assigned_by =  "N/A";
                $loan->loan_repaid_amount =  "N/A";
            } elseif ($loan->loan_status == 0) {
                $loan->loan_status = "Processed";
            } else {
                $loan->loan_status = "Paid";
            }


        }





        return view('client.loans.loan', compact('loans'));
    }

    public function applyLoan($loan_id, $amount)
    {

        $loan = Loans::where('id', $loan_id)->first();
        // dd($loan);

        try {
            auth()->user()->LoanApplication()->create(
                [
                    'loan_type' => $loan->loan_type,
                    'loan_id' => $loan->id,
                    'loan_amount' => preg_replace('/\s+/', '', $amount),
                    'loan_duration' => 30,
                    'loan_interest' => $loan->loan_interest_rate,
                    'loan_status' => -1,
                    'loan_assigned_at' => null,
                    'loan_assigned_by' => null,
                    'loan_repaid_amount' => 0.0

                ]
            );
        } catch (Exception $exception) {
            $exception->getMessage();
            sleep(2);
            return redirect('/get-available-loans')->with('message', 'Loan Could not be Processed');
        }
        sleep(3);
        return redirect('/loans/show-my-loans')->with('success', 'Loan Application Successful');
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
