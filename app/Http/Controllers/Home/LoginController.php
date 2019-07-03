<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UserInfo;
use Hash;
class LoginController extends Controller
{   
    //进入个人中心的验证
    public function myself()
    {
        //检测是否在登录状态
        if ( !session('home_login') ){

            echo json_encode(['msg'=>'err','info'=>'请先登录']);;
            exit;
        }
        echo json_encode(['msg'=>'ok','info'=>'']);;
    }

    //进去收藏夹验证
    public function collect()
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
    	if( Users::where('uname',$uname)->first() ){


            $users_data = Users::where('uname',$uname)->first();
    		$UserInfo_data = UserInfo::where('uid',$users_data->uid)->first();

    	} else if ( Users::where('email',$uname)->first() ){

    		$users_data = Users::where('email',$uname)->first();
            $UserInfo_data = UserInfo::where('uid',$users_data->uid)->first();

    	} else if ( Users::where('phone',$uname)->first() ){

    		$users_data = Users::where('phone',$uname)->first();
            $UserInfo_data = UserInfo::where('uid',$users_data->uid)->first();
    	}


    	//如果登录名不正确
    	if(empty($users_data)) {

    		echo json_encode( ['msg'=>'err','info'=>'帐号密码错误'] );
    		exit;
    	}
    	//验证密码是否正确
    	if( !Hash::check( $upass,$users_data->upass)) {

    		echo json_encode( ['msg'=>'err','info'=>'帐号密码错误'] );
            exit;
    	}     
    	

    	// 登录成功压入数据
    	session(['home_login'=>true]);

        session(['home_user'=>$users_data]);
    	session(['home_userinfo'=>$UserInfo_data]);
    	
     
        echo json_encode( ['msg'=>'ok','info'=>'登录成功'] );
    	
    }

    //退出个人中心
    public function loginout()
    {
    	//执行退出
    	session(['home_login'=>false]);
        session(['home_user'=>null]);   
    	session(['home_userinfo'=>null]);   
        
    	return redirect('/');

    }	
}
