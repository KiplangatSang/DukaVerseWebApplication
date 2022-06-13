<?php

namespace App\RequiredItems;

use Illuminate\Database\Eloquent\Model;

class RequiredItems extends Model
{
    //

    protected $guarded =[];

    public function requiredable(){
        return $this->morphTo();
      }
}
