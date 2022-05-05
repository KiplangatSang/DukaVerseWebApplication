<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Repositories\RetailRepository;
use App\Repositories\SalesRepository;
use App\Sales\Sales;
use App\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class SaleController extends Controller
{

    private $retailrepo;
    private $salesrepo;
    private $retail;

    public function __construct()
    {
        $this->middleware('auth');

        if (auth()->check())
            return  auth()->user();


    }

    public function salesRepository()
    {
        # code...
        $user =auth()->user();
        $this->retailrepo =  new RetailRepository($user);
        $this->retail = $this->retailrepo->retails();
        if (!$this->retail)
            return redirect('/retails/addretail')->with('message', __('retail.create'));

        $this->salesrepo = new SalesRepository($this->retail);
    }

    public function index()
    {
        $this->salesRepository();

        $retailName = $this->retail->retailName;
        $allSales = $this->salesrepo->getAllSales();
        $solditemscount = count($allSales);
        $salesTotalPrice = $this->retail->sales->sum('price');
        $salesrevenue = $this->salesrepo->getRevenue();
        $meansales = $this->retail->sales->Avg('itemAmount');
        $salesdata = array(
            'allSales' =>  $allSales,
            'solditemscount' => $solditemscount,
            'salesrevenue' => $salesrevenue,
            'meansales' => $meansales,
            'retail' => $this->retail,
        );

       // dd( $salesdata);
        return view("client.sales.index", compact('salesdata'));
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
            ['itemNameId'=> 'required',
            'itemName' => 'required',
            'description' => 'required',
           'itemAmount' => 'required',
           'itemImage' => ['required','image'],
          'price'=>'required'
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
        $this->salesRepository();
        //
        $allSales = $this->salesrepo->getSaleItem('id',$id);
$salesdata = array(
'allSales' =>  $allSales,
);

       // dd($allSales);
return view('client.sales.show',compact('salesdata'));

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
