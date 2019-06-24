<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Actives;
use DB;
class GoodlistController extends Controller
{
    //显示商品列表页
    public function index($id)
    {
    	$goods = Goods::where('cid',$id)->where('good_status','1')->select('gid','gname','price','cid','thumb','active_id','sale')->get();
    	// echo "商品列表";
    	return view('home.goodlist.index',['goods'=>$goods]);
    }
}
