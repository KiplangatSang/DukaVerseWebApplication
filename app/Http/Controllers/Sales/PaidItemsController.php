<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\SalesRepository;
use App\Retails\Retail;
use App\Sales\Sales;
use Hamcrest\Core\HasToString;

class PaidItemsController extends BaseController
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
            return false;

        return  new SalesRepository($this->retail);
    }

    public function index()
    {

        $paidItems = $this->salesRepository()->getPaidSoldItems();
        $salesdata['allSales'] = $paidItems;
       // dd($paidItems);

        return view('client.sales.paiditems.index', compact('salesdata'));
    }

    public function showCreateSales()
    {
        // $allSales = Sales::All();
        return view("client.sales.createsolditems");
    }


    public function show($id)
    {
        $allSales = $this->salesRepository()->getPaidSoldItems();
        $salesdata['allSales'] = $allSales;

        return view('client.sales.paiditems.show', compact('salesdata'));
    }
    public function delete($sale_id)
    {
        $result = Sales::destroy($sale_id);
        if(!$result)
        return back()->with('error', 'Could not delete item');
        return back()->with('success', 'Deletion Successful');
    }
}

#
// public function getSalesByDate()
// {
//     request()->validate(
//         [
//             'startDate' => 'required'
//         ]
//     );

//     $to = now();
//     if (request()->input('endDate') != null) {
//         $to = request()->input('endDate') . " 23:59:59";
//         //dd($to);
//     }


//     // dd(now());
//     $from = request()->input('startDate') . " 00:00:00";
//     // dd($from);



//     $retails = auth()->user()->Retails()->get();

//     $allSales = null;
//     $salesitems = null;
//     $salesrevenue = null;
//     $meansales = null;

//     foreach ($retails as $retail) {
//         $sales = Sales::whereBetween('created_at', [$from . " 00:00:00", $to . " 23:59:59"])->get();
//         // dd($sales);
//         $salesitems = count($sales);
//         $salesrevenue = $sales->sum('price');
//         $meansales = $sales->Avg('itemAmount');
//         $allSales = array(
//             "Sales"  => $sales,

//         );
//     }
//     $salesdata = array(
//         'allSales' =>  $allSales,
//         'salesitems' => $salesitems,
//         'salesrevenue' => $salesrevenue,
//         'meansales' => $meansales,
//         'retails' => $retails,
//     );


//     //dd( $salesdata);
//     return view("client.sales.showsolditems", compact('salesdata'));
// }
