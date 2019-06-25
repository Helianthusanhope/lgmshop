<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class InformationController extends Controller
{
    //个人信息修改页面
    public function edit()
    {
    	//分配数据并显示到页面
    	$uid = session('home_user')->uid;

    	$data = DB::table('user_infos')->where('uid',$uid)->first();
    	
    	return view('home.information.index',['data'=>$data]);
    }

    //执行个人信息修改
    
    public function update(Request $request )
    {
    	$uid = session('home_user')->uid;


    	

    	//查看是否有文件上查
    	if($request->hasfile('profile')){

            $profile = $request->file('profile')->store(date('Ymd'));
        }else{

            $profile = $request->input('old_profile','');
        }
    	
    	//接收数据
    	
    	$data['nikename'] = $request->input('nikename','');
    	$data['profile'] = $profile;
    	$data['sex'] = $request->input('sex','');
    	$data['birthday'] = $request->input('birthday','');
    	$data['balance'] = rand(1,10000).'.00';

    	//执行添加到数据库
    	
    	$res = DB::table('user_infos')->where('uid',$uid)->update($data);

    	if($res){
    		echo "<script>alert('修改成功');location.href='/home/information/edit';</script>";
    		exit;
    	}

    }
    
}
