<?php

namespace App\Accounts;

use Illuminate\Database\Eloquent\Model;

class Regulations extends Model
{
    //
    protected $guarded = [];

    public function transactionable()
    {
        # code...
        return $this->morphTo();
    }
}
