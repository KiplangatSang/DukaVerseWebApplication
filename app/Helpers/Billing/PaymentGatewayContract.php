<?php

namespace App\Helpers\Billing;

use App\Accounts\Transaction;
use Illuminate\Support\Str;

interface PaymentGatewayContract
{

    public function charge(Transaction $transaction);
    public function setDiscount($amount);


}
