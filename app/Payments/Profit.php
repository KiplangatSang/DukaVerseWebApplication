<?php

namespace App\Payments;

use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    //
    protected $guarded = [];

    public function profitable()
    {
        return $this->morphTo();
    }
}
