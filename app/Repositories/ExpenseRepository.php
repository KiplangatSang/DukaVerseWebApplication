<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExpenseRepository
{
    protected $month, $year, $expense = null, $lastExpense = null, $totalExpense, $result;
    private $retail;
    public function __construct($retail)
    {
        $this->retail = $retail;
    }


    public function saveExpense($expense)
    {
        $this->expense = $expense;
        $this->month = date('m');
        $this->year = date("y");

        //dd( $this->year);
        // get last expense
        $this->lastExpense =  $this->retail->expenses()
            ->where('month', $this->month)
            ->where('year', $this->year)
            ->get()
            ->first();


        $this->totalExpense = $expense;

        // sum last expense to current expense
        if ($this->lastExpense)
            $this->totalExpense = $this->lastExpense->expense + $expense;


        //save expense by locking db
        DB::transaction(function () {
            $this->result = $this->retail->expenses()->updateOrCreate(
                [
                    "month" => $this->month,
                    "year" => $this->year,
                ],
                [
                    "expenseId" => Str::random(37),
                    "expense" => $this->totalExpense,
                ]
            );
        }, 3);

        // dd($this->result);

        return $this->result;
    }

    public function getAllExpenses($key = null, $value = null)
    {
        $expenses = null;
        if ($key && $value) {
            $expenses = $this->retail->expenses()->where($key, $value)->first();
        } else
            $expenses = $this->retail->expenses()->first();

        if (!$expenses)
            return 0;
        //dd($expenses->expense);
        return $expenses->expense;
    }

    public function getMonthlyExpenses($month = null, $year = null)
    {
        $expenses = null;


        if (!$year)
            $year = date('Y');

        if ($month)
            $expenses = $this->retail->expenses()
                ->whereMonth('created_at', '=', $month)
                ->whereMonth('created_at', '=', $year)
                ->get();
        else
            $expenses = $this->retail->expenses()
                ->whereMonth('created_at', '=', $year)
                ->get();
        //dd($expenses->expense);
        return $expenses;
    }


    //get employee sales
    public function getExpensesByDate($startDate, $endDate)
    {
        $expenses = $this->retail->expenses()->whereBetween('created_at', [$startDate . " 00:00:00", $endDate . " 23:59:59"])->get();
        return $expenses;
    }


    public function getExpenses($key = null, $value = null)
    {
        $year = date("Y");
        $expenses = null;
        if ($key && $value) {
            $expenses = $this->retail->expenses()
                ->where($key, $value)
                ->whereYear('created_at', '=', $year)
                ->get();
            //dd($year);
        } else
            $expenses = $this->retail->expenses()->get();


        $totalExpenses =  $expenses->sum('expense');
        # code...
        return $totalExpenses;
    }


    public function getExpensesGrowth($key = null, $value = null)
    {

        $month = date('m');

        $currentExpense = $this->getExpenses("month", $month);
        $previousExpense =   $this->getExpenses("month", $month - 1);

        if ($previousExpense <= 0)
            $previousExpense = 1;

        if ($currentExpense <= 0)
            $currentExpense = 1;

        $growth = (($currentExpense -  $previousExpense) / $currentExpense) * 100;

        $growth = number_format($growth, 2);
        # code...
        return $growth;
    }
}
