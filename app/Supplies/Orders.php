<?php

namespace App\Supplies;

use App\Retails\Retail;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $guarded = [];

    public function orderable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->morphedByMany(User::class, 'orderable');
    }


    public function supplier()
    {
        return $this->belongsTo(Suppliers::class);
    }
}
