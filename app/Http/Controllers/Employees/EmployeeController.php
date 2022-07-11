<?php

namespace App\Http\Controllers\Employees;

use App\Employees\Employees;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\EmployeesRepository;
use App\Retails\Retail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class EmployeeController extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function employeeRepository()
    {
        # code...

        $this->retail = $this->getRetail();

        $this->ordersRepo = new EmployeesRepository($this->retail);
        return $this->ordersRepo;
    }


    public function index()
    {
        $user = auth()->user();
        $emplist = $this->employeeRepository()->getEmployees();
        $empdata = array(
            'emplist' => $emplist,
        );
        return view('client.employees.index', compact('empdata'));
    }

    public function create()
    {

        $user = auth()->user();
        $empdata = array(
            'Retail' => $this->getRetail(),
        );

        return view('client.employees.create', compact('empdata'));
    }

    public function store(Request $request)
    {

        $user = auth()->user();
        $retail = $this->getRetail();

        $request->validate(
            [
                'emp_name' => 'required',
                'emp_ID' => 'required',
                'emp_role' => 'required',
                'emp_phoneno' => 'required',
                'emp_email' => 'required',
                'emp_salary' => 'required',
            ]
        );

        $userRequest = new Request([
            'username' => $request['emp_name'],
            'email' => $request['emp_email'],
            'password' =>  "password",
            'phoneno' => $request['emp_phoneno'],
            'terms_and_conditions' => false,
            'api_token' => Str::random(60),
            'is_owner' => false,
            'is_employee' => true,
            'role' => 1,
            'month' => date('M'),
            'year' => date('Y'),
        ]);

        $regContoller = new RegisterController();
        $userresult =   $regContoller->apiRegister($userRequest);
        $userresult = $userresult->getOriginalContent();
        if ($userresult['success'] == false)
            return back()->with('error', $userresult['data']);

        $employee = $userresult['data']['user'];

        // dd($employee);
        //assign user account to employee account
        $request['user_id'] =  $employee->id;

        //allow for employee login
        // create roles




        try {

            $retail->employees()->create(
                $request->all(),
            );

            return redirect('/client/employee/index')->with(__('employees.create'));
        } catch (Exception $ex) {

            Log::info($ex->getMessage());
            return back()->with('error', $ex->getMessage());
        }
    }

    public function show($emp_id)
    {
        $emp = Employees::where('id', $emp_id)->first();
        // dd($emp);

        $empdata = array(
            'emp' => $emp,
        );
        return view('client.employees.show', compact('empdata'));
        //dd($emp);
    }

    public function edit($emp_id)
    {
        $user = auth()->user();


        $emp = Employees::where('id', $emp_id)->first();


        $empdata = array(
            'emp' => $emp,
        );
        return view('client.employees.edit', compact('empdata'));
    }

    public function update($emp_id, Request $request)
    {
        $retail = $this->getRetail();
        $retail->employees()->where('id', $request->emp_id)->update(
            [
                'emp_name' => $request->emp_name,
                'emp_email' => $request->emp_email,
                'emp_phoneno' => $request->emp_phoneno,
                'emp_ID' => $request->emp_ID,
                'emp_role' => $request->emp_role,
                'emp_salary' => $request->emp_salary,
            ]
        );
        return redirect('/client/employee/show/' . $emp_id)->with('success', 'Update done successfully');
    }
    public function delete($emp_id)
    {
        Employees::destroy($emp_id);
        return redirect('/employees/showemployees')->with('success', 'Deletion Successful');
    }
}
