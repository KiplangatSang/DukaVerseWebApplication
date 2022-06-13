<?php


namespace App\Billing\BillPayment;

interface BillPaymentContract{

    public function setPaymentName( $loan);
    public function setGateWay($gateWay);
    public function setAccount($account);
    public function setPaymentAmount($amount);
    public function payBill($user,$amount);
    public function setPaymentStatus($key);
    public function setPaymentDate();
    public function makeHttp($url,$params);


}
