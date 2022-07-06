<?php


namespace App\Admin\Loaning\LoanDisbursment;

abstract class LoanDisbursment implements LoanDisbursmentContract
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
    public function setDisbursmentStatus($key)
    {
        $status = "failed";
        if ($key = 1) {
            $status = "sucess";
        }
        return $status;
    }

    public function makeHttp($url, $params)
    {
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => $url,
                CURLOPT_HEADER => false,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $params,

            )

        );
        $curl_response = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($curl_response);
        return $response;
    }
}
