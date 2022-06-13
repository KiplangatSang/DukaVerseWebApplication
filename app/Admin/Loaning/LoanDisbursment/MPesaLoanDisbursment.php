<?php


namespace App\Loaning\LoanDisbursment;


class MPesaLoanDisbursment extends LoanDisbursment
{
    protected $loan,$gateWay,$account,$amount,$status,$date;
    public function __construct($loan,$gateWay,$account,$amount)
    {
       $this->loan = $this->setPaymentName($loan);
       $this->gateWay = $this->setGateWay($gateWay);
       $this->account = $this->setAccount($account);
       $this->amount = $this->setPaymentAmount($amount);

    }

    private function transactMoney(){

     if($this->disburseMoney($this->account,$this->amount)){
       $this->status =$this->setDisbursmentStatus(1);

     }else{
        $this->status =$this->setDisbursmentStatus(0);
     }
     $this->date = $this->setPaymentDate();

    }

    public function disburseMoney($account,$amount)
    {


    }
}
