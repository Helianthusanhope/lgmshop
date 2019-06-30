<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserAddr;
use App\Models\GoodStock;
use App\Models\Goods;
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
    	$orders = Order::where('uid',$uid)->get()->toArray();
        // 收获地址
        foreach($orders as $k => $v){
            $useraddr[$k] = UserAddr::find($v['aid']);
        }
        
        foreach ($orders as $k => $v) {
            // 商品数量
            $orders[$k]['number'] = explode ( "," ,  $v['number']);
            $orders[$k]['price'] = explode ( "," ,  $v['price']);

        }
        foreach ($orders as $k => $v) {
            $a = explode ( "," ,  $v['stid_all']);
            $orders[$k]['good'] = GoodStock::whereIn('stid', $a)->get()->toArray();
        }
        foreach ($orders as $k => $v) {
            foreach ($v['good'] as $kk => $vv) {
                $orders[$k]['good'][$kk]['number'] = $v['number'][$kk];
                $orders[$k]['good'][$kk]['price'] = $v['price'][$kk];
                $orders[$k]['good'][$kk]['gname'] = Goods::find($vv['gid'])->gname;
            }
        }
        // 订单内商品详情
    	
    	
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
