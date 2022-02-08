<?php

namespace App\Supplies;

use App\Retails\Retail;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
protected $guarded = [];

public function retails(){
return $this->morphedByMany(Retail::class,'orderable');
}

public function user(){
    return $this->morphedByMany(User::class,'orderable');
    }

}
