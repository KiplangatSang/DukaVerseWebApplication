<?php

namespace App\Repositories;

use App\Loans\LoanApplication;
use App\Loans\Loans;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


class LoansRepository
{

    private $retail;
    public function __construct($retail)
    {
        $this->retail = $retail;
    }

    //get all Loans
    public function getLoanApplications()
    {

        $loanApplications = $this->retail->loanApplications()->get();

        $loanApplications = LoanApplication::all();

        foreach ($loanApplications as $application) {
            $application['loan'] =  $application->loans()->first();
        }
        return $loanApplications;
    }

    public function getLoans()
    {
        # code...
        $loans = $this->retail->loans()->get();
        return $loans;
    }

    // routes to redirect on login
    public function loansStatusReport(LoanApplication $loanApplication)
    {
        $statusCode = $loanApplication->loan_status;
        $loanStatus = array();
        $styling = array();
        if ($statusCode == -1) {
            $loanApplication->loan_status = "Waiting";
            $loanApplication->loan_assigned_at = "N/A";
            $loanApplication->loan_assigned_by =  "N/A";
            $loanApplication->loan_repaid_amount =  "N/A";
            $styling['loan_status_color'] = "text-danger";
        } elseif ($statusCode == 0) {
            $loanApplication->loan_status = "Processed";
            $styling['loan_status_color'] = "text-info";
            $loanApplication->loan_assigned_by = User::where('id', $loanApplication->loan_assigned_by)->first()->username;
        } else if ($statusCode == 1) {
            $loanApplication->loan_status = "Paid";
            $styling['loan_status_color'] = "text-success";
            $loanApplication->loan_assigned_by = User::where('id', $loanApplication->loan_assigned_by)->first()->username;
        }

        $loanStatus['styling'] = $styling;
        $loanStatus['loanApplication']  = $loanApplication;

        return $loanStatus;
    }

    public function loanTypes()
    {
    }

    public function createLoans()
    {
        $faker = new Faker();
        return [
            //
            'loanable_id' => rand(1, 2),
            'loanable_type' => "App/User",
            'loan_type' => Str::random(10),
            'min_loan_range' => rand(1000, 100000),
            'max_loan_range' => rand(10000, 1000000),
            'repayment_status' => rand(-1, 1),
            'loan_interest_rate' => rand(10, 25),
            'loan_description' => $faker->paragraph(4),
            'active_loan_users' => rand(100, 1000),
            'active_loan_repayments' => rand(100, 1000),
            'passive_loan_users' => rand(100, 1000),
            'passive_loan_repayments' => rand(100, 1000),
        ];
    }

    //get loan  application by id

    public function getLoanApplicationById($id)
    {
        # code...
        $loanApplication = $this->retail->loanApplications()->where('id', $id)->first();

            $loanApplication['loan'] =  $loanApplication->loans()->first();
        return $loanApplication;
    }
}
