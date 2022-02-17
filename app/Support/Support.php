<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use phpDocumentor\Reflection\Types\Void_;

class Support extends Model
{
    //

    protected $guarded = [];


    public function supportable(){
         return $this->MorphTo();
    }


}
