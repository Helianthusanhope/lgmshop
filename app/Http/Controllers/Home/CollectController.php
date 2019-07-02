<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GoodCollect;
use App\Models\Goods;
use DB;
class CollectController extends Controller
{
    //
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
}
