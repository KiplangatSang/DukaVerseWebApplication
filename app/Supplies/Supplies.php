<?php

namespace App\Supplies;

use Illuminate\Database\Eloquent\Model;

class Supplies extends Model
{
    protected $guarded =[];

    public function supplyable()
    {
        return $this->morphedTo();
    }
}
