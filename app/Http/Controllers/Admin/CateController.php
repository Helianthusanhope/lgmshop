<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;
class CateController extends Controller
{
    //得到分类数据并排版
    public static function getCateDate()
    {
        //获取数据 并排版
        $cates = Cates::select('*',DB::raw("concat(path,',',cid) as paths"))->orderBy('paths','asc')->get();

        foreach ($cates as $key => $value) {
            $n = substr_count($value->path,',');

            $cates[$key]->cname = str_repeat('|----',$n).$value->cname;
            
        }

        return $cates;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 加载页面
        return view('admin.cates.index',['cates'=>self::getCateDate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $cid = $request->input('cid',0);
        // 加载页面
        return view('admin.cates.create',['cid'=>$cid,'cates'=>self::getCateDate()]);

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
         $pid = $request->input('pid',0);

        if ($pid == 0) {
            $path = 0;
        } else {
            //获取父级数据
            $parent_data = Cates::find($pid);

            $path = $parent_data->path.','.$parent_data->cid;
        }
        $cate = new Cates;
        $cate->pid = $pid;
        $cate->cname = $request->input('cname','');
        $cate->path = $path;
        //将数据压入到数据库
        $res = $cate->save();
        if($res){
            return redirect('admin/cates')->with('success','添加成功'); 
        }else{
            return back()->with('error','添加失败');
        }
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
