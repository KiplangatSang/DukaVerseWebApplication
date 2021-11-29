<?php

namespace App\Retails\Retails;

use Illuminate\Database\Eloquent\Model;

use App\Retails\Retails;

class RetailOwner extends Model
{
    public function RetailOwnerWithRetail(){
    $retailowner = RetailOwner;
    $retailowner->hasMany(Retails::class);
    }
}
