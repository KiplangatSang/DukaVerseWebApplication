<?php


namespace App\Loaning;

use App\LoanApplication;
use App\Loans\Loans;

class LoanProcessing extends Loaning implements LoansContract{
  protected ?LoanApplication $loanApplication = null;
  protected $duration = null;
  protected $interestRate = null;
  protected $discount = null;
  protected $charge = null;

    public function __construct(LoanApplication $loanApplication)
    {
        $this->loanApplication = $loanApplication;
        $this->amount = $this->setLoanType($this->loanApplication->amount);
        $this->duration = $this->setDuration($this->amount);
        $this->discount = $this->setDiscount($this->amount);
        $this->interestRate = $this->setInterestRate($this->loanApplication->rate);
        $this->charge = $this->setCharge($this->amount, $this->interestRate);

    }
    public function getLoanType(){
      return  $this->loanApplication;
    }
    public function getDuration(){

      return $this->duration;
    }
    public function getDiscount(){
        return $this->discount;
    }
    public function getCharge(){
        return $this->interest;
    }
    public function getInterestRate(){
       return  $this->interestRate;
    }

}
