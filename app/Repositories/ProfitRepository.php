<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfitRepository
{
    private $retail;
    protected $month, $year, $expense = null;

    public function __construct($retail)
    {
        $this->retail = $retail;
    }


    public function setProfit($profit)
    {
        $this->profit = $profit;
        $this->month = now('m');
        $this->year = now("Y");
        // get last expense
        $lastProfit =  $this->retail->profit()
            ->where('month', $this->month)
            ->whereYear('created_at', '=', $this->year)
            ->get('profit_amount')
            ->first();

        // sum last expense to current expense
        $this->profit = $lastProfit + $this->profit;

        //save expense by locking db
        $result = DB::transaction(function () {
            $this->retail->profit()->updateOrCreate(
                [
                    "month" => $this->month,
                    "year" => $this->year,
                ],
                [
                    "profitId" => Str::random(37),
                    "profit_amount" => $this->profit,
                ]
            );
        }, 3);

        return $result;
    }

    public function getProfit($month = null, $year = null)
    {

        // $profit = $this->retail->profit()->get();
        // dd($profit);
        $year = date("Y");
        $profit = 0;
        $month = date('m') + 3;
        if ($month) {
            $profit = $this->retail->profit()
                ->whereMonth('created_at', '=', $month)
                ->whereYear('created_at', '=', $year)
                ->get();
        } else
            $profit = $this->retail->profit()
                ->whereYear('created_at', '=', $year)
                ->get();


        return $profit->sum('profit_amount');
    }


    public function getProfitGrowth($month = null)
    {
        if (!$month)
            $month = date('m');


        $currentProfit = $this->getProfit($month);
        $previousProfit =   $this->getProfit($month - 1);


        if ($previousProfit <= 0)
            $previousProfit = 1;

        if ($currentProfit <= 0)
            $currentProfit = 1;

        $growth = (($currentProfit -  $previousProfit) / $currentProfit) * 100;
        $growth = number_format($growth, 2);
        return $growth;
    }
}
