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

    public function loans()
    {
        # code...
    return $this->belongsTo(Loans::class,'loans_id');
    }
}
