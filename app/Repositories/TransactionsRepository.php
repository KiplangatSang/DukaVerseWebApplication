<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Return_;

class TransactionsRepository
{

    protected $STRLENGTH = 16;
    protected $retail = null;
    public function __construct($retail)
    {
        $this->retail = $retail;
    }
    public function saveTransaction($gateway, $accounts_id, $amount, $message, $trans_type, $cost, $currency, $purpose)
    {
        # code...
      $result =  $this->retail->accountTransactions()->create([
            "trans_id" => Str::random($this->STRLENGTH),
            "amount" => $amount,
            "gateway" => $gateway,
            "status" => "1",
            "accounts_id" => $accounts_id,
            "transaction_type" => $trans_type,
            "message" => $message,
            "cost" => $cost,
            "currency" => $currency,
            "purpose" => $purpose,
            "total_amount" => $cost + $amount,
            "party_A" =>  9114295,
            "party_B" => $this->retail->retailable()->first()->phoneno,
           // "party_B" = $this->retail->retailOwner()->user()->phone_no,
        ]);

       return $result;
    }


    public function getTransaction($id)
    {
        # code...
        $transaction = $this->retail->accountTransactions()->where('id', $id)->first();
        return $transaction;
    }
}
