<?php

namespace App\Repositories;

use App\LoanApplication;
use App\User;
use Exception;
use Illuminate\Http\Request;


class LoansRepository
{


      // routes to redirect on login
    public function loansStatusReport(LoanApplication $loanApplication){
        $statusCode = $loanApplication->loan_status;
        $loanStatus = array();
        $styling = array();
        if ($statusCode== -1) {
            $loanApplication->loan_status = "Waiting";
            $loanApplication->loan_assigned_at = "N/A";
            $loanApplication->loan_assigned_by =  "N/A";
            $loanApplication->loan_repaid_amount =  "N/A";
            $styling['loan_status_color']="text-danger";
        } elseif ($statusCode == 0) {
            $loanApplication->loan_status = "Processed";
                $styling['loan_status_color']="text-info";
                $loanApplication->loan_assigned_by = User::where('id',$loanApplication->loan_assigned_by)->first()->username;

        } else if($statusCode == 1){
            $loanApplication->loan_status = "Paid";
            $styling['loan_status_color']="text-success";
            $loanApplication->loan_assigned_by = User::where('id',$loanApplication->loan_assigned_by)->first()->username;

        }

        $loanStatus['styling'] = $styling;
        $loanStatus['loanApplication']  = $loanApplication;

        return $loanStatus;
    }


}
