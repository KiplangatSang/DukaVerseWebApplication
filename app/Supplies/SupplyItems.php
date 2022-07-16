<?php

namespace App\Supplies;

use App\Retail\RetailItems;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplyItems extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function supply_itemable()
    {
        return $this->morphTo();
    }
    public function items()
    {
        return $this->belongsTo(RetailItems::class, 'retail_items_id');
    }
    public function orders()
    {
        return $this->belongsTo(Orders::class, 'orders_id');
    }
}
