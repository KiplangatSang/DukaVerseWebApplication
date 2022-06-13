<?php

namespace App\Http\Views\Admin\Composers;

use App\Http\Controllers\BaseController;

use App\User;
use Illuminate\View\View;

class AdminAppComposer
{

    public function compose(View $view)
    {

        $usersData = array(28, 480, 40, 190, 860);
        $loansData = array(400, 100, 700, 800, 400);
        $salesData = array(60, 300, 600, 10, 50);
        $creditData = array(28, 480, 40, 190, 860);
        $revenueData = array(480, 28, 860, 40, 190);



        $data = array(
            'usersData' => $usersData,
            'loansData' => $loansData,
            'salesData' => $salesData,
            'creditData' => $creditData,
            'revenueData' => $revenueData,

        );




        $view->with('data', $data);
    }
}
