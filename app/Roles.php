<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $guarded =[];
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public  $timestamps= true;


// same for one to one and also one to many
    public function roleable(){
         $this->morphTo(User::class);
     }
}
