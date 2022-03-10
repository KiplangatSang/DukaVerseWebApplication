<?php

namespace App\Http\Controllers\Admin\Employees;

use App\Admin\Employees\Storm5Employees;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class Storm5EmployeeController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $user = auth()->user();
        $emplist = Storm5Employees::all();
        $empdata = array(
            'emplist' => $emplist,
        );

         return view('Admin.Employees.index',compact('empdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Employees.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
                'county' => 'required',
                'constituency' => 'required',
                'office' => 'required',
            ]
        );

        try {

            auth()->user()->storm5Employees()->create(
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
                    'county' => $request->county,
                    'constituency' => $request->constituency,
                    'office' => $request->office,

                ]
            );



    }catch( Exception  $ex){

        dd($ex->getMessage());

    }


        return redirect("/admin/employees/index");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp = Storm5Employees::where('id',$id)->first();

        $empdata = array(
            'emp' => $emp,
        );
        //
        return view('Admin.Employees.show',compact('empdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $emp = Storm5Employees::where('id',$id)->first();

        $empdata = array(
            'emp' => $emp,
        );


        return view('Admin.Employees.edit',compact('empdata'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        Storm5Employees::where('id',$id)->update([
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



        return redirect("/admin/employees/show".$id)->with('success','Update done successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Storm5Employees::destroy($id);
        return redirect("/admin/employees/index");
    }

}
