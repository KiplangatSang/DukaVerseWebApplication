<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storm5Employees extends Model
{
    //
    protected $guarded = [];

    public function storm5employeeable(){
        return $this->morphTo();
    }
}
