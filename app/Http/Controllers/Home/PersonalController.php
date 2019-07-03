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
    // 获取每个订单包含的商品信息
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

 
        //获取用户的个人信息,收货地址,活动推介,个人收藏
        $userinfo = AddressController::userinfo();
        $address  = AddressController::address();
        $actives  = ActiveController::getActivesCommend();
        $collect  = CollectController::collect();
        $uid = session('home_user')->uid;
        $order = Order::where('uid',$uid)->get();
        $orders['1'] = $order->where('order_status','0')->count();
        $orders['2'] = $order->where('order_status','1')->count();
        $orders['3'] = $order->where('order_status','2')->count();
        $orders['4'] = $order->where('order_status','3')->count();

        return view('home.personal.index',['userinfo'=>$userinfo,'address'=>$address,'actives'=>$actives,'collect'=>$collect,'orders'=>$orders]);



    }

    //显示个人订单管理页面  
    public function order()
    {
    	 //获取订单数据
        $uid = session('home_user')->uid;
        $orders = Order::where('uid',$uid)->orderBy('updated_at','desc')->get()->toArray();
        $orders = self::getOrders($orders);
        // 订单内商品详情
        
        
        return view('home.personal.order',['orders'=>$orders]);
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
    public function orderInfo($id)
    {
        $orders = Order::where('id',$id)->get()->toArray();
        $orders = self::getOrders($orders);
        $addr = UserAddr::find($orders['0']['aid']);

        
        return view('home.personal.orderinfo',['orders'=>$orders,'addr'=>$addr]);
    }

    // 添加评价
    public function comment($id)
    {
        $order = Order::find($id);
        $orders = $order->toArray();
        $comment = GoodComment::where('oid',$id)->get()->toArray();
        $stid = explode ( "," ,  $orders['stid_all']);
        $orders['price'] = explode ( "," ,  $orders['price']);
        // 去掉已经评论的商品
        foreach ($stid as $k => $v) {
            foreach ($comment as $kk => $vv) {
                if ($v == $vv['stid']) {
                    unset($stid[$k]);
                    unset($orders['price'][$k]);
                }
            }
        }

        $stid = array_values($stid);
        // 重新为未评论的商品信息建立下标
        $orders['price'] = array_values($orders['price']);
        $orders['good'] = GoodStock::whereIn('stid', $stid)->get()->toArray();

        // 压入每个商品名称和每个商品的价格
        foreach ($orders['good'] as $k => $v) {
            $orders['good'][$k]['gname'] = Goods::find($v['gid'])->gname;
            $orders['good'][$k]['price'] = $orders['price'][$k];
        }

        // 如果没有一个商品没有被评价就将订单状态改为完成
        if (empty($orders['good'])) {
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
        $good = Goods::find($gid);
        $good->num = $good->num + 1;
        $good->save();
        if ($res) {
            echo json_encode(['msg'=>'ok','info'=>'评论成功']);
        } else {
            echo json_encode(['msg'=>'err','info'=>'评论失败，请重新评论']);
        }
        
    }
}
