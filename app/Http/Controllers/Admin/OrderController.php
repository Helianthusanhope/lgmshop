<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserAddr;
use App\Models\GoodStock;
use App\Models\Goods;
use App\Models\GoodComment;
use DB;
class OrderController extends Controller
{
    // 是否可以发货
    public static function getstatus($status)
    {
        foreach ($status as $k => $v) {
            if ($v == 0){
                $status = 0;
                return $status;
            } elseif ($v == 1) {
                $status = 1;
                return $status;
            }
        }
    }
    // 库存详情
    public static function getstock($orders,$id)
    {
        
        // 评论id
        $comment = explode ( "," ,  $orders->coid_all);
        // 库存id
        $goodstockid = explode ( "," ,  $orders->stid_all);
        // 发货数量
        
        // 库存详情
        $goodstock = GoodStock::whereIn('stid', $goodstockid)->get()->toArray();
        
        // 压入评论
        foreach ($comment as $k => $v) {
            foreach ($goodstock as $key => $value) {
                if ($k == $key) {
                    if ($v != 0) {
                        $goodstock[$k]['comment'] = GoodComment::find($v)->comment;
                    }
                }
            }
        }
        // 压入商品名缩略图
        foreach ($goodstock as $k => $v) {
            $goods = Goods::find($v['gid']);
            $goodstock[$k]['thumb'] = $goods->thumb;
            $goodstock[$k]['gname'] = $goods->gname;
        }
        return $goodstock;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::get();
        return view('admin.orders.index',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        /*$orders = Order::find($id);
        // 评论id
        $comment = explode ( "," ,  $orders->coid_all);
        // 库存id
        $goodstockid = explode ( "," ,  $orders->stid_all);
        // 发货数量
        $number = explode ( "," ,  $orders->number);
        // 库存详情
        $goodstock = GoodStock::whereIn('stid', $goodstockid)->get()->toArray();
        
        // 压入评论
        foreach ($comment as $k => $v) {
            foreach ($goodstock as $key => $value) {
                if ($k == $key) {
                    if ($v != 0) {
                        $goodstock[$k]['comment'] = GoodComment::find($v)->comment;
                    }
                }
            }
        }*/
        $orders = Order::find($id);
        $number = explode ( "," ,  $orders->number);
        $goodstock = self::getstock($orders,$id);
        // 压入发货量
        foreach ($number as $k => $v) {
            foreach ($goodstock as $key => $value) {
                if ($k == $key) {
                    $goodstock[$k]['number'] = $v;
                    // 是否可以发货
                    if ($goodstock[$k]['number'] > $goodstock[$k]['stock']) {
                        $status[$k] = 0;
                    } else {
                        $status[$k] = 1;
                    }
                }
            }
        }
        
        // 库存是否足够发货
        $status = self::getstatus($status);
        
        return view('admin.orders.show',['goodstock'=>$goodstock,'status'=>$status,'orders'=>$orders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // 发货
    public function deliver($id)
    {
        // 修改订单状态
        $orders = Order::find($id);
        $orders->order_status = '2';
        $res = $orders->save();
        if (!$res) {
            return back()->with('error','dingdan修改失败');
        }
        $number = explode ( "," ,  $orders->number);
        $goodstockid = explode ( "," ,  $orders->stid_all);
        $goodstock = self::getstock($orders,$id);
        // 获得发货后剩余的库存
        foreach ($goodstock as $k => $v) {
            foreach ($number as $kk => $vv) {
                if ($k == $kk) {
                    $stock[$goodstock[$k]['stid']] = $goodstock[$k]['stock'] - $vv;
                }
            }
        }
        // 修改剩余的库存
        foreach ($stock as $k => $v) {
            $res2 = GoodStock::find($k);
            $res2->stock = $v;
            $res2 = $res2->save();
        }
        if ($res2) {
            return back()->with('success','发货成功');
        } else {
            return back()->with('error','修改失败');
        }
    }
    
}
