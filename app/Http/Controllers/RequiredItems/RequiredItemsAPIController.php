<?php

namespace App\Http\Controllers\RequiredItems;

use App\Http\Controllers\Controller;
use App\Repositories\RequiredItemsRepository;
use Illuminate\Http\Request;

class RequiredItemsAPIController extends Controller
{
    public function requiredItemsRepsitory()
    {
        # code...
        $this->retail = $this->getRetail();

        if (!$this->retail)
            return redirect('/retails/addretail')->with('message', __('retail.create'));

        $this->requiredItemsRepo = new RequiredItemsRepository($this->retail);
        return  $this->requiredItemsRepo;
    }

    public function index()
    {
        $stocksdata = $this->requiredItemsRepsitory()->indexData();
        return view('client.requireditems.index', compact('stocksdata'));
    }




    public function getDaysBetweenTwoDates()
    {
        // $date1 = "2016-07-31";
        // $date2 = "2016-08-05";

        // $date1_ts = strtotime($date1);
        // $date2_ts = strtotime($date2);
        // $diff = $date2_ts - $date1_ts;
        // return round($diff / 86400);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('client.stock.requireditems.create');
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
        $request->validate(
            [
                'requiredItemId' => 'required',
                'requiredItem' => 'required',
                'employees_id' => 'required',
                'stock_id' => 'required',
                'requiredAmount' => 'required',
                'projectedCost' => 'required',
                'requiredStatus' => 'required',

            ]
        );

        $this->retail->requiredItems()->create(
            $request->all(),
        );
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

        $stocksdata = $this->requiredItemsRepsitory()->showData($id);
        return view('client.stock.requireditems.show', compact('stocksdata'));
        //
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
        $requiredItems = session()->get('requiredItems');

        try {
            //code...
            $requiredItems = \array_diff_key($requiredItems, [$id => "xy"]);
        } catch (\Throwable $th) {
            throw $th;
            return back()->with('message', 'No item selected');
        }
        $allStocks = $requiredItems;
        //dd($allStocks);


        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );

        return view('client.stock.requireditems.edit', compact('stocksdata'));
    }

    //
    public function order(Request $request)
    {
        $requiredItems = array();
        $requestValues = array_values($request->input());

        //dd($request->input());
        $countStart = 1;

        if ($request->has('sampleTable_length')) {
            $countStart = 2;
        }

        for ($i = $countStart; $i < count($request->all()); $i++) {

            $requireditem = $this->getRetail()->requiredItems()->where('id', $requestValues[$i])->first();

            $requiredItems[$requireditem->id] = $requireditem;
            // $requiredItems = array_merge($requiredItems,$data);

        }
        if (empty($requiredItems)) {
            return back()->with('message', "You have not selected any item");
        }
        foreach ($requiredItems as $requiredItem) {
            $requiredItem['item'] = $requiredItem->items()->first();
        }
        $allStocks = $requiredItems;

        // Session::put('requiredItems', $requiredItems);
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );
        return view('client.requireditems.order.index', compact('stocksdata'));
        //dd($requiredItems);
    }
}
