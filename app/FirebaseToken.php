<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FirebaseToken extends Model
{
    protected $table = 'firebase_token';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['email', 'name', 'fcmtoken'];
}
