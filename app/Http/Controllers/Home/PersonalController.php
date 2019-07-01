<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserAddr;
use App\Models\GoodStock;
use App\Models\Goods;
use App\Models\GoodComment;
use DB;
class PersonalController extends Controller
{
    public static function getOrders($orders)
    {
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
        return $orders;
    }
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
    	 //获取订单数据
        $uid = session('home_user')->uid;
        $orders = Order::where('uid',$uid)->orderBy('created_at','desc')->get()->toArray();
        // 收获地址
        foreach($orders as $k => $v){
            $useraddr[$k] = UserAddr::find($v['aid']);
        }
        
        $orders = self::getOrders($orders);
        // 订单内商品详情
        
        
        return view('home.personal.order',['orders'=>$orders,'useraddr'=>$useraddr]);
    }
    // 确认收货
    public function orderConfirm($id)
    {
    	$res = Order::find($id);
        $res->order_status = '3';
        $res = $res->save();
        if ($res) {
            return back()->with('success','收货成功');
        } else {
            return back()->with('error','收货失败');
        }

    }
    // 订单详情
    public function orderInfo()
    {

    }
    // 添加评价
    public function comment($id)
    {
        $order = Order::find($id);
        $orders = $order->toArray();
        $comment = GoodComment::where('oid',$id)->get()->toArray();
        $stid = explode ( "," ,  $orders['stid_all']);
        $orders['price'] = explode ( "," ,  $orders['price']);
        foreach ($stid as $k => $v) {
            foreach ($comment as $kk => $vv) {
                if ($v == $vv['stid']) {
                    unset($stid[$k]);
                    unset($orders['price'][$k]);
                }
            }
        }
        $stid = array_values($stid);
        $orders['price'] = array_values($orders['price']);
        $orders['good'] = GoodStock::whereIn('stid', $stid)->get()->toArray();
        
        foreach ($orders['good'] as $k => $v) {
            $orders['good'][$k]['gname'] = Goods::find($v['gid'])->gname;
            $orders['good'][$k]['price'] = $orders['price'][$k];
        }
        if (empty($order['good'])) {
            $order->order_status = '4';
            $order->save();
        }
        return view('home.personal.comment',['orders'=>$orders,'oid'=>$id]);
    }
    // 添加操作
    public function gocomment(Request $request)
    {
        $stid = $request->input('stid','');
        $gid = GoodStock::select('gid')->find($stid)->gid;
        $res = new GoodComment;
        $res->stid = $stid;
        $res->gid = $gid;
        $res->comment = $request->input('comment','');
        $res->stars = $request->input('stars','');
        $res->uname = session('home_user')->uname;
        $res->oid = $request->input('oid','');
        $res->uid = session('home_user')->uid;
        $res = $res->save();
        if ($res) {
            echo json_encode(['msg'=>'ok','info'=>'评论成功']);
        } else {
            echo json_encode(['msg'=>'err','info'=>'评论失败，请重新评论']);
        }
        
    }

}
