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

    	$data = $request->all();

    	dd($data);
    }
    
}
