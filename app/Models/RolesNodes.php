<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolesNodes extends Model
{
    // 设置表名
    public $table = 'roles_nodes';

 	//角色与权限关系表->权限表 M->M
    public function role_nodes()
   	{
   		return $this->belongsToMany('App\Models\nodes','nid');
   	}
}
