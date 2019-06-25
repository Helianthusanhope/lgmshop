<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // 设置表名
    public $table = 'users';

    public $primaryKey = 'uid';

    // 配置一对一
    
    public function userinfos()
    {
        return $this->hasOne('App\Models\UserInfo','uid');
    }
    // 配置一对一
    public function useraddr()
    {
      return $this->hasMany('App\Models\UserAddr','uid');
    }

    
}
