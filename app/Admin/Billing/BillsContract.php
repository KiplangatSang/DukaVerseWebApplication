<?php


namespace App\Billing;

use App\Bills\Bills;

interface BillsContract{

    public function setBillType(Bills $bill);
    public function setDiscount($amount);
    public function calculateCharge($amount);
}
