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
        $orders = Order::find($id);
        // 评论id
        $comment = explode ( "," ,  $orders->coid_all);
        // 库存id
        $goodstock = explode ( "," ,  $orders->stid_all);
        // 发货数量
        $number = explode ( "," ,  $orders->number);
        // 库存详情
        foreach ($goodstock as $k => $v) {
            $goodstock[$k] = GoodStock::find($v)->toArray();
        }
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
        // 压入发货量
        foreach ($number as $k => $v) {
            foreach ($goodstock as $key => $value) {
                if ($k == $key) {
                    $goodstock[$k]['number'] = $v;
                }
            }
        }
        // 压入商品名缩略图
        foreach ($goodstock as $k => $v) {
            $goods = Goods::find($v['gid']);
            $goodstock[$k]['thumb'] = $goods->thumb;
            $goodstock[$k]['gname'] = $goods->gname;
        }
       
        return view('admin.orders.show',['goodstock'=>$goodstock]);
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
}
