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


}
