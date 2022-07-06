<?php

namespace App\Sales;

use Illuminate\Database\Eloquent\Model;

class SaleTransactions extends Model
{
    //
    protected $guarded = [];

    public function transactionable()
    {
        # code...
        return $this->morphTo();
    }


    public function sales()
    {
        # code...
        return $this->hasMany(Sales::class,'sale_transaction_id');
    }
}
