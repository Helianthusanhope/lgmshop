<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //显示用户列表

        $cates = Cates::get();
        // 加载页面
        return view('admin.cates.index',['cates'=>$cates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
         // 加载页面
        return view('admin.cates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pid = $request->input('pid');

    	if ($pid == 0) {
    		$path = 0;
    	} else {
    		//获取父级数据
    		$parent_data = 	DB::table('cates')->where('id',$pid)->first();

    		$path = $parent_data->path.','.$parent_data->id;
    	}

    	$data['pid'] = $pid;
    	$data['cname'] = $request->input('cname','');
    	$data['path'] = $path;
    	//将数据压入到数据库
    	$res = DB::table('cates')->insert($data);
    	if($res){
            return redirect('admin/cates/index')->with('success','添加成功'); 
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
