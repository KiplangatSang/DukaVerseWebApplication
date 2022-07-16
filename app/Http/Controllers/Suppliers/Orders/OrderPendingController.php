<?php

namespace App\Http\Controllers\Suppliers\Orders;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\OrdersRepository;
use Illuminate\Http\Request;

class OrderPendingController extends BaseController
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
        $this->ordersRepo = new OrdersRepository($this->user());
        return $this->ordersRepo;
    }


    public function index()
    {
        //
        $this->ordersRepository();
        $this->ordersRepository();

        $ordersdata =  $this->ordersRepository()->getPendingOrders();


        //dd( $salesdata);
        return view("supplier.orders.pending.index", compact('ordersdata'));
    }


    public function show($id)
    {
        //
        $this->ordersRepository();

        //;
        $orders = $this->user()->orders()->where('id', $id)->first();
        //
        $orders->ordered_items = json_decode($orders->ordered_items);
        $ordersitems = count((array)$orders->ordered_items);
        //dd( (array)$orders->ordered_items);

        $ordersdata = array(
            'orders' =>  $orders,
            'ordersitems' => $ordersitems,
        );


        return view("supplier.orders.pending.show", compact('ordersdata'));
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
        $this->user()->orders()->destroy($id);
        return redirect('/supplier/orders/pending/index');
    }
}
