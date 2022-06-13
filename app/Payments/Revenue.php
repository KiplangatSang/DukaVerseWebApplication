<?php

namespace App\Payments;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    //
    protected $guarded = [];

    public function revenueable()
    {
        # code...
        return $this->morphTo();
    }
}
