<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\BaseController;
use App\Repositories\SalesRepository;
use App\Sales\Sales;
use Illuminate\Http\Request;

class EmployeeSaleController extends BaseController
{

    private $salesrepo;
    private $retail;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function salesRepository()
    {
        # code...
        $this->retail = $this->getRetail();

        if (!$this->retail)
            return redirect('/home')->with('message', __('retail.create'));

      return  $this->salesrepo = new SalesRepository($this->retail);
    }

    public function index()
    {
        $this->salesRepository();
        $employees = $this->retail->employees()->get();
        foreach($employees as $employee){
            $employee['sales'] = $employee->sales()->get();

        }
        $salesdata['employees'] = $employees;

       // dd($employees);
        return view("client.sales.employee.index", compact('salesdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("client.sales.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate(
            [
                'itemNameId' => 'required',
                'itemName' => 'required',
                'description' => 'required',
                'itemAmount' => 'required',
                'itemImage' => ['required', 'image'],
                'price' => 'required'
            ]
        );

        Sales::create($request->all());

        return redirect("/client/sales/index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $allSales =$this->salesRepository()->getEmployeeSales($id);
        $solditemscount = count($allSales);
        $salesTotalPrice = $allSales->sum('selling_price');
        $sales = $this->salesrepo->getRevenue();
       // $meansales = $this->retail->sales()->Avg('itemAmount');
       $meansales = 0;
        $salesdata = array(
            'allSales' =>  $allSales,
            'solditemscount' => $solditemscount,
            'sales' => $salesTotalPrice,
            'meansales' => $meansales,
        );


        return view('client.sales.employee.show', compact('salesdata'));
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
    }
}
