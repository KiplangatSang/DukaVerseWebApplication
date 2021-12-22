<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //
    protected $table = 'sales';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['itemNameId', 'itemName', 'itemSize', 'itemAmount', 'price'];
}
