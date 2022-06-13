<?php

namespace App\Repositories;

class EmployeesRepository
{
    private $retail;
    public function __construct($retail)
    {
        $this->retail = $retail;
    }

    public function getEmployees()
    {
        $employees = $this->retail->employees()->get();
        return $employees;
    }

    //get sale by item id
    public function getEmployeeById( $id)
    {
        $employee = $this->retail->employees()->where('id',$id)->first();

        return $employee;
    }

    //get employee sales
    public function getEmployeeSales($empid)
    {
        $sales = $this->retail->sales()->where('employees_id',$empid)->get();

        return $sales;
    }




     public function getSaleItem($key,$value)
     {
         $sales =  $this->retail->employees()->where($key,$value)->orderBy('created_at', 'DESC')->get();
         //dd($sales);
      return $sales;
     }



}

