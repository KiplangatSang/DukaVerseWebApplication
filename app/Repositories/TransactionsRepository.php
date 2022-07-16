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
    public function saveTransaction(
        $gateway,
        $accounts_id = null,
        $amount,
        $message,
        $trans_type,
        $cost,
        $currency,
        $purpose,
        $purposeable_id = null,
        $purposeable_type = null
    ) {
        # code...
        $result =  $this->retail->accountTransactions()->create([
            "trans_id" => Str::random($this->STRLENGTH),
            "amount" => $amount,
            "gateway" => $gateway,
            "status" => false,
            "accounts_id" => $accounts_id,
            "transaction_type" => $trans_type,
            "message" => $message,
            "cost" => $cost,
            "currency" => $currency,
            "purpose" => $purpose,
            "total_amount" => $cost + $amount,
            "party_A" =>  9114295,
            "party_B" => $this->retail->retailable()->first()->phoneno,
            "purposeable_id" => $purposeable_id,
            "purposeable_type" => $purposeable_type,
        ]);

        return $result;
    }

    public function getTransaction($id)
    {
        # code...
        $transaction = $this->retail->accountTransactions()->where('id', $id)
            ->with('sales')
            ->first();
        return $transaction;
    }

    public function getTransactions()
    {
        # code...
        $transactions = $this->retail->accountTransactions()
            ->get();
        return $transactions;
    }
    public function getSalesTransactions()
    {
        # code...
        $transactions = $this->retail->accountTransactions()
            ->where('purpose', "SALES")
            ->get();
        return $transactions;
    }
    public function getSuppliesTransactions()
    {
        # code...
        $transactions = $this->retail->accountTransactions()
            ->where('purpose', "SUPPLY")
            ->get();
        return $transactions;
    }
    public function getLoansTransactions()
    {
        # code...
        $transactions = $this->retail->accountTransactions()
            ->where('purpose', "LOANS")
            ->get();
        return $transactions;
    }
}
