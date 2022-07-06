<?php

namespace App\Sales;

use App\Employees\Employees;
use App\Retail\RetailItems;
use App\Retails\Retail;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //

    protected $guarded = [];

    public function saleable()
    {
        return $this->morphTo();
    }

    public function retailsaleable()
    {
        return $this->morphTo();
    }

    public function employees()
    {
        return $this->belongsTo(Employees::class);
    }

    public function items(){
        return $this->belongsTo(RetailItems::class,"retail_items_id");
    }

    public function saleTransactions()
    {
        # code...
        return $this->belongsTo(SaleTransactions::class,'sale_transaction_id');
    }
}
