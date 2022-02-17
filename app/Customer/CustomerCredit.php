<?php

namespace App\Customer;

use Illuminate\Database\Eloquent\Model;

class CustomerCredit extends Model
{
    //
    protected $guarded = [];

    public function custcreditable(){
     return $this->morphTo();

    }

}
