<?php


namespace App\Admin\Loaning\LoanPayment;


interface LoanPaymentContract{

    public function setPaymentName( $loan);
    public function setGateWay($gateWay);
    public function setAccount($account);
    public function setPaymentAmount($amount);
    public function pay();
    public function setPaymentStatus($key);
    public function setPaymentDate();
    public function makeHttp($url,$params);
    public function saveTransaction($transaction);
}
