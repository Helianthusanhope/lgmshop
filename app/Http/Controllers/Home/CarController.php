<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
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

		// 加载模板
		return view('home.car.index',['data'=>$data,'priceCount'=>$priceCount]);
	}


    // 加入购物车
    public function add(Request $request)
    {
    	// $_SESSION['car'] = null;
    	// exit;

    	// echo "add";
    	$id = $request->input('id',0);
    	

    	if(empty($_SESSION['car'][$id])){
    		// echo $id;
	    	// 获取商品
	    	$data = DB::table('goods')->select('id','title','price')->where('id',$id)->first();
	    	$data->num = 1;

	    	$data->xiaoji = ($data->price * $data->num);
	    	$_SESSION['car'][$id] = $data;
    	}else{
    		// 当前数量
    		$_SESSION['car'][$id]->num = $_SESSION['car'][$id]->num + 1;

    		$_SESSION['car'][$id]->xiaoji = ($_SESSION['car'][$id]->num * $_SESSION['car'][$id]->price);

    	}
    	

    	// dump($_SESSION['car']);
    	
    	return redirect('home/list');

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
    			$count += $value->num;
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
    			$priceCount += $value->xiaoji;
    		}
    	}
    	return $priceCount;
    }


    // 添加 数量
    public function addNum(Request $request)
    {
    	$id = $request->input('id');

    	if(empty($_SESSION['car'])){
    		return back();
    	}else{

    		$n = $_SESSION['car'][$id]->num+1;
    		$price = $_SESSION['car'][$id]->price;

    		$_SESSION['car'][$id]->num = $n;
    		$_SESSION['car'][$id]->xiaoji = ($n * $price);
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
    		if($_SESSION['car'][$id]->num <= 1){
    			return back();
    			exit;
    		}

    		$n = $_SESSION['car'][$id]->num-1;
    		$price = $_SESSION['car'][$id]->price;

    		$_SESSION['car'][$id]->num = $n;
    		$_SESSION['car'][$id]->xiaoji = ($n * $price);
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
