<?php

namespace App\Retails;

use App\Accounts\Account;
use App\Accounts\Transaction;
use App\Bills\Bills;
use App\Customers\Customers;
use App\Employees\Employees;
use App\Employees\RetailSalary;
use App\Loans\LoanApplication;
use App\Loans\Loans;
use App\Payments\Expenses;
use App\Payments\Profit;
use App\Payments\Revenue;
use App\RequiredItems\RequiredItems;
use App\Retail\RetailItems;
use App\Sales\Sales;
use App\Sales\SaleTransactions;
use App\Stock\Stock;
use App\Subscriptions\Subscription;
use App\Supplies\Orders;
use App\Supplies\Supplies;
use Illuminate\Database\Eloquent\Model;

class Retail extends Model
{
    //

    protected $guarded = [];

    public function retailable()
    {

        return $this->morphTo();
    }

    public function sales()
    {
        return $this->morphMany(Sales::class, 'retailsaleable');
    }

    public function stocks()
    {
        return $this->morphMany(Stock::class, 'stockable');
    }


    public function retails()
    {
        return  $this->hasMany(Retails::class);
    }

    public function employees()
    {
        return $this->morphMany(Employees::class, 'employeeable');
    }

    public function orders()
    {
        return $this->morphMany(Orders::class, 'orderable');
    }

    public function retailOwner()
    {
        return $this->morphOne(RetailOwner::class, 'retailownerable');
    }

    public function retailOwners()
    {
        return $this->morphToMany(RetailOwner::class, 'retailownerable');
    }


    public function bills()
    {
        return $this->morphToMany(Bills::class, 'billable');
    }

    public function customers()
    {

        return $this->morphToMany(Customers::class, 'customerable');
    }


    public function supplies()
    {
        return $this->morphMany(Supplies::class, 'supplyable');
    }

    public function requiredItems()
    {
        return $this->morphMany(RequiredItems::class, 'requiredable');
    }

    public function expenses()
    {
        # code...
        return $this->morphMany(Expenses::class, 'expenseable');
    }

    public function revenues()
    {
        # code...
        return $this->morphMany(Revenue::class, 'revenueable');
    }

    public function profit()
    {
        # code...
        return $this->morphMany(Profit::class, 'profitable');
    }

    public function salesTransactions()
    {
        # code...
        return $this->morphMany(SaleTransactions::class, 'transactionable');
    }

    public function loanApplications()
    {
        return $this->morphMany(LoanApplication::class, 'loanapplicable');
    }
    public function loans()
    {
        return $this->morphMany(Loans::class, 'loanable');
    }

    public function items(){
        return $this->morphMany(RetailItems::class,'itemable');
    }

    public function accountTransactions(){
        return $this->morphMany(Transaction::class,"transactionable");
    }

    public function accounts(){
        return $this->morphOne(Account::class,"accountable");
    }

    public function subscriptions(){
        return $this->hasOne(Subscription::class,"subscription_id");
    }

    public function retailSalary(){
        return $this->morphMany(RetailSalary::class,"salaryable");
    }
}
