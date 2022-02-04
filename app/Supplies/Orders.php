<?php

namespace App\Supplies;

use App\Retails\Retail;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
protected $guarded = [];

public function retails(){
return $this->morphedByMany(Retail::class,'orderable');
}

public function user(){
    return $this->morphedByMany(Retail::class,'orderable');
    }

}
