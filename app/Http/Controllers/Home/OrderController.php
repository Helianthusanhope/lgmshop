<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserAddr;
use App\Models\Goods;
use App\Models\GoodStock;
use App\Models\Actives;
use App\Models\Order;
use APP\Http\Controllers\Home\CarController;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!empty($_SESSION['car'])){
            $data = $_SESSION['car'];
        } else {
            $data = [];
        }
        $uid = session('home_user')->uid;
        $priceCount = CarController::priceCount();     
        //分配现有的地址数据
        $addr = UserAddr::where('uid',$uid)->get();         
        return view('home.order.index',['addr'=>$addr,'data'=>$data,'priceCount'=>$priceCount]);

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
        $aid = $request->input('aid','');
        $price_all = $request->input('price_all','');
        $data = $_SESSION['car'];
        $stid_all = '';
        $number = '';
        $price = '';
        $a = 0;
        foreach ($data as $k => $v) {
            $a++;
            if ($a == 1) {
                $stid_all = $k;
                $number = $v['number'];
                $price = $v['price_active'];
            } else {
                $stid_all = $stid_all.','.$k;
                $number = $number.','.$v['number'];
                $price = $price.','.$v['price_active'];
            }
            
        }
        $oname = time().session('home_user')->uid;
        $orders = new Order;
        $orders->uid = session('home_user')->uid;
        $orders->oname = str_pad($oname,15,rand(0,9999),STR_PAD_RIGHT);
        $orders->aid = $aid;
        $orders->price_all = $price_all;
        $orders->price = $price;
        $orders->stid_all = $stid_all;
        $orders->number = $number;
        $orders->order_status = '1';
        $res = $orders->save();
        if ($res) {
            $_SESSION['car'] = null;
            echo json_encode(['msg'=>'ok','info'=>'提交订单成功','oid'=>$orders->id]);
            exit;
        } else {
            echo json_encode(['msg'=>'err','info'=>'提交订单失败']);
            exit;
        }

        
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
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

    // 
    public function success(Request $request)
    {
        $useraddr = UserAddr::find($request->input('aid', ''));
        $price_all = $request->input('price_all', '');
        $oid = $request->input('oid', '');
        return view('home.order.success',['useraddr'=>$useraddr,'price_all'=>$price_all,'oid'=>$oid]);
    }

    // 计算订单信息
    public function buy(Request $request)
    {
        $stid = $request->input('stid','');
        $number = $request->input('number','');
        if(!empty($_SESSION['car'])){
            if (!empty($_SESSION['car'][$stid]) && !empty($stid)) {
                $_SESSION['car'][$stid]['number'] = $_SESSION['car'][$stid]['number'] + $number;
                $_SESSION['car'][$stid]['xiaoji'] = $_SESSION['car'][$stid]['number'] * $_SESSION['car'][$stid]['price_active'];
            } elseif (empty($_SESSION['car'][$stid]) && !empty($stid)) {
                $goodstock = GoodStock::find($stid);
                $data = Goods::select(['gid', 'gname', 'price' ,'cid', 'active_id', 'thumb'])->find($goodstock->gid)->toArray();
                if ($data['active_id'] == '0') {
                    $data['price_active'] = $data['price'];
                } else {
                    $data['price_active'] = round(Actives::find($data['active_id'])->discount * $data['price'] /10, 2);
                }
                $data['goodstock'] = $goodstock->toArray();
                $data['number'] = $number;
                $data['stid'] = $stid;
                $data['xiaoji'] = $data['price_active'] * $data['number'];
                $_SESSION['car'][$stid] = $data;
                }

        } else {
            $goodstock = GoodStock::find($stid);
            $data = Goods::select(['gid', 'gname', 'price' ,'cid', 'active_id', 'thumb'])->find($goodstock->gid)->toArray();
            if ($data['active_id'] == '0') {
                $data['price_active'] = $data['price'];
            } else {
                $data['price_active'] = round(Actives::find($data['active_id'])->discount * $data['price'] /10, 2);
            }
            $data['goodstock'] = $goodstock->toArray();
            $data['number'] = $number;
            $data['stid'] = $stid;
            $data['xiaoji'] = $data['price_active'] * $data['number'];
            $_SESSION['car'][$stid] = $data;
        }
        return redirect('/home/orders');
    }
}
