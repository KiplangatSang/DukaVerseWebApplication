<?php

namespace App\Subscriptions;

use App\Retails\Retail;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    //

    protected $guarded = [];

    public function subscriptionable()
    {
        # code...
    }

     public function retails()
    {
        # code...
        return $this->belongsTo(Retail::class);
    }



}
