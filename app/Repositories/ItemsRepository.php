<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemsRepository
{
    private $retail;
    public function __construct($retail)
    {
        $this->retail = $retail;
    }


    //save item to items table

    public function saveStock($request)
    {

        $this->retail->stocks()->create(
            $request->except('stockImageFile'),
        );

        $item = $this->retail->items()->updateOrCreate(
            [
                'name' => $request->name,
                'brand' => $request->brand,
                'size'  => $request->size,
            ],
            [
                'image' => $request->stockImage,
                'selling_price' => $request->selling_price,
                'buying_price' => $request->buying_price,
                'description' => $request->description,
                'regulation' => $request->regulation,
            ]
        );

        if (!$item)
            return false;

        return $item;
    }

    public function getItems()
    {
        # code...
        $items  = $this->retail->retailItems()->get();
        return $items;
    }

    public function getItem($id)
    {
        # code...
        $item  = $this->retail->retailItems()->where('id', $id)->first();
        return $item;
    }
    public function getItemStock($id = null)
    {
        # code...
        $item  = $this->getItem($id);
        $stockItems = $item->stocks()->orderBy('created_at', 'DESC')->get();
        return $stockItems;
    }

    public function getItemSales($id)
    {
        # code...
        $item  =  $this->getItem($id);
        $saleItems = $item->sales()->orderBy('created_at', 'DESC')->get();
        return $saleItems;
    }

    public function getItemRequiredItems($id)
    {
        # code...
        $item  =  $this->getItem($id);
        $requiredItems = $item->requiredItems()->orderBy('created_at', 'DESC')->get();
        return $requiredItems;
    }
}
