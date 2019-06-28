<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use App\Models\Users;
class SafetyController extends Controller
{
    //显示安全设置中心   
    public function index()
    {
    	return view('home/safety/index');
    }

    //展示修改密码页面
    public function upass()
    {
    	return view('home/safety/upass');
    }

    //执行修改登录密码
    
    public function doupass(Request $request)
    {
    	//接收所有数据
    	$oldpass = $request->input('old_upass','');
    	$newpass = $request->input('new_upass','');
    	$repass  =  $request->input('re_upass','');

    	//获取原来的密码 
    	$upass = session('home_user')->upass;
    	//验证密码是否正确
    	if( !Hash::check( $oldpass,$upass)) {

    		echo json_encode( ['msg'=>'err','info'=>'原密码错误'] );
            exit;
    	} 
    	//验证新密码是否相同
    	if(!($newpass == $repass)) {

    		echo json_encode( ['msg'=>'err','info'=>'两次密码不一致'] );
            exit;

    	} 

    	//验证密码是否合规则
    	if( !preg_match('/^[\w]{6,18}$/',$newpass) ) {

    		echo json_encode( ['msg'=>'err','info'=>'密码格式不正确'] );
            exit;

    	} 
    	//验证新密码与加密码是否一样
    	if( Hash::check( $newpass,$upass)) {

    		echo json_encode( ['msg'=>'err','info'=>'新密码请勿与旧密码一致'] );
            exit;
    	} 
  		//执行新密码加密 
  		$hashpass = Hash::make($newpass);

  		//将新密码压入数据局
  		$user = Users::find(session('home_user')->uid);
  		$user->upass = $hashpass;
  		$res = $user->save();
  		if( $res ) {
	    	echo json_encode( ['msg'=>'ok','info'=>'修改成功,请重新登陆'] );
	        exit;
    	}

    	//清空现在登录session
    	session(['home_login'=>false]);
    	session(['home_user'=>null]);   
    }
    
    //显示邮箱验证页面
    public function email()
    {
    	return view('home.safety.email');
    }

    //显示手机验证页面
    public function phone()
    {
    	return view('home.safety.phone');
    }


}
