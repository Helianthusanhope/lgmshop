<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodComment extends Model
{
    // 设置表名
    public $table = 'good_comments';

    public $primaryKey = 'coid';
}
