<?php

namespace App\Retails*;

use Illuminate\Database\Eloquent\Model;

use App\Retails\Retails;

class RetailOwner extends Model
{
    public function RetailOwnerWithRetail(){
    $retailowner = App\RetailOwner;
    $retailowner->hasMany(Retails::class);
    }
}
