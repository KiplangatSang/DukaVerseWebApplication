<?php

namespace App\Retails;

use Illuminate\Database\Eloquent\Model;

class SessionRetail extends Model
{
    //
    protected $guarded = [];

     public function retailable()
     {
         # code...
         return $this->morphTo();
     }
}
