<?php

namespace App\Repositories\Payments\C2BPayments;

class IpayPayments
{


    //check hash
    $key = "SECretKey";
    //use "demoCHANGED" for testing where vid is set to "demo"
    $datastring = $live.$oid.$inv.$amount.$tel.$eml.$vid.$curr.$p1.$p2.$p3.$p4.$cst.$cbk;
    /*********************************************************************************************************/

    $generated_hash = hash_hmac('sha256',$datastring , $key);
    /**********************************************************************************************************/




}
