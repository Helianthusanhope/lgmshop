<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyselfController extends Controller
{
    //显示个人中心页面
    
    public function  index()
    {

    	//检测是否在登录状态
        if ( session('home_login') ){

            return view('home.myself.index');

        } else {

            echo "<script>alert('请先登录');location.href='/';</script>";
            exit;
        }
    } 
    
}
