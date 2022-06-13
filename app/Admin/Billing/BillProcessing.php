<?php


namespace App\Billing;

use App\Billing\BillsContract;
use App\Bills\Bills;
use App\LoanApplication;
use App\Loans\Loans;

class BillProcessing extends Billing implements BillsContract{
  protected ?Bills $bill = null;
  protected $duration = null;
  protected $interestRate = null;
  protected $discount = null;
  protected $charge = null;

    public function __construct(Bills $bill)
    {
        $this->bill = $bill;
        $this->amount = $this->setBillType($this->bill->amount);
        $this->duration = $this->setDuration($this->amount);
        $this->discount = $this->setDiscount($this->amount);
        $this->charge = $this->setCharge($this->amount, $this->interestRate);

    }
    public function getLoanType(){
      return  $this->bill;
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
