<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodComment extends Model
{
    // 设置表名
    public $table = 'good_comments';

    public $primaryKey = 'coid';

    public function usercomment()
    {
    	return $this->hasOne('App\Models\Users','uid','uid');
    }
    // 商品对应
    public function goods()
    {
    	return $this->belongsTo('App\Models\Goods','gid','gid');
    }
    // 订单对应
    public function orderComment()
    {
    	return $this->belongsTo('App\Models\Order','oid','id');
    }
    // 库存对应
    public function stockComment()
    {
        return $this->belongsTo('App\Models\GoodStock','stid','stid');
    }
}
