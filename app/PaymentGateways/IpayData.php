<?php

namespace App\Repositories\Payments;

abstract class IpayData
{
    // base url
    static $baseUrl = null;
    private $user,$amount,$narration,$phone_no,$account= null;

    public function ipayData()
    {
        $narration = "test";
        if(env('IPAY_ENV') == 1){
            $narration ="live";
        }
        $fields = array(
            "live" => "0",
            "oid" => "112ABcADQnppAPdd",
            "inv" => "112ABcADQnppAPdd",
            "reference" =>  "112ABcADQnppAPdd",
            "account" => $this->account,
            "amount" => $this->amount,
            "narration" =>$this->narration,
            "curr" => env('IPAY_CURRENCY'),
            "tel" => $this->phone_no,
            "eml" => "kajuej@gmailo.com",
            "vid" => env("IPAY_VENDOR_ID"),
            "p1" => "airtel",
            "p2" => "020102292999",
            "p3" => "",
            "p4" => "900",
            "cbk" => $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"],
            "cst" => "1",
            "crl" => "2"
        );

        return $fields;
    }
}
