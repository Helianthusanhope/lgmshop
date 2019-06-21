<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class LoginController extends Controller
{
    //显示登录页面
    public function login()
    {
    	return view('home.login.index');
    }

    //执行验证登录
    public function dologin(Request $request)
    {
    // 	$uname = $request->input('uname','');
    // 	$upass = $request->input('upass','');
    	
    // 	//验证获取的数据
    // 	if( !  DB::table('users')->where('uname',$uname)->first() ){

    // 		   DB::table('users')->where('uname',$uname)->first()
    // 	}else if(){

    // 	} 
    // }	
}
