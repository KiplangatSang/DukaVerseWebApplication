<?php

namespace App\Customers;

use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    //
protected $guarded =[];

public function retails()
    {
        return $this->morphedByMany(Retail::class, 'customerable');
    }
}
