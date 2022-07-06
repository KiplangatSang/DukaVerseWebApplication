<?php


namespace App\Admin\Loaning\LoanPayment;

abstract class LoanPayment implements LoanPaymentContract
{
    protected $loan, $gateWay, $amount;
    public function __construct($loan, $gateWay, $amount)
    {
    }
    public function setPaymentName($loan)
    {
        return $loan;
    }
    public function setGateWay($gateWay)
    {
        return $gateWay;
    }
    public function setAccount($account)
    {
        return $account;
    }
    public function setPaymentAmount($amount)
    {
        return $amount;
    }
    public function setPaymentDate()
    {
        $date = now();
        return $$date;
    }
    public function setPaymentStatus($key)
    {
        $status = "failed";
        if ($key) {
            $status = "sucess";
        }
        return $status;
    }


}
