<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nodes extends Model
{
    // 设置表名
    public $table = 'nodes';

     //角色与权限关系表->权限表 M->M
    public function role_nodes()
   	{
   		return $this->belongsToMany('App\Models\role_nodes','nid');
   	}
}
