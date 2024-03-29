<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Actives;
use App\Models\Order;
use App\Models\GoodStock;
use App\Models\GoodComment;
use DB;
class GoodController extends Controller
{
    // 获取库存id
    public static function getstid($good, $id)
    {
        if (empty($id)) {
            foreach ($good->goodstock as $k => $v) {
                $stid = $v->stid;
                return $stid;
            }
        } else {
            $stid = $id;
            return $stid;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function show(Request $request, $id)
    {
        // 商品信息
        $good = Goods::find($id);
        $like = Goods::where('cid',$good->cid)->whereNotIn('gid',[$id])->orderBy('sale','desc')->skip(0)->take(8)->get();
        $looks = Goods::where('cid',$good->cid)->whereNotIn('gid',[$id])->skip(0)->take(5)->get();
        // 优惠
        if ($good->active_id != 0) {
            $active =  DB::table('actives')->where('id',$good->active_id)->first()->discount;
        } else {
            $active = 10;
        }
        // 评论
        $goodcomment = GoodComment::where('gid',$id)->Paginate(5);


        // 评论计数
        $comment = GoodComment::where('gid',$id)->get();
        $num['good'] = $comment->whereIn('stars',['5','4'])->count();
        $num['middle'] = $comment->where('stars','3')->count();
        $num['bad'] = $comment->whereIn('stars',['2','1'])->count();


        if ($good->num == 0) {
            $num['pro'] = 100;
        } else {
            $num['pro'] = round($num['good'] / $good->num, 2) * 100;
        }
        
        // 默认库存id
        $stid = $request->input('stid','');
        $stid = self::getstid($good, $stid);
        if (session('home_login')) {
            $uid = session('home_user')->uid;
        } else {
            $uid = 0;
        }
        return view('home.good.show',['good'=>$good,'like'=>$like,'active'=>$active,'goodcomment'=>$goodcomment,'stid'=>$stid,'uid'=>$uid,'looks'=>$looks,'num'=>$num]);
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
