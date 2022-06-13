<?php

namespace App\Repositories;

use App\LoanApplication;
use App\User;
use Exception;
use Illuminate\Http\Request;


class AppRepository
{

    public function getRegisteredMonths()
    {
        # code...
        $registrationmonths = User::distinct('month')->orderBy('month','ASC')->get('month');
        return $registrationmonths;
    }

    public function getMonthlyUsers($month)
    {
        # code...
        $users = User::where('month', $month)->get();
        return $users;
    }

    public function getRevenue($retail,$month)
    {
        # code...
        $revenueRepo = new SalesRepository($retail);
        $revenue = $revenueRepo->getRevenue("month",$month);
        return $revenue;
    }

    public function getExpenses($retail,$month)
    {
        # code...
        $expenseRepo = new ExpenseRepository($retail);
        $expenses = $expenseRepo->getExpenses($retail,$month);
        return $expenses;
    }


    public function getProfit($retail,$month)
    {
        # code...
         $profit = 0;
         if($this->getRevenue($retail,$month) && $this->getExpenses($retail,$month)){
             $profit = $this->getRevenue($retail,$month) -$this->getExpenses($retail,$month);
         }
        return $profit;
    }

    public function getRevenueGrowth($retail,$month)
    {
        # code...
       $thisMonthRev = $this->getRevenue($retail,$month);
       $lastMonthRev = $this->getRevenue($retail,$month);
       $growth = $thisMonthRev- $lastMonthRev;
       $growthPercentile= ($growth/$thisMonthRev)*100;

        return $growthPercentile;
    }

    public function getExpenseGrowth($retail,$month)
    {
        # code...
        $thisMonthEx = $this->getExpenses($retail,$month);
        $lastMonthEx = $this->getExpenses($retail,$month);
        $growth = $thisMonthEx- $lastMonthEx;
        $growthPercentile= ($growth/$thisMonthEx)*100;

         return $growthPercentile;
    }

    public function getProfitGrowth($retail,$month)
    {
        $thisMonthProfit = $this->getProfit($retail,$month);
        $lastMonthProfit = $this->getProfit($retail,$month);
        $growth = $thisMonthProfit- $lastMonthProfit;
        $growthPercentile= ($growth/$thisMonthProfit)*100;

         return $growthPercentile;
    }









}
