<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;

class AddressController extends Controller
{
    //收货地址页面显示
    
    public function index()
    {
    	//获取数据并分配
    	$uid = session('home_user')->uid;
    	$user = Users::find($uid);
    	// 找到用户的的收货地址
    	$addr = $user->useraddr;	
    	return view('home.address.index',['addr'=>$addr]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'addrname' => 'required',
            'phone' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
            'province' => 'required',                
            'country' => 'required',
            'town' => 'required',
            'address' => 'required',
        ],[
            'addrname.required'=>'收货人必填',
            'phone.required'=>'收货人电话',
            'phone.regex'=>'电话格式不对', 
            'province.required'=>'省份必填',
            'country.required'=>'城市必填',
            'town.required'=>'乡镇必填',
            'address.required'=>'折扣必填',
        ]);
       
        
    }
}
