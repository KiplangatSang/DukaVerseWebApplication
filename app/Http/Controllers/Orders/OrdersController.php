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

        if (!$this->retail) {
            return redirect('/retails/addretail')->with('message', __('retail.create'));
        }

        $this->ordersRepo = new OrdersRepository($this->retail);
        return $this->ordersRepo;
    }


    public function index()
    {
        //
        $this->ordersRepository();

        $ordersdata =  $this->ordersRepository()->formatOrders();

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
        $projectedCost = 0;

        // dd($request->all());

        $items = $request->except("_token", "sampleTable_length");
        foreach ($items as $key => $value) {
            $requireditem = $this->getRetail()->requiredItems()->where('id', $key)->first();
            if (!$requireditem)
                return false;

            $item = array(
                'id' => $requireditem->items()->first()->id,
                'item' => $requireditem->items()->first()->name,
                'brand' =>  $requireditem->items()->first()->brand,
                'size' =>  $requireditem->items()->first()->size,
                'amount' => $value,
                'cost' => $requireditem->items()->first()->buying_price,
            );

            $projectedCost += $requireditem->items()->first()->buying_price;

            $requiredItems[$key] = $item;
        }
        if (empty($requiredItems)) {
            return back()->with('message', "You have not selected any item");
        }
        $orderId = Str::random(20);

        $order = $this->retail->orders()->updateOrCreate(
            ["orderId" => $orderId,],
            [

                "ordered_items" => json_encode($requiredItems),
                "items_count" => count($requiredItems),
                "payment_status" => false,
                "order_status" => -1,
                "projected_cost" =>  $projectedCost,
            ]
        );

        foreach ($items as $key => $value) {
            $requireditem = $this->getRetail()->requiredItems()->where('id', $key)->first();
            $requireditem->update(
                [
                    'is_ordered' => true,
                    'orders_id' => $order->id,
                    'ordered_amount' => $value,
                ]
            );
        }

        return redirect('/client/orders/index')->with('success', __('orders.create'));
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
        $orders = $this->retail->orders()->where('id', $id)->first();
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
   // for ($i = $countStart; $i < count($request->all()); $i++) {


        //     // $requireditem = Stock::where('id', $requestValues[$i])->first();

        //     // $item = array(
        //     //     'itemName' => $requireditem->stockName,
        //     //     'itemDescription' =>  $requireditem->stockSize,
        //     //     'itemAmount' => $requireditem->stockAmount,
        //     //     'itemBrand' =>  $requireditem->brand,
        //     // );
        //     // $requiredItems[$i] = $item;


        // }
