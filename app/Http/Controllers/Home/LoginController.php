<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class LoginController extends Controller
{   
    //
    public function rinima()
    {
        //检测是否在登录状态
        if ( !session('home_login') ){

            echo json_encode(['msg'=>'err','info'=>'请先登录']);;
           exit;
        }
        echo json_encode(['msg'=>'ok','info'=>'']);;
    }


    //显示登录页面
    public function login()
    {
    	return view('home.login.index');
    }

    //执行验证登录
    public function dologin(Request $request)
    {
    	$uname = $request->input('uname','');
    	$upass = $request->input('upass','');
    	
    	//验证获取的数据
    	//在数据查看验证用户名
    	if( DB::table('users')->where('uname',$uname)->first() ){

    		$users_data = DB::table('users')->where('uname',$uname)->first();

    	} else if ( DB::table('users')->where('email',$uname)->first() ){

    		$users_data = DB::table('users')->where('email',$uname)->first();

    	} else {

    		$users_data = DB::table('users')->where('phone',$uname)->first();
    	}


    	//如果登录名不正确
    	if(empty($users_data)){

    		echo "<script>alert('用户名或密码错误');location.href='/home/login';</script>";
    		exit;
    	}
    	//验证密码是否正确
    	if( !Hash::check( $upass,$users_data->upass)){

    		echo "<script>alert('用户名或密码错误');location.href='/home/login';</script>";
    		exit;
    	}     
    	
    	// 执行登录
    	session(['home_login'=>true]);
    	session(['home_user'=>$users_data]);
    	//执行跳转到首页
    	return redirect('/');
    	
    }

    //退出个人中心
    public function loginout()
    {
    	//执行退出
    	session(['home_login'=>false]);
    	session(['home_user'=>null]);   
        
    	return redirect('/');

    }	
}
