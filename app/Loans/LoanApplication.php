<?php

namespace App\Loans;

use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    //

    protected $guarded = [];


    public function loanapplicable()
    {
        return $this->morphTo();
    }
}
