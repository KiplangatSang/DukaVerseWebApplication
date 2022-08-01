<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use PhpParser\Node\Stmt\Return_;

class TransactionsRepository
{

    protected $STRLENGTH = 8;
    protected $account = null;
    public function __construct($account)
    {
        $this->account = $account;
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
        $purposeable_id = null
    ) {
        # code...
        if ($purposeable_id)
            $purposeable_type = $this->setPurposeable($purpose);
        else
            $purposeable_type = null;

        $code = "MNA" . Str::random($this->STRLENGTH) . "OP" . rand(10, 99);
        $result =  $this->account->accountTransactions()->create([
            "trans_id" => $code,
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
            "party_B" => $this->account->retailable()->first()->phoneno,
            "purposeable_id" => $purposeable_id,
            "purposeable_type" => $purposeable_type,
        ]);

        return $result;
    }

    public function getTransaction($id)
    {
        # code...
        $transaction = $this->account->accountTransactions()->where('id', $id)
            ->first();
        return $transaction;
    }

    public function getTransactions()
    {
        # code...
        $transactions = $this->account->accountTransactions()
            ->get();
        return $transactions;
    }
    public function getSalesTransactions()
    {
        # code...
        $transactions = $this->account->accountTransactions()
            ->where('purpose', "SALES")
            ->get();
        return $transactions;
    }
    public function getSuppliesTransactions()
    {
        # code...
        $transactions = $this->account->accountTransactions()
            ->where('purpose', "SUPPLY")
            ->get();
        return $transactions;
    }
    public function getLoansTransactions()
    {
        # code...
        $transactions = $this->account->accountTransactions()
            ->where('purpose', "LOANS")
            ->get();
        return $transactions;
    }

    public function setPurposeable($purpose)
    {
        # code...
        if ($purpose == "SALES") {
            $purposable_type = "App\Sales\Sales";
        } else if ($purpose == "LOANS") {
            $purposable_type = "App\Loans\Loans";
        } else if ($purpose == "SUPPLIES") {
            $purposable_type = "App\Supplies\Supplies";
        } else {
            $purposable_type = null;
        }

        return   $purposable_type;
    }
}
