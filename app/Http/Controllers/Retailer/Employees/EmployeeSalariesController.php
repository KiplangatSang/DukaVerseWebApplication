<?php

namespace App\Http\Controllers\Retailer\Employees;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class EmployeeSalariesController extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        # code...
        $empdata = $this->getRetail()->retailSalary()
            ->orderBy('created_at', 'DESC')
            ->with('employees')
            ->with('account')
            ->with('salaryPayer')
            ->get();
        //dd($empdata);
        if (!$empdata)
            return back()->with('error', 'no data available');


        return view('client.employees.salary.index', compact('empdata'));
    }

    public function show($id)
    {
        # code...
        $empdata = $this->getRetail()->retailSalary()
            ->where('id', $id)
            ->with('employees')
            ->with('account')
            ->first();
        if (!$empdata)
            return back()->with('error', 'no data available');

        return view('client.employees.salary.show', compact('empdata'));
    }

    public function create($emp_id)
    {
        # code...
        $empdata = $this->getRetail()->employees()->where('id', $emp_id)->first();
        if (!$empdata)
            return back()->with('error', 'no data available');

        return view('client.employees.salary.create', compact('empdata'));
    }

    public function edit($emp_id)
    {
        # code...
        $empdata = $this->getRetail()->employees()->where('id', $emp_id)->with('retailSalary')->first();
        if (!$empdata)
            return back()->with('error', 'no data available');

        return view('client.employees.salary.edit', compact('empdata'));
    }

    public function update($salary_id, Request $request)
    {
        # code...
        $this->getRetail()->retailSalary()->where('id', $salary_id)->update(
            $request->all(),
        );

        return redirect('/client/employee/salary/show' . $salary_id);
    }

    public function store($id,Request $request)
    {
        # code...
        
        dd($request->all());
    }

    public function destroy($id)
    {
        # code...
        $this->getRetail()->retailSalary()->destroy($id);
        return redirect('/client/employee/salary/index');
    }
}
