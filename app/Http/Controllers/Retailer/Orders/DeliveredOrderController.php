<?php

namespace App\Http\Controllers\Retailer\Orders;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\OrdersRepository;
use App\Supplies\Orders;
use Illuminate\Http\Request;

class DeliveredOrderController extends BaseController
{
    //

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
        //
        $ordersdata = $this->ordersRepository()->getDeliveredOrders();


        return view("client.orders.delivered.index", compact('ordersdata'));
    }


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


        return view("client.orders.delivered.show", compact('ordersdata'));
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
        Orders::destroy($id);
        return redirect('/client/orders/delivered/index');
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
