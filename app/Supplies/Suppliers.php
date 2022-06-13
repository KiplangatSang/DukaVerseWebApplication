<?php

namespace App\Supplies;

use App\Retails\Retail;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    //

    protected $guarded = [];

    public function user()
    {
        return $this->morphedByMany(User::class, 'supplierable');
    }

    public function retail()
    {
        return $this->morphedByMany(Retail::class, 'supplierable');
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'supplierable');
    }
}
