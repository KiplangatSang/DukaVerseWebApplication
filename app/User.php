<?php

namespace App;

use App\Accounts\Account;
use App\Accounts\Transaction;
use App\Bills\Bills;
use App\Employees\Employees;
use App\Employees\RetailSalary;
use App\Payments\Expenses;
use App\Profiles\Profiles;
use App\Retail\RetailItems;
use App\Retails\Retail;
use App\Retails\SessionRetail;
use App\Stock\Stock;
use App\Supplies\Orders;
use App\Supplies\SupplyItems;
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
        'year', 'remember_token', 'api_token', 'phoneno', 'userpin', 'terms_and_conditions',
        'is_owner',
        'is_employee',
        'role',
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



    public function roles()
    {
        return $this->morphOne(Roles::class, 'roleable');
    }

    public function tags()
    {
        return $this->morphToMany(Tags::class, 'taggable');
    }


    public function retails()
    {
        return $this->morphMany(Retail::class, 'retailable');
    }

    public function storm5Employees()
    {
        return $this->morphMany(Storm5Employees::class, 'storm5employeeable');
    }

    public function bills()
    {
        return $this->morphMany(Bills::class, 'billable');
    }
    public function sessionRetail()
    {
        return $this->morphOne(SessionRetail::class, "retailable");
    }

    public function profiles()
    {
        return $this->hasOne(Profiles::class);
    }

    public function account()
    {
        return $this->morphOne(Account::class, "accountable");
    }

    public function accountTransactions()
    {
        return $this->morphMany(Transaction::class, "transactionable");
    }

    public function employees()
    {
        return $this->hasOne(Employees::class, "user_id");
    }
    public function items()
    {
        return $this->morphMany(RetailItems::class, 'itemable');
    }

    public function stocks()
    {
        return $this->morphMany(Stock::class, 'stockable');
    }


    public function expenses()
    {
        # code...
        return $this->morphMany(Expenses::class, 'expenseable');
    }

    public function orders()
    {
        return $this->morphMany(Orders::class, 'orderable');
    }

    public function supplyItems()
    {
        return $this->morphMany(SupplyItems::class, 'supply_itemable');
    }

    public function retailSalary()
    {
        return $this->hasMany(RetailSalary::class, 'paid_by');
    }
}
