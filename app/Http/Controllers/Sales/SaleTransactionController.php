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


    public function storeTransactionItems($transId, $transactionItems)
    {
        # code...
        $transactionItems = json_encode($transactionItems);
        // dd($transactionItems);
        try {
            $retail = $this->getRetail();
            $transactions = $retail->salesTransactions()->updateOrCreate(
                ["transaction_id" => $transId],
                [
                    "transaction_items" => $transactionItems,
                    "on_hold" => true,
                    "pay_status" => false,
                    "is_active" => true,
                ]

            );
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
        return $transactions;
    }

    public function getItemsOnHold()
    {
        # code...
        $retail = $this->getRetail();
        $transactions = $retail->salesTransactions()->where('on_hold', true)->orderBy('created_at', 'DESC')->get();

        foreach ($transactions as $transaction) {
            if ($transaction->transaction_items) {
                $transaction->transaction_items = (array)json_decode($transaction->transaction_items);
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

        $salesRepo = new SalesRepository($retail);
        $items = array();
        $transaction->transaction_items = (array)json_decode($transaction->transaction_items);
        foreach ($transaction->transaction_items as $item) {
            $item = (array)$item;
            $key =  $item['name'];

             $soldItems = $salesRepo->getStockById($key);
             array_push($items,$soldItems);
        }
        $transaction['items'] =$items;
       // dd($transaction);
        return $transaction;
    }

    public function storeItemsOnHold($id, $price, $paid_amount)
    {
        # code...
        $pay_status = false;
        if ($paid_amount) {
            $pay_status = true;
        }
        $balance = $paid_amount - $price;
        $transactions = null;
        $retail = $this->getRetail();
        try {
            $transactions = $retail->salesTransactions()->where('transaction_id', $id)->update(
                [
                    "price" => $price,
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



    public function getActiveTransaction()
    {
        # code...
        $retail = $this->getRetail();
        $transactions = $retail->salesTransactions()
            ->where('is_active', true)
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
