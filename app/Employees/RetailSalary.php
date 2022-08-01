<?php
namespace App\Employees;

use App\Accounts\Account;
use App\Employees\Employees;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailSalary extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function salaryable()
    {
      return $this->morphTo();
    }

    public function employees()
    {
        # code...
      return $this->belongsTo(Employees::class,"emp_id");
    }
    public function account()
    {
        # code...
      return $this->belongsTo(Account::class,"account_id");
    }

    public function salaryPayer()
    {
        # code...
        //the account which processed the payment
      return $this->belongsTo(User::class,"paid_by");
    }
}
