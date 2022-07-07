<?php

namespace App\Repositories;

use App\LoanApplication;
use App\User;
use Illuminate\Http\Request;

use App\Http\Controllers\BaseController;
use App\Repositories\EmployeesRepository;
use App\Repositories\ExpenseRepository;
use App\Repositories\LoansRepository;
use App\Repositories\OrdersRepository;
use App\Repositories\ProfitRepository;
use App\Repositories\RequiredItemsRepository;
use App\Repositories\RevenueRepository;
use App\Repositories\SalesRepository;
use App\Repositories\StockRepository;
use App\Repositories\SuppliesRepository;
use App\Retails\SessionRetail;
use Exception;
use Illuminate\Support\Facades\DB;

class AppRepository
{
    public function getBaseImages()
    {

     $images = array(
      "noprofile" => "https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/noprofile.png",
      "nofile" => "https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/nofile.png",
     );
     return $images;
    }

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


     public function getAppData()
     {
        # code...
        $baseController  = new BaseController();
        $retail = $baseController->getRetail();

        $expenseRepo = new ExpenseRepository($retail);
        $salesRepo = new SalesRepository($retail);
        $revenueRepo = new RevenueRepository($retail);
        $profitRepo = new ProfitRepository($retail);
        $stockRepo = new StockRepository($retail);
        $requiredItemsRepo = new RequiredItemsRepository($retail);
        $orderRepo = new OrdersRepository($retail);
        $employeeRepo = new EmployeesRepository($retail);
        $suppliesrRepo = new SuppliesRepository($retail);
        $loansRepo = new LoansRepository($retail);

        $dates = null;
        try{
            $dates = $retail
            ->select(DB::raw('YEAR(created_at) year, MONTH(created_at) month, MONTHNAME(created_at) month_name'))
            ->distinct()
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
        }catch(Exception $e){
            $e->getMessage();
        }


        //linechart data
        $data = array();
        //dd($dates);

        //set months
        $data['months']  = $this->getMonths($dates);


        //piechart data
        $salesPData = array();
        $expensePData = array();
        $revenuePData = array();
        $stockPData = array();
        $loansPData = array();

        $salesData = array();
        $expenseData = array();
        $revenueData = array();
        $stockData = array();
        $loansData = array();

        foreach ($dates as $date) {
            $month = $date->month;
            $monthName = $date->month_name;
            $sales = $this->getMonthlySales($salesRepo, $month);
           // dd($sales);
            $expenses = $this->getMonthlyExpense($expenseRepo, $month);;
            $revenue = $this->getMonthlyRevenue($revenueRepo, $month);
            $stock = $this->getLoanApplications($loansRepo, $month);
            $loans = $this->getLoanApplications($loansRepo, $month);

            //set piechart data
            $salesPData[] = $this->pieChartData($sales, $monthName);
            $expensePData[] = $this->pieChartData($expenses, $monthName);
            $revenuePData[] = $this->pieChartData($revenue, $monthName);
            $stockPData[] = $this->pieChartData($stock, $monthName);
            $loansPData[] = $this->pieChartData($loans, $monthName);


            //linechart data
            $salesData[] = $sales;
            $expenseData[] = $expenses;
            $revenueData[] = $revenue;
            $stockData[] = $stock;
            $loansData[] = $loans;
        }

        //linechart data
        $data['salesData']  = $salesData;
        $data['expenseData'] = $expenseData;
        $data['revenueData'] = $revenueData;
        $data['stockData']  = $stockData;
        $data['loansData']  = $loansData;

        //piechart data
        $data['salesPData']  = $salesPData;
        $data['expensePData'] = $expensePData;
        $data['revenuePData'] = $revenuePData;
        $data['stockPData']  = $stockPData;
        $data['loansPData']  = $loansPData;


        $data['sales_value'] = $this->getMonthlySales($salesRepo);
        $data['expenses_value'] = $expenseRepo->getAllExpenses();
        $data['revenue_value'] =  $revenueRepo->getAllRevenue();
        $data['profit_value'] = $profitRepo->getProfit();

        $data['sales_growth'] =  $salesRepo->getSalesGrowth();
        $data['expenses_growth'] =  $expenseRepo->getExpensesGrowth();
        $data['revenue_growth'] = $revenueRepo->getRevenueGrowth();
        $data['profit_growth'] = $profitRepo->getProfitGrowth();

        $data['sold_items'] = $salesRepo->getSoldItems();
        $data['stock'] = count($stockRepo->getDisctictStock());
        $data['required_items'] = count($requiredItemsRepo->getAllRequiredItems());
        $data['ordered_items'] = count($orderRepo->getAllorders());


        $data['employees'] = count($employeeRepo->getEmployees());
        $data['supplies'] =  count($suppliesrRepo->getAllSupplies());
        $data['orders'] = count($orderRepo->getAllorders());
        $data['loans'] = count($loansRepo->getLoanApplications());

        $data['retail'] = $retail;

        return $data;
     }

     public function getMonths($periods)
     {

         $months = array();
         foreach ($periods as $period) {
             $month = $period->month_name;
             array_push($months, $month);
         }
         return $months;
     }

     public function getLoanApplications($loansRepo, $period)
     {

         $loans = array();
         $loan = count($loansRepo->getLoanApplications("month", $period));
         array_push($loans, $loan);

         return $loan;
     }

     public function getMonthlyRevenue($revenueRepo, $period)
     {


         $revenue = count($revenueRepo->getMonthlyRevenue("month", $period));

         return $revenue;
     }

     public function getMonthlyExpense($expenseRepo, $period)
     {

         $expense = $expenseRepo->getMonthlyExpenses($period);

         return $expense;
     }

     public function getMonthlySales($salesRepo= null, $period = null)
     {
         $sale = $salesRepo->getMonthlySales($period)->sum('paid_amount');
         //dd( $sale);
         return $sale;
     }


     //sets pie chart data
     public function pieChartData($data, $month)
     {
         $pdata = array();
         # code...
         $color = $this->getColor();
         $value = $data;

       // $value = 20;
         $highlight = $this->getColor();
         $label = $month;

         $pdata['color'] = $color;
         $pdata['value'] = $value;
         $pdata['highlight'] = $highlight;
         $pdata['label'] = $label;
         return $pdata;
     }

     //gets random color value
     public function getColor()
     {
         return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
     }





}
