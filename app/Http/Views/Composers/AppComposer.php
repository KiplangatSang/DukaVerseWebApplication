<?php

namespace App\Http\Views\Composers;

use App\Repositories\AppRepository;
use App\Retails\Retail;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

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

class AppComposer
{
    public function compose(View $view)
    {
        $appRepo = new AppRepository();
        $data = $appRepo->getAppData();
        $view->with('data', $data);
    }


}
