<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Friends;
use App\Models\Webconfig;
use App\Models\Banners;
use App\Models\Goods;
use DB;

class IndexController extends Controller
{
    //得到所有的友情链接
    public static function gerFriendsData()
    {
        $friends_data = Friends::get();
        return $friends_data;
    }
    //获取所有哦的网站配置
    public static function getWebconfigsData()
    {
        $webconfigs_data = Webconfig::get();
        return $webconfigs_data;

    }
    //获取 所有的分类 排版 成可三级分类 的形式
    public static function getPidCatesData($pid = 0)
    {
        $data = Cates::where('pid',$pid)->get();
        foreach ($data as $k => $v) {
            $v->sub = self::getPidCatesData($v->cid);
        }

        return $data;
    }

    //获取所有商品对应的 三级分类 并形成可以foreach 的形式
    public static function getCateGoods()
    {
        //获取商品所对应的的所有分类

        $cids = DB::table('goods')->pluck('cid','gid')->toArray();

        // dump( $cids );
        //顶级分类 id
        $categoods = DB::table('cates')->whereIn('cid',$cids)->get();
        // dump( $categoods ); 
        $cates_top = [];
        foreach ($categoods as $k => $v) {
            $v->sub1 = Goods::where('cid',$v->cid )->get();
            $v->sub2 = $cates_top[] = explode(',', $v->path)[1];
             // substr_count($v->path,',');
             // $cates_three[] = explode(',', $v->path)[3];

        }
        return $categoods;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        //已共享 $common_cates_data
        $works_data = WorkController::getWorksAll();
        $actives_commend = ActiveController::getActivesCommend();
        $actives_not_commend = ActiveController::getActivesNotcommend();

        $banners_data = Banners::get();
        $data = Goods::get();
        $categoods = self::getCateGoods();
        return view('home.index.index',['categoods'=>$categoods,'data'=>$data,'actives_not_commend'=>$actives_not_commend,'actives_commend'=>$actives_commend,'works_data'=>$works_data,'banners_data'=>$banners_data]);        
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
