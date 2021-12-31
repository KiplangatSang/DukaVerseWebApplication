<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    //

    protected $guarded =[];

    public function users(){
        return $this->morphedByMany(User::class,'taggable');
    }
}
