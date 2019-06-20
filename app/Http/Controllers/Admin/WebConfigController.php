<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Webconfig;
use DB;
use Illuminate\Support\Facades\Storage;
class WebConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $webconfig = Webconfig::get();
        return view('admin.webconfigs.index',['webconfig'=>$webconfig]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.webconfigs.create');
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
        DB::beginTransaction();

        if($request->hasFile('logo')){

            // 创建文件上传对象
            $file_path = $request->file('logo')->store(date('Ymd'));
        }else{
            $file_path = '';
        }
        $data = $request->all();

        // 接收数据
        $webconfig = new Webconfig;
        $webconfig->logo = $file_path;
        $webconfig->describe = $data['describe'];
        $webconfig->name = $data['name'];
        $webconfig->filing = $data['filing'];
        $webconfig->telephone = $data['telephone'];
        $res = $webconfig->save();


        if($res){
            DB::commit();
            return redirect('admin/webconfigs')->with('success','添加成功');
        }else{
            DB::rollBack();
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
        $webconfig = Webconfig::find($id);
        return view('admin.webconfigs.edit',['webconfig'=>$webconfig]);
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
        DB::beginTransaction();

        if($request->hasFile('logo')){
            // 删旧文件
            Storage::delete($request->input('old_profile',''));
            // 创建文件上传对象
            $file_path = $request->file('logo')->store(date('Ymd'));
        }else{
            $file_path = $request->input('old_logo');
        }
        $data = $request->all();

        // 接收数据
        $webconfig = Webconfig::find($id);
        $webconfig->logo = $file_path;
        $webconfig->describe = $data['describe'];
        $webconfig->name = $data['name'];
        $webconfig->filing = $data['filing'];
        $webconfig->telephone = $data['telephone'];
        $res = $webconfig->save();


        if($res){
            DB::commit();
            return redirect('admin/webconfigs')->with('success','修改成功');
        }else{
            DB::rollBack();
            return back()->with('error','修改失败');
        }
    }

    /**
     * 快速开启
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        //
        DB::beginTransaction();
        $webconfig = Webconfig::find($id);
        $status = abs($webconfig->status-1);
        $webconfig->status = "$status";
        $res = $webconfig->save();

        if($res){
            DB::commit();
            return back()->with('success','操作成功');
        }else{
            DB::rollBack();
            return back()->with('error','操作失败');
        }
    }
}
