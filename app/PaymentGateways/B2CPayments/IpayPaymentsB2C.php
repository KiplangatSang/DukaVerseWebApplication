<?php

namespace App\Repositories\Payments\B2CPayments;

use App\Repositories\Payments\IpayData;

class IpayPaymentsB2C extends IpayData
{
    private  function __construct($account,$amount,$phone_no, $narration)
    {
        $this->baseUrl = env('IPAY_BASE_URL');
        $this->account =$account;
        $this->amount =$amount;
        $this->phone_no =$phone_no;
        $this->narration =$narration;
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


    //sending money pesalink

    public function sendMoney()
    {
        // available channels = mpesapaybill $ mpesatill
        $data = $this->ipayData();

        $amount = $data['amount'];
        $reference = $data['reference'];
        $vid = $data['vid'];

        $sendernames = "sendernames";
        $narration = "test";
        $bankcode = "bankcode";
        $bankaccount = $data['account'];


        $key = 'demoCHANGED';

        $datastring = "amount=" . $amount . "&bankaccount=" . $bankaccount . "&bankcode=" . $bankcode . "&narration=" . $narration . "&reference=" . $reference . "&sendernames=" . $sendernames . "&vid=" . $vid;

        $generated_hash = hash_hmac('sha256', $datastring, $key);

        $body = array();
        $body['amount'] = $amount;
        $body['reference'] = $reference;
        $body['vid'] = $vid;
        $body['sendernames'] = $sendernames;
        $body['narration'] = $narration;
        $body['bankcode'] = $bankcode;
        $body['bankaccount'] = $bankaccount;
        $body['hash'] = $generated_hash;


        $params = http_build_query($body, '', '&');

        if(!$params){
            return false;
        }
        return $params;
    }

    public function transactionStatus()
    {
        $data = $this->ipayData();

        $vid = $data['vid'];
        $reference = $data['reference'];


        $key = 'demoCHANGED';

        // $datastring = $vid.$reference;
        $datastring = "vid=" . $vid . "&reference=" . $reference;

        $generated_hash = hash_hmac('sha256', $datastring, $key);

        $body = array();
        $body['vid'] = $vid;
        $body['reference'] = $reference;
        $body['hash'] = $generated_hash;

        $params = http_build_query($body, '', '&');


        //dd($params);


        $url = $this->baseUrl . "transaction/status";

        $responseData = $this->makeHttp($url, $params);

        return $responseData;
    }
}
