<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use DB;
class PersonalController extends Controller
{
    //个人中心首页
    public function index()
    {

 
        //获取用户的个人信息,收货地址,活动推介
        $userinfo = AddressController::userinfo();
        $address  = AddressController::address();
        $actives  = ActiveController::getActivesCommend();


        return view('home.personal.index',['userinfo'=>$userinfo,'address'=>$address,'actives'=>$actives]);


    }

    //显示个人订单管理页面  
    public function order()
    {
    	 return view('home.personal.order');
    }
    //显示所有的订单页
    public function all()
    {
    	//获取订单数据
    	$uid = session('home_user')->uid;
    	$orders = Order::where('uid',$uid)->get();

    	//查找
    	$useraddr = [];
    	foreach($orders as $k=>$v) {

    		$addr = DB::table('user_addrs')->where('aid',$v->aid)->first();
    		$useraddr[$k] = $addr;
    		
    	}
    	
    	
    	return view('home.order.all',['orders'=>$orders,'useraddr'=>$useraddr]);

    }
    //代付款的订单
    public function car()
    {
    	echo '购物车';
    }
    //代收货
    public function get()
    {
    	echo '代收货';
    }
    
    //待评价
    public function replay()
    {
    	echo '评价';
    }
}
