<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actives extends Model
{
    //配置表名
    public $table = 'actives';

    //配置一对一关系
     public function actives()
	{
	   return $this->hasOne('App\Models\Banners','active_id');
	}
}
