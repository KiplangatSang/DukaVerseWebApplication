<?php

namespace App\Bills;

use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    //
    protected $guarded =[];

    public function billable()
    {
        return $this->morphTo();
    }

}
