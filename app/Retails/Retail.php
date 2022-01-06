<?php

namespace App\Retails;

use Illuminate\Database\Eloquent\Model;

class Retail extends Model
{
    //

    public function Retails(){

        $this->hasMany(Retails::class);
    }
}
