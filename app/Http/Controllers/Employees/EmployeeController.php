<?php

namespace App\Http\Controllers\Employees;

use App\Employees;
use App\Http\Controllers\Controller;
use App\Retails\Retail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $retail = Retail::whereIn('retailable_id',  $user)->orderBy('created_at', 'DESC')->get();
        $emplist = Employees::whereIn('employeeable_id', $retail)->get();
        $empdata = array(
            'emplist' => $emplist,
        );
        return view('client.employees.emplist', compact('empdata'));
    }

    public function create()
    {

        $user = auth()->user();
        $retail = Retail::whereIn('retailable_id',  $user)->orderBy('created_at', 'DESC')->get();
        if(count($retail) < 1){
            return redirect('/retails/addretail')->with('message','Register Your Retail Shop First' );
        }
        $empdata = array(
            'Retail' => $retail
        );

        return view('client.employees.addemp', compact('empdata'));
    }

    public function newEmployee(Request $request)
    {

        $data = $request->validate(
            [
                'emp_name' => 'required',
                'retail_id' => 'required',
                'emp_ID' => 'required',
                'emp_role' => 'required',
                'emp_phoneno' => 'required',
                'emp_email' => 'required',
                'emp_salary' => 'required',
            ]
        );

        $user = auth()->user();
        $retail = Retail::whereIn('retailable_id',  $user)->orderBy('created_at', 'DESC')->first();

        try {

            $retail->Employees()->create(
                [
                    'empName' => $request->emp_name,
                    'empEmail' => $request->emp_email,
                    'empPhoneno'=>$request->emp_phoneno,
                    'empNationalId' => $request->emp_ID,
                    'pin' => date('Y'),
                    'empRole' => $request->emp_role,
                    'userName' => $request->emp_name,
                    'dateEmployed' => now(),
                    'salary' => $request->emp_salary,

                ]
            );

            return redirect('/employees/showemployees')->with('success');
        } catch (Exception $ex) {

            $ex->getMessage();
            return back()->with('message',"Could not register Employee");
        }



    }

    public function show($emp_id)
    {
        $emp = Employees::where('id',$emp_id)->first();

        $empdata = array(
            'emp' => $emp,
        );
        return view('client.employees.showemployee',compact('empdata'));
        //dd($emp);
    }

    public function update($emp_id)
    {
        $user = auth()->user();
        $retail = Retail::whereIn('retailable_id',  $user)->orderBy('created_at', 'DESC')->get();


        $emp = Employees::where('id',$emp_id)->first();

        $empdata = array(
            'emp' => $emp,
            'Retail' => $retail,
        );
        return view('client.employees.updateemployee',compact('empdata'));
        }

        public function updateEmployee($emp_id,Request $request)
        {



            Employees::where('id',$request->emp_id)->update([
                'empName'=>$request->emp_name,
                'empEmail' => $request->emp_email,
                    'empPhoneno'=>$request->emp_phoneno,
                    'empNationalId' => $request->emp_ID,
                    'pin' => date('Y'),
                    'empRole' => $request->emp_role,
                    'userName' => $request->emp_name,
                    'dateEmployed' => now(),
                    'salary' => $request->emp_salary,
            ]
        );


            return redirect('/employee/viewEmployee/'.$emp_id)->with('success','Update done successfully');
            }
    public function delete($emp_id)
    {
        Employees::destroy($emp_id);
        return redirect('/employees/showemployees')->with('success','Deletion Successful');
    }
}
