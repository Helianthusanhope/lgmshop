<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    // 设置表名
    public $table = 'goods';
    public $primaryKey = 'gid';

    // 商品->评论 1->N
   	public function goodcomment()
   	{
   		return $this->hasMany('App\Models\Goodcomment','gid');
   	}
    // 配置一对多
    public function goodstock()
    {
      	return $this->hasMany('App\Models\GoodStock','gid');
    }
    // 配置一对多 反向
    public function goodactive()
    {
        return $this->belongsTo('App\Models\Actives','active_id');
    }
    // 配置一对多 反向
    public function goodcates()
    {
        return $this->belongsTo('App\Models\Cates','cid','cid');
    }
}
