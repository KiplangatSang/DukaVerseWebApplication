<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Retails\RetailOwner;

class Retails extends Model
{
    public function RetailOwner(){
    $this->belongsToMany(RetailOwner::class);
    }
}
