<?php

namespace App\Repositories\Payments\B2CPayments;

class IpayPayments
{
// base url
 static $baseUrl = "https://apis.ipayafrica.com/b2b/v1/";

public function ipayData()
{   $fields = array(
  "live"=> "0",
  "oid"=> "112ABcADQnppAPdd",
  "inv"=> "112ABcADQnppAPdd",
  "reference" =>  "112ABcADQnppAPdd",
  "account" => "112ABcADQnppAPdd",
  "amount"=> "900",
  "narration" => "test",
  "curr" =>"ksh",
  "tel"=> "254714680763",
  "eml"=> "kajuej@gmailo.com",
  "vid"=> "demo",
  "curr"=> "KES",
  "p1"=> "airtel",
  "p2"=> "020102292999",
  "p3"=> "",
  "p4"=> "900",
  "cbk"=> $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"],
  "cst"=> "1",
  "crl"=> "2"
  );

  return $fields;
}

//http request
public function makeHttp($url,$params){

    $curl = curl_init();
curl_setopt_array(
   $curl,
   array(
       CURLOPT_URL => $url,
       CURLOPT_HEADER => false,
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_SSL_VERIFYPEER => false,
       CURLOPT_SSL_VERIFYHOST => false,
       CURLOPT_POST =>true,
       CURLOPT_POSTFIELDS => $params,

   )

);
   $curl_response = curl_exec($curl);
   curl_close($curl);

   $response = json_decode($curl_response);
   return $response;

}


//sending money pesalink

public function sendMoney()
{
    // available channels = mpesapaybill $ mpesatill
    $data = $this->ipayData();

    $amount= $data['amount'];
    $reference = $data['reference'];
    $vid = $data['vid'];

    $sendernames = "sendernames";
    $narration ="test";
    $bankcode ="bankcode";
    $bankaccount = $data['account'];


    $key = 'demoCHANGED';

    $datastring = "amount=".$amount."&bankaccount=".$bankaccount."&bankcode=".$bankcode."&narration=".$narration."&reference=".$reference."&sendernames=".$sendernames."&vid=".$vid;

    $generated_hash = hash_hmac('sha256',$datastring , $key);

    $body = array();
    $body['amount']= $amount;
    $body['reference']= $reference;
    $body['vid']= $vid;
    $body['sendernames']= $sendernames;
    $body['narration']= $narration;
    $body['bankcode']= $bankcode;
    $body['bankaccount']= $bankaccount;
    $body['hash']= $generated_hash;


    $params = http_build_query($body, '', '&');


    //dd($params);


 $url = $this->baseUrl."/pesalink";

    $responseData = $this->makeHttp($url,$params);

    return $responseData;


}

public function transactionStatus()
{
    $data = $this->ipayData();

    $vid = $data['vid'];
    $reference = $data['reference'];


    $key = 'demoCHANGED';

   // $datastring = $vid.$reference;
    $datastring = "vid=".$vid."&reference=".$reference;

    $generated_hash = hash_hmac('sha256',$datastring , $key);

    $body = array();
    $body['vid']= $vid;
    $body['reference']= $reference;
    $body['hash']= $generated_hash;

    $params = http_build_query($body, '', '&');


    //dd($params);


 $url = $this->baseUrl."transaction/status";

    $responseData = $this->makeHttp($url,$params);

    return $responseData;

}


}
