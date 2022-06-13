<?php


namespace App\Billing;

use App\Billing\BillsContract;
use App\Bills\Bills;

abstract class Billing implements BillsContract
{
    protected ?Bills $bills = null;
    public function __construct(Bills $bills)
    {
        $this->bills = $bills;
    }

    public function setBillType(Bills $bills)
    {
    }

    public function setDuration($amount)
    {
        return $this->calculateLoanDuration($amount);
    }

    public function setDiscount($amount)
    {

        $discount = $this->calculateDiscount($amount);
        return $discount;
    }

    public function setCharge($amount, $interestRate)
    {
        $duration = $this->setDuration($amount);
        return $this->calculateCharge($amount, $interestRate, $duration);
    }

    public function calculateDiscount($amount)
    {
        # code...
        $discount = null;

        switch ($amount) {
            case $amount < 10000:
                $discount = 0;
                break;
            case $amount > 10000:
                $discount = 0;
                break;
            default:
                return 0;
        }
        return $discount;
    }

    public function calculateCharge($amount)
    {
        # charge in shillings
        $charge =  $amount - $this->calculateDiscount($amount);
        return $charge;
    }

    public function calculateLoanDuration($amount)
    {
        #loan duration is in days
        $duration = null;

        switch ($amount) {
            case $amount < 10000:
                $duration = 30;
                break;
            case $amount > 10000 && $amount < 50000:
                $duration = 60;
                break;
            case $amount > 50000 && $amount < 100000:
                $duration = 90;
                break;
            case $amount > 100000:
                $duration = 120;
                break;
            default:
                return 0;



                return $duration;
        }
    }
}
