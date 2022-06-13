<?php

namespace App;

use App\Bills\Bills;
use App\Loans\Loans;
use App\Profiles\profiles;
use App\Retails\Retail;
use App\Retails\SessionRetail;
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
        'username', 'email', 'password', 'month',
        'year', 'remember_token','api_token','phoneno','userpin',
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


    public function retails(){
        return $this->morphMany(Retail::class,'retailable');
    }

    public function storm5Employees(){
        return $this->morphMany(Storm5Employees::class,'storm5employeeable');
    }

    public function bills(){
        return $this->morphMany(Bills::class,'billable');
    }
    public function sessionRetail(){
        return $this->morphOne(SessionRetail::class,"retailable");
    }

    public function profiles(){
        return $this->hasOne(profiles::class);
    }
}
