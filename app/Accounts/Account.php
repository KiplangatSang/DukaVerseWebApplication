<?php

namespace App\Accounts;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //
    protected $guarded = [];

     public function accountable()
    {
        # code...
        return $this->morphTo();
    }
}
