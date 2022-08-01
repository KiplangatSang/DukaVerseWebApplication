<?php

namespace App\Helpers\Billing;

use Illuminate\Support\Str;

class Charges
{
    private $paymentGateway;

    public function __construct(PaymentGatewayContract  $paymentGateway)
    {

        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
        # code...

        $this->paymentGateway->setDiscount(500);

        return[
            "name" => "Sang",
            "address" => "Olenguruone",
        ];
    }

}
