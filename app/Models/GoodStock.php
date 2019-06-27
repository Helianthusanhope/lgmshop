<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodStock extends Model
{
    //
    public $table = 'good_stocks';
    public $primaryKey = 'stid';
    public function gooddetail()
    {
        return $this->belongsTo('App\Models\Goods','gid','gid');
    }
}
