<?php

namespace App\Accounts;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $guarded = [];


    public function transactionable()
    {
        # code...
        return $this->morphTo();
    }

    public function purposeable()
    {
        # code...
        return $this->morphTo();
    }
}
