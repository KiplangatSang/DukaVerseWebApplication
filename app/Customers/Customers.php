<?php

namespace App\Customers;

use App\Customer\CustomerCredit;
use App\Retails\Retail;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
protected $guarded =[];

public function retails()
    {
        return $this->morphedByMany(Retail::class, 'customerable');
    }

    public function credits()
    {
        return $this->morphMany(CustomerCredit::class, 'custcreditable');
    }

}
