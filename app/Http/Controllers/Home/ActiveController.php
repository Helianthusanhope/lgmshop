<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Actives;
use App\Models\Goods;

class ActiveController extends Controller
{
	//获取所有活动信息
	public static function getActivesAll()
	{
		$actives_data = Actives::all();
		return $actives_data;
	}
	
	//获取 没有 上推荐位信息
	public static function getActivesNotcommend()
	{
		//显示未被推荐的4条活动
		$actives_not_commend = Actives::where('status',0)->orderBy('created_at','desc')->take(4)->get();
		return $actives_not_commend;
	}

	//获取所有活动 上 推荐位信息
	public static function getActivesCommend()
	{
		//显示未被推荐的4条活动
		$actives_commend = Actives::where('status',1)->orderBy('created_at','desc')->take(3)->get();
		return $actives_commend;
	}
    //显示一个活动页面
    public function index($id)
    {
    	//活动对应的商品
    	$active_goods_data = Goods::where('active_id',$id)->get();

    	$active_name = Actives::where('id',$id)->select('active_name')->first();
    	return view('home.active.index',['active_name'=>$active_name,'active_goods_data'=>$active_goods_data]);
    }

    public function show()
    {
    	return view('home.active.show');
    }
}
