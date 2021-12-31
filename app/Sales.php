<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //
    protected $table = 'sales';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $guarded = [];

    public function format(){
         return ['sales_id' => $this->id,
         'salesname' => $this->name,
         'created_at' => $this->created_at,
    ];
    }
}
