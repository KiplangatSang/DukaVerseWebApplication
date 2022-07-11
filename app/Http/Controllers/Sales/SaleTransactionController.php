<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\SalesRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SaleTransactionController extends BaseController
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function storeTransactionItems($transId, $price)
    {
        # code...
        $transaction = null;
        // dd($transactionItems);
        try {
            $retail = $this->getRetail();
            $transaction = $retail->salesTransactions()->updateOrCreate(
                ["transaction_id" => $transId],
                [
                    "on_hold" => true,
                    "pay_status" => false,
                    "is_active" => true,
                    "expense" => $price,
                ]

            );
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        if (!$transaction)
            return false;

        return $transaction;
    }
    public function getItemsOnHold()
    {
        $salesRepo = new SalesRepository($this->getRetail());

        $retail = $this->getRetail();
        $transactions = $retail->salesTransactions()->where('on_hold', true)->orderBy('created_at', 'DESC')->get();
        // dd($transactions->first()->sales()->get());
        foreach ($transactions as $transaction) {
            $transaction_items =  $salesRepo->getTransactionItems($transaction);

            // dd( $transaction_items);

            if ($transaction_items) {

                $transaction['transaction_items'] = $transaction_items;
            }
        }

        return $transactions;
    }
    public function getItemOnHold($id)
    {
        # code...
        $retail = $this->getRetail();
        $transaction = $retail->salesTransactions()
            ->where('transaction_id', $id)
            ->where('on_hold', true)
            ->first();

        if (!$transaction)
            return false;


        $transaction->transaction_items = $transaction->sales()->get();
        foreach ($transaction->transaction_items as $item) {
            $item['item'] = $item->items()->first();
        }
        // $transaction['items'] = $items;
        // dd($transaction);
        return $transaction;
    }

    public function storeItemsOnHold($id, $expense, $paid_amount)
    {
        # code...
        $pay_status = false;
        if ($paid_amount) {
            $pay_status = true;
        }
        $balance = $paid_amount - $expense;
        $transactions = null;
        $retail = $this->getRetail();
        try {
            $transactions = $retail->salesTransactions()->updateOrCreate(
                ["transaction_id" => $id],
                [
                    "expense" => $expense,
                    "paid_amount" => $paid_amount,
                    "balance" => $balance,
                    "on_hold" => true,
                    "pay_status" => $pay_status,
                    "is_active" => false,
                ]
            );
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return $e->getMessage();
        }

        return $transactions;
    }

    public function getActiveTransaction($trans_id)
    {
        # code...
        $retail = $this->getRetail();
        $transactions = $retail->salesTransactions()
            ->where('is_active', true)
            ->where('transaction_id', $trans_id)
            ->orderBy('created_at', 'DESC')->first();
        return $transactions;
    }

    public function getCompleteTransactionItems()
    {
        # code...
        $retail = $this->getRetail();
        $transactions = $retail->salesTransactions()
            ->where('on_hold', false)
            ->orderBy('created_at', 'DESC')->get();
        return $transactions;
    }

    public function storeCompleteTransaction($id, $paid_amount, $balance)
    {
        # code...
        $retail = $this->getRetail();
        $transactions = $retail->salesTransactions()->where('transaction_id', $id)->update(
            [
                "paid_amount" => $paid_amount,
                "balance" => $balance,
                "on_hold" => false,
                "pay_status" => true,
                "is_active" => false
            ]
        );

        return $transactions;
    }
}
