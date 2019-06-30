<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Actives;
use App\Models\Cates;
use DB;
class GoodlistController extends Controller
{
    public function __construct()
	{
		// 引入类文件
		require 'pscws4/pscws4.class.php';
		// 实例化
		@$this->cws = new \PSCWS4;
		//设置字符集
		$this->cws->set_charset('utf8');
		//设置词典
		$this->cws->set_dict('pscws4/etc/dict.utf8.xdb');
		//设置utf8规则
		$this->cws->set_rule('pscws4/etc/rules.utf8.ini');
		//忽略标点符号
		$this->cws->set_ignore(true);
	}

	public function dataWord()
	{
		$data = DB::table('goods')->select('gname','gid')->get();
		// dump($data);
		foreach ($data as $key => $value) {
			$arr = $this->word($value->gname);
			foreach($arr as $kk=>$vv){
				DB::table('goods_word')->insert(['gid'=>$value->gid,'word'=>$vv]);
			}
			
			// $brr = $this->keyword();
			// foreach($brr as $kk1=>$vv1){
			// 	DB::table('goods_word')->insert(['gid'=>$value->gid,'word'=>$vv1]);
			// }		
		}

	}

	// public static function keyword()
	// {
		
	// }

	//获取分类导航数据
	public static function getCateNav($id)
	{
		//第三级分类导航
    	$cate_data = DB::table('cates')->where('cid',$id)->select('cid','cname','path')->first();
    	$cids = explode(',', $cate_data->path);
    	//获取父级分类
    	$cate_nav = DB::table('cates')->whereIn('cid',$cids)->select('cid','cname','path')->get();
    	$cate_nav[] =$cate_data ;
    	return $cate_nav;
	}

	//

	// 一级分类跳转到对应商品
	public function catetop(Request $request,$id)
	{
		//获取商品所对应的的 第三级分类
    	$top_cid = $id;
    	$top_cid_name = DB::table('cates')->select('cname')->where('cid',$top_cid)->first();
    	//所有的 分类id 和路径
    	$cid_paths = DB::table('cates')->select('cid','path')->get()->toArray();
    	//获取 顶级分类 对应的所有 三级分类
    	$cids = [];
    	foreach( $cid_paths as $k=>$v ){
    		$path = $v->path;
    		if( substr_count($path,',') == 2 && explode(',',$path)[1] == $top_cid ){
    			$cids[] = $v->cid;
    		}
    	}
    	if ($request->input('sort','')) {
    		$sort = $request->input('sort','');
    		if ($sort == 'price') {
    			$desc = 'asc';
    		} else {
    			$desc = 'desc';
    		}
    		$goods = Goods::whereIn('cid',$cids)->where('good_status','1')->orderBy($sort,$desc)->select('gid','gname','price','cid','thumb','active_id','sale')->paginate(50);
    	} else {
    		$sort = 1;
    		$goods = Goods::whereIn('cid',$cids)->where('good_status','1')->orderBy('sale','desc')->orderBy('collect','desc')->select('gid','gname','price','cid','thumb','active_id','sale')->paginate(50);
    	}
    	return view('home.goodlist.catetop',['top_cid_name'=>$top_cid_name,'data'=>$goods,'search'=>'','cid'=>$id,'sort'=>$sort]);
	}


	// 一级分类跳转到对应商品
	public function catetwo(Request $request,$id)
	{
		//获取商品所对应的的 第三级分类
    	$two_cid = $id;
    	$two_cid_name = DB::table('cates')->select('cname')->where('cid',$two_cid)->first();
    	//所有的 分类id 和路径
    	$cid_paths = DB::table('cates')->select('cid','path')->get()->toArray();
    	//获取 顶级分类 对应的所有 三级分类
    	$cids = [];
    	
    	foreach( $cid_paths as $k=>$v ){
    		$path = $v->path;
    		if( substr_count($path,',') == 2 && explode(',',$path)[2] == $two_cid ){
    			$cids[] = $v->cid;
    		}
    	}
    	if ($request->input('sort','')) {
    		$sort = $request->input('sort','');
    		if ($sort == 'price') {
    			$desc = 'asc';
    		} else {
    			$desc = 'desc';
    		}
    		$goods = Goods::whereIn('cid',$cids)->where('good_status','1')->orderBy($sort,$desc)->select('gid','gname','price','cid','thumb','active_id','sale')->paginate(50);
    	} else {
    		$sort = 1;
    		$goods = Goods::whereIn('cid',$cids)->where('good_status','1')->orderBy('sale','desc')->orderBy('collect','desc')->select('gid','gname','price','cid','thumb','active_id','sale')->paginate(50);
    	}
    	return view('home.goodlist.catetwo',['two_cid_name'=>$two_cid_name,'data'=>$goods,'search'=>'','cid'=>$id,'sort'=>$sort]);
	}

