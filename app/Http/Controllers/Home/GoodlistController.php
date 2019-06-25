<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
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
			
		}

	}
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

	 //显示商品列表页
    public function show($id)
    {
    	$goods = Goods::where('cid',$id)->where('good_status','1')->select('gid','gname','price','cid','thumb','active_id','sale')->get();
    	$cate_nav = self::getCateNav($id);
    	return view('home.goodlist.index',['data'=>$goods,'cate_nav'=>$cate_nav]);
    }


    //
    public function index(Request $request)
    {
    	$cate_nav = null;
    	// $_SESSION['car'] = null;
    	// $this->dataWord();
    	// $str = '倍混合变焦麒麟980芯片屏内指纹';
    	// $str = '荣耀8X 千元屏 霸91% 屏占比';
    	// $str = '小辣椒 红辣椒7X 4+64GB 学生智能手机 美颜双摄 微Q多开 人脸识别 移动联通电';
    	// $this->word($str);
    	$countCar = CarController::countCar();
    	// 接收  搜索参数
    	$search = $request->input('search','');

    	// $data = DB::table('goods')->where('gname','like','%'.$search.'%')->get();

    	/* 中文分词 开始  */

    	if(!empty($search)){
    		if(preg_match('/[\w]/',$search)){
    			// echo "this is mysql like ....";
    			// dump(preg_match('/[\w]/',$search));
    			$goods = DB::table('goods')->where('gname','like','%'.$search.'%')->get();
    		}else{
    			// echo "this is 中文分词 ....";
	    		$gid = DB::table('view_goods_word')->select('gid')->where('word',$search)->get();
		    	// dump($gid);
		    	$gids = [];
		    	foreach ($gid as $key => $value) {
		    		$gids[] = $value->gid;
		    	}
		    	// dump($gids);
		    	// dump($data2);
		    	$goods = DB::table('goods')->whereIn('gid',$gids)->get();
	    	}
    	}else{
    		$goods = DB::table('goods')->get();
    	}

    	/* 中文分词 结束  */

    	return view('home.goodlist.index',['data'=>$goods,'countCar'=>$countCar,'cate_nav'=>$cate_nav]);
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
