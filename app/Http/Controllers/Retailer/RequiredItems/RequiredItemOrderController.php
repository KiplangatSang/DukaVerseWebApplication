<?php

namespace App\Http\Controllers\Retailer\RequiredItems;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\RequiredItemsRepository;
use App\Stock\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class RequiredItemOrderController extends BaseController
{
    private $requiredItemsRepo;
    private $retail;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function requiredItemsRepsitory()
    {
        # code...
        $this->retail = $this->getRetail();

        if (!$this->retail)
            return redirect('/retails/addretail')->with('message', __('retail.create'));

        $this->requiredItemsRepo = new RequiredItemsRepository($this->retail);
        return  $this->requiredItemsRepo;
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
