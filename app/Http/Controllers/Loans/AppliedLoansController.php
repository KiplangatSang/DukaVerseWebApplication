<?php

namespace App\Http\Controllers\Loans;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\LoansRepository;
use Illuminate\Http\Request;

class AppliedLoansController extends BaseController
{
    //
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function loansRepository()
    {
        # code...

        $this->retail = $this->getRetail();

        if (!$this->retail) {
            return redirect('/retails/addretail')->with('message', __('retail.create'));
        }

        $this->ordersRepo = new LoansRepository($this->retail);
        return $this->ordersRepo;
    }


    public function index()
    {
        # code...
        $loans =$this->loansRepository()->getLoanApplications();

        return view('client.loans.history.index', compact('loans'));
    }

    public function show($id)
    {
        # code...
        $appliedLoan =$this->loansRepository()->getLoanApplicationById($id);

        return view('client.loans.history.show',compact('appliedLoan'));
    }


}
