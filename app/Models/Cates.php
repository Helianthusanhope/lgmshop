<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cates extends Model
{
    // 设置表名
    public $table = 'cates';
    //重写主键名
    public $primaryKey = 'cid';
    
}
