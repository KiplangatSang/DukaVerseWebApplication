<?php

namespace App\Retails;

use Illuminate\Database\Eloquent\Model;

class RetailOwner extends Model
{
    //
    public function Retails(){

        $this->hasMany(Retails::class);
        }
}
