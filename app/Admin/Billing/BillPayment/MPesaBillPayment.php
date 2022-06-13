<?php


namespace App\Billing\BillPayment;
use App\Billing\BillPayment\BillPayment;

class MPesaBillPayment extends BillPayment
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

     if($this->payBill($this->account,$this->amount)){
       $this->status =$this->setPaymentStatus(1);

     }else{
        $this->status =$this->setPaymentStatus(0);
     }
     $this->date = $this->setPaymentDate();

    }

    public function payBill($user, $amount)
    {

    }
}
