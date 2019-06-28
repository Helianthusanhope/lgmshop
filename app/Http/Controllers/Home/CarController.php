<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Goods;
use App\Models\GoodStock;
use App\Models\Actives;
class CarController extends Controller
{
	// 购物车 列表页面
	public function index()
	{	
		// $_SESSION['car'] = null;
 		if(!empty($_SESSION['car'])){
			$data = $_SESSION['car'];
		}else{
			$data = [];
		}

		// 总价格
		$priceCount = self::priceCount();
        // 已享优惠
        $pricePromo = self::pricePromo();
        // uid
        if (session('home_login')) {
            $uid = session('home_user')->uid;
        } else {
            $uid = 0;
        }
		// 加载模板
		return view('home.car.index',['data'=>$data,'priceCount'=>$priceCount,'pricePromo'=>$pricePromo,'uid'=>$uid]);
	}


    // 加入购物车
    public function add(Request $request)
    {
    	// $_SESSION['car'] = null;
    	// exit;

    	// echo "add";
    	$id = $request->input('stid',0);
    	$number = $request->input('number',0);
    	if(empty($_SESSION['car'][$id])){
    		// echo $id;
	    	// 获取商品
            $goodstock = GoodStock::find($id);
	    	$data = Goods::select(['gid', 'gname', 'price' ,'cid', 'active_id', 'thumb'])->find($goodstock->gid)->toArray();
            if ($data['active_id'] == '0') {
                $data['price_active'] = $data['price'];
            } else {
                $data['price_active'] = round(Actives::find($data['active_id'])->discount * $data['price'] /10, 2);
            }
            $data['goodstock'] = $goodstock->toArray();
	    	$data['number'] = $number;
            $data['stid'] = $id;
	    	$data['xiaoji'] = $data['price_active'] * $data['number'];
	    	$_SESSION['car'][$id] = $data;
    	}else{
            $goodstock = GoodStock::find($id);  
    		// 当前数量
    		$_SESSION['car'][$id]['number'] = $_SESSION['car'][$id]['number'] + $number;

    		$_SESSION['car'][$id]['xiaoji'] = $_SESSION['car'][$id]['number'] * $_SESSION['car'][$id]['price_active'];

    	}
        
        // $_SESSION['car'] = null;

    	return back();
    	
    	return redirect("home/goods/{$goodstock->gid}?stid={$id}");

    }

    // 统计购物车 总数据量
    public static function countCar()
    {

    	if(empty($_SESSION['car'])){
    		$count = 0;
    	}else{
    		$count = 0;
    		// dump($_SESSION['car']);
    		foreach ($_SESSION['car'] as $key => $value) {
    			$count += $value['number'];
    		}
    	}
    	return $count;
    }

    // 统计总价格
    public static function priceCount()
    {
    	if(empty($_SESSION['car'])){
    		$priceCount = 0;
    	}else{
    		$priceCount = 0;
    		// dump($_SESSION['car']);
    		foreach ($_SESSION['car'] as $key => $value) {
    			$priceCount += $value['xiaoji'];
    		}
    	}
    	return $priceCount;
    }
    // 已享优惠
    public static function pricePromo()
    {
        
        if(empty($_SESSION['car'])){
            $pricepromo = 0;
        }else{
            $priceCount = self::priceCount();
            $pricepromo = 0;
           
            foreach ($_SESSION['car'] as $key => $value) {
                $pricepromo += ($value['price'] * $value['number']);
            }
            $pricepromo = $pricepromo-$priceCount;
        }
        return $pricepromo;
    }

    // 添加 数量
    public function addNum(Request $request)
    {
    	$id = $request->input('id');

    	if(empty($_SESSION['car'])){
    		return back();
    	}else{

    		$n = $_SESSION['car'][$id]['number']+1;
    		$price = $_SESSION['car'][$id]['price_active'];

    		$_SESSION['car'][$id]['number'] = $n;
    		$_SESSION['car'][$id]['xiaoji'] = ($n * $price);
    		// dump($_SESSION['car'][$id]);
    		return back();
    	}
    }

    // 减少数量
    public function descNum(Request $request)
    {
    	$id = $request->input('id');

    	if(empty($_SESSION['car'])){
    		return back();
    	}else{
    		if($_SESSION['car'][$id]['number'] <= 1){
    			return back();
    			exit;
    		}

    		$n = $_SESSION['car'][$id]['number']-1;
    		$price = $_SESSION['car'][$id]['price_active'];

    		$_SESSION['car'][$id]['number'] = $n;
    		$_SESSION['car'][$id]['xiaoji'] = ($n * $price);
    		// dump($_SESSION['car'][$id]);
    		return back();
    	}
    } 

    // 删除数据
    public function delete(Request $request)
    {	
    	$id = $request->input('id');

    	if(empty($_SESSION['car'][$id])){
    		return back();
    	}else{
    		unset($_SESSION['car'][$id]);
    		return back();
    	}
    }

    
    
}
