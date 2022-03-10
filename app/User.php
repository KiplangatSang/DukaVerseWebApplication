<?php

namespace App;

use App\Bills\Bills;
use App\Loans\Loans;
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

    public function storm5Employees(){
        return $this->morphMany(Storm5Employees::class,'storm5employeeable');
    }

    public function loans(){
        return $this->morphMany(Loans::class,'loanable');
    }

    public function bills(){
        return $this->morphMany(Bills::class,'billable');
    }
    // public function Sales(){
    //     return $this->hasOne(Roles::class);
    // }

}
