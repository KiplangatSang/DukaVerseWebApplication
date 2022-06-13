<?php

namespace App\Customers;

use Illuminate\Database\Eloquent\Model;

class CustomerCredit extends Model
{
    //
    protected $guarded = [];

    public function creditable()
    {
        return $this->morphTo();
    }
}
