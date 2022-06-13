<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\OrdersRepository;
use App\Stock\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Faker\Generator as Faker;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Str;

class OrdersController extends BaseController
{
    private $ordersRepo;
    private $retail;


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ordersRepository()
    {
        # code...

        $this->retail = $this->getRetail();

        if (!$this->retail){
            return redirect('/retails/addretail')->with('message', __('retail.create'));

        }

        $this->ordersRepo = new OrdersRepository($this->retail);
        return $this->ordersRepo;
    }


    public function index()
    {
        //
        $this->ordersRepository();

        $orders = $this->retail->orders()->orderBy('created_at', 'DESC')->get();
        foreach ($orders as $order) {
            $orders->ordered_items = json_decode($order->ordered_items);
            $orders->paymentStatus = $this->getStatus($order->paymentStatus);
        }
        $ordersitems = count($orders);

        $allOrders["orders"] = $orders;

        $ordersdata = array(
            'allOrders' =>  $allOrders,
            'ordersitems' => $ordersitems,
        );

        //dd( $salesdata);
        return view("client.orders.index", compact('ordersdata'));
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
    public function store(Request $request)
    {
        $this->ordersRepository();

        $requiredItems = array();
        $requestValues = array_values($request->input());

       // dd($request->all());

       // dd($requestValues);
        $countStart = 1;

        if ($request->has('sampleTable_length')) {
            $countStart = 2;
        }

        for ($i = $countStart; $i < count($request->all()); $i++) {

            $requireditem = Stock::where('id', $requestValues[$i])->first();
            $item = array(
                'itemName' => $requireditem->stockName,
                'itemDescription' =>  $requireditem->stockSize,
                'itemAmount' => $requireditem->stockAmount,
                'itemBrand' =>  $requireditem->brand,
            );
            $requiredItems[$i] = $item;

        }

        if (empty($requiredItems)) {
            return back()->with('message', "You have not selected any item");
        }


        //dd($requiredItems);
        $orderId = Str::random(20);

      //  dd( $this->retail->orders());
                $this->retail->orders()->create(
                    [
                        "orderId" => $orderId,
                        "ordered_items" => json_encode($requiredItems),
                        "orderItemsCount" => count($requiredItems),
                        "orderDate" => now(),
                        "paymentStatus" => -1,
                        "orderStatus" => -1,
                    ]
                );

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
        $this->ordersRepository();

        //;
        $orders = $this->retail->orders()->where('id',$id)->first();
        //
        $orders->ordered_items = json_decode($orders->ordered_items);
        $ordersitems = count((array)$orders->ordered_items);
        //dd( (array)$orders->ordered_items);

        $ordersdata = array(
            'orders' =>  $orders,
            'ordersitems' => $ordersitems,
        );


        return view("client.orders.show", compact('ordersdata'));
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
