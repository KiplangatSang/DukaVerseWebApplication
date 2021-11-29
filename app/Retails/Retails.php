<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Retails\RetailOwner;

class Retails extends Model
{
    public function retailOwner(){
    $retails = Retails;
    $retails->belongsToMany(RetailOwner::class);
    }
}
