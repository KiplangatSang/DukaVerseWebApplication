<?php


namespace App\Loaning;

use App\LoanApplication;
use App\Loans\Loans;

interface LoansContract{

    public function setLoanType(LoanApplication $loan);
    public function setDuration($amount);
    public function setDiscount($amount);
    public function charge($amount);
    public function setInterestRate($rate);

}
