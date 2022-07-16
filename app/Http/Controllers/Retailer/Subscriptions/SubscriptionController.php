<?php

namespace App\Http\Controllers\Retailer\Subscriptions;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Subscriptions\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends BaseController
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

        $subscriptions = Subscription::all();
        foreach ($subscriptions as  $subscription) {
            $subscription->subscription_price = (array)json_decode($subscription->subscription_price);
            $subscription->subscription_description = (array)json_decode($subscription->subscription_description);
            $subscription->subscription_duration = (array)json_decode($subscription->subscription_duration);
            $subscription->subscription_categories = (array) json_decode($subscription->subscription_categories);
        }

        // dd( $subscriptions);

        return view('subscriptions.index', compact('subscriptions'));
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
        $subscription = Subscription::where('id', $id)->first();
        $subscription->subscription_price = (array)json_decode($subscription->subscription_price);
        $subscription->subscription_description = (array)json_decode($subscription->subscription_description);
        $subscription->subscription_duration = (array)json_decode($subscription->subscription_duration);
        $subscription->subscription_categories = (array) json_decode($subscription->subscription_categories);
        $subscription->subscription_discount =  (array) json_decode($subscription->subscription_discount);
        return view('subscriptions.show', compact('subscription'));
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
