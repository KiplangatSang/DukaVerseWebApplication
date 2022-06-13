<?php

namespace App\Payments;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    //
    protected $guarded = [];

    public function expenseable()
    {
        # code...
        return $this->morphTo();
    }
}
