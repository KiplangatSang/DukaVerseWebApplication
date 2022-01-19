<?php

namespace App;

use App\Retails\Retail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function Roles(){
        return $this->morphOne(Roles::class,'roleable');
    }

    public function tags(){
        return $this->morphToMany(Tags::class,'taggable');
    }


    public function Retails(){
        return $this->morphMany(Retail::class,'retailable');
    }

    public function LoanApplication(){
        return $this->morphMany(LoanApplication::class,'loanapplicable');
    }

    // public function Sales(){
    //     return $this->hasOne(Roles::class);
    // }

}
