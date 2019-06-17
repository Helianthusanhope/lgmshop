<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // 设置表名
    public $table = 'users';

    //重写主键
    protected $primaryKey = 'uid';
    // 配置一对一
   	public function userinfo()
   	{
   		return $this->hasOne('App\Models\UsersInfo','uid');
   	}
    
}
