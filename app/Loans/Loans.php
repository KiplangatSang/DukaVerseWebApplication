<?php

namespace App\Loans;

use Illuminate\Database\Eloquent\Model;

class Loans extends Model
{
    //
    protected $guarded = [];


    public function loanable()
    {
        return $this->morphTo();
    }
}
