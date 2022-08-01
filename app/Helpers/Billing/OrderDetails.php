<?php

namespace App\Helpers\Billing;

use App\Accounts\Transaction;
use Illuminate\Support\Str;

class OrderDetails
{
    private $paymentGateway;

    public function __construct(PaymentGatewayContract  $paymentGateway)
    {

        $this->paymentGateway = $paymentGateway;
    }

    public function all(Transaction $transaction)
    {
        # code...
        $this->paymentGateway->setDiscount($transaction->discount);

        return [
            "name" => "Sang",
            "address" => "Olenguruone",
        ];
    }
}
