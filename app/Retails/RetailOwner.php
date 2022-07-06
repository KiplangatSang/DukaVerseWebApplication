<?php

namespace App\Retails;

use Illuminate\Database\Eloquent\Model;

class RetailOwner extends Model
{
    //


    protected $guarded = [];

    public function retails()
    {
        return $this->morphedByMany(Retail::class, 'retailownerable');
    }


    public function retailownerable()
    {
        return $this->morphedByMany(Retail::class, 'retailownerable');
    }
}
