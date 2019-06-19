<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adminusers extends Model
{
    // 设置表名
    public $table = 'adminusers';

    // 用户 角色与关系表 1 -> 1
   	public function adminusers_roles()
   	{
   		return $this->hasOne('App\Models\roles','uid');
   	}
}
