<?php

namespace App\Profiles;

use App\User;
use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    //
    protected $guarded = [];

    public function user()
    {
        # code...
        return $this->belongsTo(User::class);
    }
}
