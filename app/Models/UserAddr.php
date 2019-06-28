<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddr extends Model
{
    //
    public $table = 'user_addrs';
    //设置主键
    public $primaryKey = 'aid';
}
