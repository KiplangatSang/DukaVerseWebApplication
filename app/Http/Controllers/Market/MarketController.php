<?php

namespace App\Http\Controllers\Market;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\StockRepository;
use App\Retail\RetailItems;
use Illuminate\Http\Request;

class MarketController extends BaseController
{
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
        // $marketdata = RetailItems::where('itemable_type', "App\User")
        $marketdata["items"] = RetailItems::where('itemable_type', "App\Retails\Retail")
            ->with('stocks')
            ->with('supplyItems')
            ->get();

        $requiredItems = $this->getRetail()->requiredItems()
            ->with('items')
            ->orderBy('created_at', 'DESC')
            ->get();        // ->paginate(10);
        $marketdata['requiredItems'] = $requiredItems;

        return view('client.market.index', compact('marketdata'));
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
        //
        $items = $request->except('_token');
        $stockRepo = new StockRepository($this->getRetail());
        foreach ($items as $key => $amount) {
            $stockRepo->markRequired($key, $amount);
        }

        return redirect("/market");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marketdata["items"] = RetailItems::where('itemable_type', "App\Retails\Retail")
            ->with('stocks')
            ->with('supplyItems')
            ->get();
        $retailItem = RetailItems::where('id', $id)->first();
        $marketdata["retailItem"] = $retailItem;
        // dd(  $marketdata);
        return view('client.market.index', compact('marketdata'));
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

    public function viewOrders($id)
    {
        //

    }
}
