<?php


namespace App\Loaning\LoanDisbursment;

use App\LoanApplication;
use App\Loans\Loans;

interface LoanDisbursmentContract{

    public function setPaymentName( $loan);
    public function setGateWay($gateWay);
    public function setAccount($account);
    public function setPaymentAmount($amount);
    public function disburseMoney($user,$amount);
    public function setDisbursmentStatus($key);
    public function setPaymentDate();
    public function makeHttp($url,$params);


}
