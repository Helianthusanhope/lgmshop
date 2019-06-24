<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    //个人中心首页
    public function index()
    {
    	
    	//检测是否在登录状态
        if ( session('home_login') ){

            return view('home.personal.index');

        } else {

            echo "<script>alert('请先登录');location.href='/';</script>";
            exit;
        }
    }
}
