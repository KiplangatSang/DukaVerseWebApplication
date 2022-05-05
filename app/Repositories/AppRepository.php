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







}
