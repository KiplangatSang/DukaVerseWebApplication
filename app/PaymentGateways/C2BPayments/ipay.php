<?php

namespace App\Repositories\Payments\B2BPayments;

class ipay
{
    /*
    This is a sample PHP script of how you would ideally integrate with iPay Payments Gateway and also handling the
    callback from iPay and doing the IPN check

************(A.) INTEGRATING WITH iPAY ***********************************************
    ----------------------------------------------------------------------------------------------------
    */
    //Data needed by iPay a fair share of it obtained from the user from a form e.g email, number etc...

  // data
   public function ipayData()
  {   $fields = array(
    "live"=> "0",
    "oid"=> "112ABcADQnppAPdd",
    "inv"=> "112ABcADQnppAPdd",
    "amount"=> "900",
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



   public function initiatorRequest(){
    $fields =$this->ipayData();

    // $datastring =  $fields['live'].$fields['oid'].$fields['inv'].$fields['ttl'].$fields['tel'].$fields['eml'].$fields['vid'].$fields['curr'].$fields['p1'].$fields['p2'].$fields['p3'].$fields['p4'].$fields['cbk'].$fields['cst'].$fields['crl'];
    // $fields['crl']; .$fields['ttl']
    // $datastring = $live.$oid.$inv.$amount.$tel.$eml.$vid.$curr.$p1.$p2.$p3.$p4.$cst.$cbk;

    $hashkey ="demoCHANGED";//use "demoCHANGED" for testing where vid is set to "demo"


    $datastring =  $fields['live'].$fields['oid'].$fields['inv'].$fields['amount'].$fields['tel'].$fields['eml'].$fields['vid'].$fields['curr'].$fields['p1'].$fields['p2'].$fields['p3'].$fields['p4'].$fields['cst'].$fields['cbk'];


    //dd($fields);
    /********************************************************************************************************
    * Generating the HashString sample
    */
    $generated_hash = hash_hmac('sha256',$datastring , $hashkey);
    $body = array();

    foreach ($fields as $key => $value) {
        $body[$key] = $value;
    }
    $body['hash']= $generated_hash;
    //$body = json_encode($body);
    $params = $query = http_build_query($body, '', '&');


    //dd($params);

    $url = "https://apis.ipayafrica.com/payments/v2/transact";

    $responseData = $this->makeHttp($url,$params);

    return $responseData;


   }

 // mobile money transact call

 public function mobileMoneyTransact(){
     $response = $this->initiatorRequest();

     $sid = $response->data->sid;
    // dd($sid);

     $data = $this->ipayData();

     $vid =$data['vid'];

    $key = 'demoCHANGED';

    $body = array();
    $body['vid'] =$vid;
    $body['sid'] =$sid;

    $datastring = $sid.$vid;
    $generated_hash = hash_hmac('sha256',$datastring , $key);
    $body['hash']= $generated_hash;


    $params = $query = http_build_query($body, '', '&');
    $url = "https://apis.ipayafrica.com/payments/v2/transact/mobilemoney";

    $responseData = $this->makeHttp($url,$params);
 dd($responseData);
    return $responseData;
 }

 //search transaction
 public function searchTransaction()
 {
   // $response = $this->initiatorRequest();

   // $sid = $response->data->sid;
   // dd($sid);

    $data = $this->ipayData();

    $oid =$data['oid'];
   //$oid ='34b674';

    $vid =$data['vid'];

   $key = 'demoCHANGED';

   $body = array();
   $body['oid'] =$oid;
   $body['vid'] =$vid;

   $datastring = $oid.$vid;
   $generated_hash = hash_hmac('sha256',$datastring , $key);
   $body['hash']= $generated_hash;


   $params = $query = http_build_query($body, '', '&');
   $url = "https://apis.ipayafrica.com/payments/v2/transaction/search";

   $responseData = $this->makeHttp($url,$params);
dd($responseData);
   return $responseData;

 }

 // recurring billing

 public function recurringBilling()
 {
     $response = $this->initiatorRequest();

    $sid = $response->data->sid;
   // dd($sid);

   $data = $this->ipayData();

   $email  = $data['eml'];
   $cardid = 4242424242424242;
   $phone =$data['tel'];



   $vid =$data['vid'];

  $key = 'demoCHANGED';
  $datastring = $sid.$vid.$email.$cardid.$phone;
  $generated_hash = hash_hmac('sha256',$datastring , $key);

  $body = array();

  $body['vid'] =$vid;
  $body['sid'] =$sid;
  $body['email'] =$email;
  $body['cardid'] =$cardid;
  $body['phone'] =$phone;
  $body['hash']= $generated_hash;


  $params = http_build_query($body, '', '&');
  $url = "https://apis.ipayafrica.com/payments/v2/transact/cc/recurring ";

  $responseData = $this->makeHttp($url,$params);
dd($responseData);
  return $responseData;
 }

// refund
 public function refund()
 {
    $data = $this->ipayData();
    $response = $this->initiatorRequest();


   $code = "1539630706A";
   $vid =$data['vid'];

   $amount = 50;






  $key = 'demoCHANGED';
  $datastring = "code=".$code."&vid=".$vid;
  $generated_hash = hash_hmac('sha256',$datastring , $key);

  $body = array();

  $body['vid'] =$vid;
  $body['code'] =$code;
  $body['hash']= $generated_hash;
  $body['amount'] =$amount;

  $params = http_build_query($body, '', '&');
  $url = "https://apis.ipayafrica.com/payments/v2/transaction/refund";

  $responseData = $this->makeHttp($url,$params);
dd($responseData);
  return $responseData;
 }



    }
