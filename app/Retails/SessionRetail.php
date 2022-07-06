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

     public function retails()
     {
         # code...
         return $this->hasOne(Retail::class,"retail_id");
     }
}
