<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public $table = 'orders';
    public $primaryKey = 'id';
    // 
    public function addr()
    {
        return $this->hasOne('App\Models\UserAddr','aid','aid');
    }
    public function goodstock()
    {
      	return $this->hasMany('App\Models\GoodStock','stid');
    }

    
}
