<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
	// 设置表名
    public $table = 'roles';
    //角色 -> 管理员 1->N
    public function roles_adminusers()
   	{
   		// return $this->hasMany('App\Models\adminusers_roles','rid');
      return $this->belongsToMany('App\Models\Admin_users')->using('App\Models\Adminusers_roles');
   	}



    // 角色表->权限关系表 1->N
   	public function roles_nodes()
   	{
   		return $this->hasMany('App\Models\roles_nodes','rid');
   	}
}
