<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GoodCollect;
use App\Models\Goods;
use DB;
class CollectController extends Controller
{
    //封装查询收藏方法
    static function collect()
    {
        //查询现在用户的所有的收藏
        $collect = GoodCollect::where('uid',session('home_user')->uid)->get();
        //通过商品ID找到商品数据
        $good = [];
        foreach($collect as $k=>$v){

            //将所有的收藏压入到数组           
            $good[$k] = DB::table('goods')->where('gid',$v->gid)->first();

        } 
        foreach($good as $k=>$v){

            $good[$k]->active_id = DB::table('actives')->where('id',$v->active_id)->first();
        }

        return $good;
    }    



    public function goCollect(Request $request)
    {
    	$gid = $request->input('gid',0);
    	if(!session('home_login')){
    		echo json_encode(['msg'=>'err','info'=>'请您先登录']);
    		exit;
    	}
    	$uid = session('home_user')->uid;
    	$gid_all = GoodCollect::where('uid',$uid)->select('gid')->get()->toArray();
    	foreach ($gid_all as $k => $v) {
    		$gid_all[$k] = $v['gid'];
    	}
    	// 检查当前用户是否给该文章点过赞
    	if(in_array($gid, $gid_all)){
    		echo json_encode(['msg'=>'err','info'=>'您已经收藏过了']);
    		exit;
    	}
    	// 点赞量+1
    	$res1 = Goods::find($gid);
    	$res1->collect = $res1->collect + 1;
    	$res1 = $res1->save();
    	$goodcollect = new GoodCollect;
    	$goodcollect->uid = $uid;
    	$goodcollect->gid = $gid;
    	$res2 = $goodcollect->save();
    	if ($res1 && $res2) {
    		echo json_encode(['msg'=>'ok','info'=>"收藏成功"]);
    		exit;
    	} else {
    		echo json_encode(['msg'=>'err','info'=>'收藏失败']);
    		exit;
    	}
    }


    //显示收藏中心
    public function index()
    {
        
        //获取收藏数据并且分配给页面
        $good = self::collect();
        return view('home.personal.collect',['good'=>$good]);
    }

    //执行移除收藏
    public function edit(Request $request)
    {
        $gid = $request->input('gid',0);
        $collect = GoodCollect::where('gid',$gid)->first();

        $res = $collect->delete();

        if($res) {

           echo json_encode( ['msg'=>'ok','info'=>'取消成功'] );
            exit;
        } else {
               echo json_encode( ['msg'=>'err','info'=>'取消失败'] );
            exit;
        }
    }
}
