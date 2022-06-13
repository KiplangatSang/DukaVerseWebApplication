<?php


namespace App\Loaning;

use App\LoanApplication;
use App\Loans\Loans;

abstract class Loaning implements LoansContract{
    protected ?LoanApplication $loan = null;
    public function __construct(LoanApplication $loan)
    {
        $this->loan = $loan;

    }

    public function setLoanType(LoanApplication $loan){
    }

    public function setDuration($amount){
       return $this->calculateLoanDuration($amount);
    }

    public function setDiscount($amount){

        $discount = $this->calculateDiscount($amount);
        return $discount;
    }

    public function setInterestRate($rate)
    {
        # code...
        return $rate;
    }

    public function setCharge($amount,$interestRate){
        $duration = $this->setDuration($amount);
        $interestRate = $this->setInterestRate($interestRate);
        return $this->calculateCharge($amount,$interestRate,$duration);
    }

    public function calculateDiscount($amount)
    {
        # code...
        $discount= null;

        switch ($amount) {
          case $amount < 10000:
            $discount = $amount* (5/100);
            break;
          case $amount > 10000 && $amount <50000:
            $discount = $amount* (7/100);;
            break;
          case $amount > 50000 && $amount <100000:
            $discount = $amount* (05/100);;
            break;
            case $amount > 100000:
                $discount = $amount* (10/100);;
                break;
          default:
            return 0;


        }
     return $discount;
    }

    public function calculateCharge($amount,$interest,$duration)
    {
        # charge in shillings
      $charge =  $amount*(1+($interest/100))/($duration/30);
      return $charge;
    }

    public function calculateLoanDuration($amount)
    {
        #loan duration is in days
        $duration= null;

        switch ($amount) {
          case $amount < 10000:
            $duration = 30;
            break;
          case $amount > 10000 && $amount <50000:
            $duration = 60;
            break;
          case $amount > 50000 && $amount <100000:
            $duration = 90;
            break;
            case $amount > 100000:
                $duration = 120;
                break;
          default:
            return 0;


        }
     return $duration;
    }

}