	// 分类id 显示商品列表页
    public function show(Request $request, $id)
    {

    	if ($request->input('sort','')) {
    		$sort = $request->input('sort','');
    		if ($sort == 'price') {
    			$desc = 'asc';
    		} else {
    			$desc = 'desc';
    		}
    		$goods = Goods::where('cid',$id)->where('good_status','1')->orderBy($sort,$desc)->select('gid','gname','price','cid','thumb','active_id','sale')->paginate(50);
    	} else {
    		$sort = 1;
    		$goods = Goods::where('cid',$id)->where('good_status','1')->orderBy('sale','desc')->orderBy('collect','desc')->select('gid','gname','price','cid','thumb','active_id','sale')->paginate(50);
    	}
    	$cate_nav = self::getCateNav($id);
    	return view('home.goodlist.index',['data'=>$goods,'cate_nav'=>$cate_nav,'search'=>'','cid'=>$id,'sort'=>$sort]);
    }


    //
    public function index(Request $request)
    {
    	$cate_nav = null;
    	// $_SESSION['car'] = null;
    	$this->dataWord();

    	$countCar = CarController::countCar();
    	// 接收  搜索参数
    	$search = $request->input('search','');
    	if ($request->input('sort','')) {
    		$sort = $request->input('sort','');
    		if ($sort == 'price') {
    			$desc = 'asc';
    		} else {
    			$desc = 'desc';
    		}
    		if (!empty($search)) {
	    		if (preg_match('/[\w]/', $search)) {
	    			// echo "this is mysql like ....";
	    			// dump(preg_match('/[\w]/',$search));

	    			$goods = Goods::where('gname','like','%'.$search.'%')->orderBy($sort,$desc)->paginate(50);

	    		} else {
	    			// echo "this is 中文分词 ....";
		    		$gid = DB::table('view_goods_word')->select('gid')->where('word',$search)->get();
			    	// dump($gid);
			    	$gids = [];
			    	foreach ($gid as $key => $value) {
			    		$gids[] = $value->gid;
			    	}
			    	// dump($gids);
			    	// dump($data2);

			    	$goods = Goods::whereIn('gid',$gids)->orderBy($sort,$desc)->paginate(50);
			    }
	    	}else{
	    		$goods = Goods::orderBy($sort,$desc)->paginate(50);
	    	}
    	} else {
    		$sort = 1;
    		if (!empty($search)) {
	    		if (preg_match('/[\w]/', $search)) {


	    			$goods = Goods::where('gname','like','%'.$search.'%')->orderBy('sale','desc')->orderBy('collect','desc')->paginate(50);

	    		} else {

		    		$gid = DB::table('view_goods_word')->select('gid')->where('word',$search)->get();

			    	$gids = [];
			    	foreach ($gid as $key => $value) {
			    		$gids[] = $value->gid;
			    	}

			    	$goods = Goods::whereIn('gid',$gids)->orderBy('sale','desc')->orderBy('collect','desc')->paginate(50);
			    }
	    	}else{
	    		$goods = Goods::orderBy('sale','desc')->orderBy('collect','desc')->paginate(50);
	    	}
    	}

    	return view('home.goodlist.index',['data'=>$goods,'countCar'=>$countCar,'cate_nav'=>$cate_nav,'search'=>$search,'sort'=>$sort]);
    }

    public function word($text)
    {

		$arr = explode(' ',$text);
		$preg = '/[\w\+\%\.\(\)]+/';

		$string = ''; 
		foreach ($arr as $key => $value) {
			// if(!preg_match($preg,$value)){
			// 	$string .= $value;
			// }

			$string .= preg_replace($preg,'',$value);

		}

		//传递字符串
		$this->cws->send_text($string);
		//获取权重最高的前十个词
		// $res = $cws->get_tops(10);// top 顶部
		//获取所有的结果
		$res = $this->cws->get_result();
		$list  = [];
		foreach ($res as $key => $value) {
			$list[] = $value['word'];
		}
		// var_dump($list);
		return $list;

    }

    public function __destruct()
    {
    	//关闭
		$this->cws->close();
    }
}
