<?php

namespace App\Accounts;

use App\Employees\RetailSalary;
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

    public function retailSalary()
    {
        # code...
      return $this->hasMany(RetailSalary::class,"account_id");
    }
}
