<?php

namespace App\Repositories;

class EmployeesRepository
{
    private $account;
    public function __construct($account)
    {
        $this->account = $account;
    }

    public function getEmployees()
    {
        $employees = $this->account->employees()->orderBy('created_at', 'desc')->get();
        return $employees;
    }

    //get sale by item id
    public function getEmployeeById($id)
    {
        $employee = $this->account->employees()->where('id', $id)->first();

        return $employee;
    }

    //get employee sales
    public function getEmployeeSales($empid)
    {
        $sales = $this->account->sales()->where('employees_id', $empid)->get();

        return $sales;
    }




    public function getSaleItem($key, $value)
    {
        $sales =  $this->account->employees()->where($key, $value)->orderBy('created_at', 'DESC')->get();
        //dd($sales);
        return $sales;
    }
}
