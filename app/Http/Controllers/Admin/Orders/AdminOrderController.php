<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Stock\Stock;
use App\Supplies\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


class AdminOrderController extends Controller
{
    //

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
    {
        //

        $allOrders = array();
        $ordersitems = null;
        $ordersCost = null;
        $retails = [];

            $orders = Orders::all();
            $retailName = "Unknown";
            $ordersitems = count($orders);

            foreach ($orders as $order) {
                $order->ordered_items = json_decode( $order->ordered_items);
                $order['retail'] =null;
                $order->paymentStatus = $this->getStatus($order->paymentStatus);
            }

           // dd( $retail->orders['retail']);
            $allOrders["orders"] = $orders;





        $ordersdata = array(
            'allOrders' =>  $allOrders,
            'ordersitems' => $ordersitems,
           // 'stocksrevenue' => $stocksrevenue,
            'retails' => $retails,
        );

        //dd( $salesdata);
        return view("Admin.Orders.index", compact('ordersdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($retail_id,Request $request)
    {
        $requiredItems = array();
        $requestValues = array_values($request->input());

        //dd($request->input());
        $countStart = 1;

        if ($request->has('sampleTable_length')) {
            $countStart = 2;
        }

        for ($i = $countStart; $i < count($request->all()); $i++) {

            $requireditem = Stock::where('id', $requestValues[$i])->first();
             $item = array(
               'itemName' => $requireditem-> stockName,
               'itemDescription' =>  $requireditem -> stockSize,
               'itemAmount' => $requireditem -> stockAmount,
               'itemBrand' =>  $requireditem -> brand,
             );
            $requiredItems[$i] = $item;
            // $requiredItems = array_merge($requiredItems,$data);

        }

        if (empty($requiredItems)) {
            return back()->with('message', "You have not selected any item");
        }

        $retails = auth()->user()->Retails()->get();

        $orderId = Str::random(10);

        foreach ($retails as $retail) {
           if($retail->id = $retail_id){
            $retail->orders()->create(
                [
                    'orderId' =>  $orderId,
                    'orderable_id' => auth()->user()->id,
                    'orderable_type' =>  'App\User',
                    'retailorderable_id' => auth()->user()->Retails()->first()->id,
                    'retailorderable_type' =>  'App\Retails\Retails',
                    'ordered_items' =>  json_encode($requiredItems),
                    'orderItemsCount' =>  rand(200, 5000),
                    'orderDate' => now(),
                    'paymentStatus' => -1,

                ]
            );
           }
        }
        return redirect('/orders/index');
        //dd($requiredItems);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //



        $allOrders = null;
        $ordersitems = null;
        $ordersCost = null;

            //$stocksrevenue = $retail->stocks->sum('price');
            $allOrders = array(
                "orders"  => Orders::where('id',$id)->first(),
            );



        $order = $allOrders['orders'];
       // dd($order);


            $allOrders['orders']->ordered_items = json_decode(  $order->ordered_items);


        $ordersdata = array(
            'allOrders' =>  $allOrders,
            'ordersitems' => $ordersitems,
           // 'stocksrevenue' => $stocksrevenue,
            'retails' => "Mama Rosa",
        );

        //dd( $salesdata);
        return view("Admin.Orders.show", compact('ordersdata'));
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

    public function getStatus($id)
    {
        $status = "N/A";
        if ($id == -1) {
            $status = "Not Paid";

        } elseif ($id == 0) {
        $status = "Processed";
        } elseif ($id == 1) {
            $status = "Paid";
        }

        return $status;
    }
}
