<?php

namespace App\Repositories\Payments\B2BPayments;

class ipay
{

  // Base URL

  static $basurl = "";

  public function ipayData()
  {
    $fields = array(
      "live" => "0",
      "oid" => "112ABcADQnppAPdd",
      "inv" => "112ABcADQnppAPdd",
      "amount" => "900",
      "tel" => "254714680763",
      "eml" => "kajuej@gmailo.com",
      "vid" => "demo",
      "curr" => "KES",
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



  //http request
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

  public function fundBillingAccount()
  {
    # code...

    $fields = $this->ipayData();


    $hashkey = "demoCHANGED"; //use "demoCHANGED" for testing where vid is set to "demo"
    $timestamp = now('y-mm-dd-hmis');
    $vid = $fields['vid'];

    $curr = $fields['curr'];


    $datastring =  $vid . $timestamp . $curr;


    $generated_hash = hash_hmac('sha256', $datastring, $hashkey);
    $body = array();
    $body['vid'] = $vid;
    $body['time'] = $timestamp;
    $body['currency'] = $curr;
    $body['hash'] = $generated_hash;

    $params = $query = http_build_query($body, '', '&');



    $url = "https://apis.ipayafrica.com/payments/v2/billing/fund";

    $responseData = $this->makeHttp($url, $params);

    return $responseData;
  }





  // get Billers

  public function getBillersList()
  {


    $data = $this->ipayData();

    $vid = $data['vid'];

    $body = array();
    $body['vid'] = $vid;

    $params =  http_build_query($body, '', '&');
    $url = $this->basurl . "/billing/list";

    $responseData = $this->makeHttp($url, $params);
    dd($responseData);
    return $responseData;
  }

  //search transaction
  public function searchTransaction($billerCode)
  {
    $response = $this->initiatorRequest();

    // $billerCode = $response->data->biller_code;
    // dd($sid);

    $data = $this->ipayData();

    $vid = $data['vid'];

    $body = array();
    $body['vid'] = $vid;
    $body['biller_code'] = $billerCode;

    $params =  http_build_query($body, '', '&');
    $url = $this->basurl . "/billing/biller/status";

    $responseData = $this->makeHttp($url, $params);
    dd($responseData);
    return $responseData;
  }

  // make transaction

  public function recurringBilling($billerCode)
  {

    $data = $this->ipayData();

    $vid = $data['vid'];
    $amount = $data['amount'];
    $account = $data['tel'];
    $phone = $data['tel'];
    $merchant_reference = $data['oid'];

    $key = 'demoCHANGED';
    $datastring = $vid . $billerCode . $amount . $account . $phone . $merchant_reference;
    $generated_hash = hash_hmac('sha256', $datastring, $key);

    $body = array();

    $body['vid'] = $vid;
    $body['biller_code'] = $billerCode;
    $body['amount'] = $amount;
    $body['account'] = $account;
    $body['phone'] = $phone;
    $body['merchant_reference'] = $merchant_reference;
    $body['hash'] = $generated_hash;


    $params = http_build_query($body, '', '&');
    $url = $this->basurl . "/transaction/create";

    $responseData = $this->makeHttp($url, $params);
    dd($responseData);
    return $responseData;
  }

  // check Billing Status
  public function checkBillingStatus($reference)
  {
    $data = $this->ipayData();

    $vid = $data['vid'];
    $key = 'demoCHANGED';
    $datastring = $vid . $reference;
    $generated_hash = hash_hmac('sha256', $datastring, $key);


    $body = array();
    $body['vid'] = $vid;
    $body['reference'] = $reference;
    $body['hash'] = $generated_hash;



    $params =  http_build_query($body, '', '&');
    $url = $this->basurl . "/transaction/check/status";

    $responseData = $this->makeHttp($url, $params);
    dd($responseData);
    return $responseData;
  }


  // validate account
  //limited to only kenya power and nairobi water
  public function validateAccount($account, $account_type)
  {
    $data = $this->ipayData();

    $vid = $data['vid'];

    $key = 'demoCHANGED';


    $key = 'demoCHANGED';
    $datastring = $vid . $account . $account_type;
    $generated_hash = hash_hmac('sha256', $datastring, $key);


    $body = array();
    $body['vid'] = $vid;
    $body['account'] = $account;
    $body['account_type'] = $account_type;
    $body['hash'] = $generated_hash;



    $params =  http_build_query($body, '', '&');
    $url = $this->basurl . "/billing/validate/account";

    $responseData = $this->makeHttp($url, $params);
    dd($responseData);
    return $responseData;
  }

  // number lookup by prefix
  public function numberLookup($prefix)
  {
    $data = $this->ipayData();

    $vid = $data['vid'];



    $key = 'demoCHANGED';


    $key = 'demoCHANGED';
    $datastring = $vid . $prefix;
    $generated_hash = hash_hmac('sha256', $datastring, $key);


    $body = array();
    $body['vid'] = $vid;
    $body['prefix'] = $prefix;
    $body['hash'] = $generated_hash;



    $params =  http_build_query($body, '', '&');
    $url = $this->basurl . "/billing/phone/lookup";

    $responseData = $this->makeHttp($url, $params);
    dd($responseData);
    return $responseData;
  }


  //check the account balance in Ipay
  public function accountBalance($prefix)
  {
    $data = $this->ipayData();

    $vid = $data['vid'];

    $key = 'demoCHANGED';

    $datastring = $vid;
    $generated_hash = hash_hmac('sha256', $datastring, $key);

    $body = array();
    $body['vid'] = $vid;
    $body['hash'] = $generated_hash;

    $params =  http_build_query($body, '', '&');
    $url = $this->basurl . "/billing/account/balance";

    $responseData = $this->makeHttp($url, $params);
    dd($responseData);
    return $responseData;
  }
}
