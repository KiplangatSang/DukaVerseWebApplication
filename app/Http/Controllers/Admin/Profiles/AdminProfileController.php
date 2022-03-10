<?php

namespace App\Http\Controllers\Admin\Profiles;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    //

    use App\Http\Controllers\Controller;
use App\Stock\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


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

    return view("Admin.Profiles.index");
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    //
    return view("Admin.Profiles.create");

}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store($retail_id,Request $request)
{

    return redirect('/admin/profiles/index');
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
    return view("Admin.Profiles.show");

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
    return view("Admin.Profiles.edit".$id);
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
    return redirect("/admin/profiles/show".$id);
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

    return redirect("/admin/profiles/show".$id);
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
