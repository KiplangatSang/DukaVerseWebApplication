<?php

namespace App\Http\Controllers\Admin\Loans;

use App\Http\Controllers\Controller;
use App\Loans\Loans;
use App\User;
use Exception;
use Illuminate\Http\Request;

class AdminLoansController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $loans = Loans::all();
        // dd($loans);
        return view('Admin.Loans.Loans.index', compact('loans'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.loans.create', compact('create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(
            [
                'loan_type' => 'required',
                'min_loan_range' => 'required',
                'max_loan_range' => 'required',
                'loan_interest_rate' => 'required',
                'loan_description' => 'required',
            ]
        );

        $user_id = auth()->user()->id;
        $user = User::where('id', $user_id)->first();
        $user->loans()->create(
            [
                'loan_type' => $request->loan_type,
                'min_loan_range' => $request->min_loan_range,
                'max_loan_range' => $request->max_loan_range,
                'loan_interest_rate' => $request->loan_interest_rate,
                'loan_description' => $request->loan_description,
            ]
        );

        return redirect('/admin/loans/index')->with('success', 'Loan Created Successfully');
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
        $loan = Loans::where('id', $id)->first();
        $creater = User::where('id',$loan->loanable_id)->first();

       // dd($creater);

        $loansdata = array();
        $loansdata['loan'] = $loan;
        $loansdata['user'] = $creater;

        return view('Admin.Loans.Loans.show', compact('loansdata'));
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
        $loansdata = array();
        $loansdata['loan'] = $loan;
        return view('Admin.Loans.Loans.edit', compact('loansdata'));
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
        $loan = Loans::where('id', $id)->first();
        // dd($loan);
        $user_id = auth()->user()->id;
        $user = User::where('id', $user_id)->first();


            $user ->loans()->updateOrCreate(
                [
                    'loan_description' => $request->loan_description,

                    'loan_type' => $request->loan_type,

                ],
                [
                'min_loan_range' => $request->min_loan_range,
                'max_loan_range' => $request->max_loan_range,
                'loan_interest_rate' => $request->loan_interest_rate,
                'loan_description' => $request->loan_description,
                ]
            );
            try { } catch (Exception $exception) {
            $exception->getMessage();
            sleep(2);
            return redirect('/admin/loans/index')->with('message', 'Loan Could not be Processed');
        }
        sleep(3);

        return redirect('/admin/loans/show/' . $id)->with('success', 'Loan Update Successfull');
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
        Loans::destroy($id);
        return redirect('/admin/loans/index')->with('success', 'Deletion made successfully ');
    }




    // public function showAppliedLoans()
    // {

    //     $user = auth()->user();
    //     $loans = Loans::whereIn('loanapplicable_id', $user)->orderBy('created_at', 'DESC')->get();


    //     foreach ($loans as $loan) {
    //         if ($loan->loan_status == -1) {
    //             $loan->loan_status = "Waiting";
    //             $loan->loan_assigned_at = "N/A";
    //             $loan->loan_assigned_by =  "N/A";
    //             $loan->loan_repaid_amount =  "N/A";
    //         } elseif ($loan->loan_status == 0) {
    //             $loan->loan_status = "Processed";
    //         } else {
    //             $loan->loan_status = "Paid";
    //         }


    //     }





    //     return view('Loans.loan', compact('loans'));
    // }

    public function applyLoan($loan_id, $amount)
    {
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //

    //     return redirect("admin/loans/idex");
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //

    //     return redirect("admin/loans/show/".$id);
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    //     Loans::destroy($id);
    //     return redirect("admin/loans/idex");
    // }
}
