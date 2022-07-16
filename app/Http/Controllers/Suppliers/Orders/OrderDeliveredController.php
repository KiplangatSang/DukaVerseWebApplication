<?php

namespace App\Http\Controllers\Suppliers\Orders;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\OrdersRepository;
use Illuminate\Http\Request;

class OrderDeliveredController extends BaseController
{
    //

    private $ordersRepo;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ordersRepository()
    {
        # code...


        $this->ordersRepo = new OrdersRepository($this->user());
        return $this->ordersRepo;
    }


    public function index()
    {
        //
        $this->ordersRepository();
        //
        $ordersdata = $this->ordersRepository()->getDeliveredOrders();
        return view("supplier.orders.delivered.index", compact('ordersdata'));
    }


    public function show($id)
    {
        $orders = $this->user()->orders()->where('id', $id)->first();
        //
        $orders->ordered_items = json_decode($orders->ordered_items);
        $ordersitems = count((array)$orders->ordered_items);
        //dd( (array)$orders->ordered_items);

        $ordersdata = array(
            'orders' =>  $orders,
            'ordersitems' => $ordersitems,
        );


        return view("supplier.orders.delivered.show", compact('ordersdata'));
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
        $result = $this->user()->orders()->destroy($id);
        if (!$result)
            return back()->with('errror', "could not delete this item");


        return redirect('/supplier/orders/delivered/index')->with('success', "item deleted successfully");
    }
}
