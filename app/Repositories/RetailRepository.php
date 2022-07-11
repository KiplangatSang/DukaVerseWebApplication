<?php

namespace App\Repositories;

use App\Retails\Retail;
use App\User;

class RetailRepository
{
    private $user;
    public function __construct(User $user = null, Retail $retail = null)
    {
        $this->user = $user;
    }

    public function retails()
    {
        $retails = $this->user->retails()->first();
        return $retails;
    }

    public function storeRetailInSession($retailId)
    {
        # code...
        $user =  User::where('id', auth()->id())->first();
        $retail =  Retail::where('id', $retailId)->first();
        //dd( $retail);
        $result =  $user->sessionRetail()->updateOrCreate(
            [
                'retail_id' => $retail->id,
            ],
            [
                'retailNameId' => $retail->retail_Id,
            ]
        );
       // dd($result);
        if (!$result)
            return false;
        return $retail;
    }

    public function getPaymentPreferences()
    {
        # code...

        $paymentPref = array(
            "mpesapaybill" => "mpesapaybill",
            "mpesatill" => "mpesatill",
            "dukaverse" => "dukaverse",
        );

        return $paymentPref;
    }
}
