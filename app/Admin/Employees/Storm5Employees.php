<?php

namespace App\Admin\Employees;

use Illuminate\Database\Eloquent\Model;

class Storm5Employees extends Model
{
    //
    protected $guarded = [];

    public function storm5employeeable(){
        return $this->morphTo();
    }
}
