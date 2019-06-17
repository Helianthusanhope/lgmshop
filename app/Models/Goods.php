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
    // 配置一对一
    public function goodstock()
    {
      	return $this->hasMany('App\Models\GoodStock','gid');
    }
}
