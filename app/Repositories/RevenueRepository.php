<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RevenueRepository
{
    private $account;
    protected $month, $year, $revenue = null, $lastRevenue = null;
    public function __construct($account)
    {
        $this->account = $account;
    }

    public function saveRevenue($revenue)
    {
        $this->revenue = $revenue;
        $this->month = now('m');
        $this->year = now("y");

        // get last revenues
        $this->lastRevenue =  $this->account->revenues()->where('month', $this->month)
            ->where('year', $this->year)
            ->get('expense')
            ->first();

        // sum last revenues to current expense
        $this->revenue = $this->lastExpense + $this->revenue;

        //save revenues by locking db
        $result = DB::transaction(function () {
            $this->account->revenues()->updateOrCreate(
                [
                    "month" => $this->month,
                    "year" => $this->year,
                ],
                [
                    "revenueId" => Str::random(37),
                    "revenue" => $this->revenue,
                ]
            );
        }, 3);
        return $result;
    }

    public function getRevenue($key = null, $value = null)
    {
        $revenues = null;
        if ($key && $value) {
            $revenues = $this->account->revenues()->where($key, $value)->first();
        } else
            $revenues = $this->account->revenues()->first();

        if (!$revenues)
            return 0;

        return $revenues->revenue;
    }

    //get employee sales
    public function getRevenuesByDate($startDate, $endDate)
    {
        $revenues = $this->account->revenues()->whereBetween('created_at', [$startDate . " 00:00:00", $endDate . " 23:59:59"])->get();
        return $revenues;
    }


    public function getAllRevenue($month = null, $year = null)
    {
        $year = date("Y");
        $revenues = null;
        if ($month) {
            $revenues = $this->account->revenues()
                ->whereMonth("created_at", $month)
                ->whereYear('created_at', '=', $year)
                ->get();
        } else
            $revenues = $this->account->revenues()
            ->whereYear('created_at', '=', $year)
            ->get();

        $totalrevenues =  $revenues->sum('revenue');
        # code...
        return $totalrevenues;
    }

    public function getMonthlyRevenue($month = null, $year = null)
    {
        if (!$year)
        $year = date('Y');

        $revenues = null;

        if ($month)
            $revenues = $this->account->revenues()
            ->whereMonth('created_at', '=', $month)
            ->whereYear('created_at', '=', $year)
            ->get();
         else
            $revenues = $this->account->revenues()
            ->whereYear('created_at', '=', $year)
                ->get();

        # code...

        return $revenues;

    }

    public function getRevenueGrowth($key = null, $value = null)
    {

        $month = date('m');
        $currentRevenue= $this->getAllRevenue( $month);
        $previousRevenue =   $this->getAllRevenue( $month - 1);

        //dd("$currentRevenue");

        if ($previousRevenue <= 0)
            $previousRevenue = 1;

        if ($currentRevenue <= 0)
            $currentRevenue = 1;
        $growth = (($currentRevenue -  $previousRevenue) / $currentRevenue) * 100;
        $growth = number_format($growth, 2);

        return $growth;
    }
}
