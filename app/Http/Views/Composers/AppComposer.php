<?php

namespace App\Http\Views\Composers;

use App\Repositories\AppRepository;
use App\Retails\Retail;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AppComposer
{
    public function compose(View $view)
    {


        $apprrepo = new AppRepository();
        $registrationmonths = $apprrepo->getRegisteredMonths();


        $monthlyData = array();
        $users = array();
        $months = array();
        $userspdata= array();

        foreach ($registrationmonths as $month) {
            $monthlyUsers = $apprrepo->getMonthlyUsers($month->month);
            $userscount = count($monthlyUsers);
            $users[] = $userscount;
            $months[] = $month->month;

            $userspdata[]  =  $this->pieChartData($userscount,$month->month);
        }

        $monthlyData['months'] = $months;
        $monthlyData['users'] = $users;
        $data = array(
            'usersData' => $monthlyData,
            'userspdata' => $userspdata,
        );



        $view->with('data', $data);
    }

    public function pieChartData($data,$month)
    {
        $pdata = array();
        # code...
        $color = $this->getColor();
        $value = $data;
        $highlight = $this->getColor();
        $label = $month;

        $pdata['color'] = $color;
        $pdata['value'] = $value;
        $pdata['highlight'] = $highlight;
        $pdata['label'] = $label;
        return $pdata;
    }

    public function getColor()
    {
       return '#'.str_pad(dechex(mt_rand(0,0xFFFFFF)),6 , '0' , STR_PAD_LEFT);
    }

}
