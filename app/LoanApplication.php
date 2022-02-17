<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    //

    protected $guarded =[];


    public function loanapplicable()
    {

        return $this->morphTo(User::class);

    }
}
