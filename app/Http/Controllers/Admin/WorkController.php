<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Work;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works_data = Work::get();
        foreach ($works_data as $k => $v) {
            $v->wcontent = htmlspecialchars_decode($v->wcontent);
        }
        //显示文章列表
        return view('admin.works.index',['works_data'=>$works_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //添加文章
        return view('admin.works.create');
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
        $data = $request->all();
        // 接收数据
        $work = new Work;
        $work->wtitle = $data['wtitle'];
        $work->wdesc = $data['wdesc'];
        $work->wcontent = $data['wcontent'];
        $res = $work->save();


        if($res){
            return redirect('admin/works')->with('success','添加成功');
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
        $work_data = Work::find($id);
        //显示文章列表
        return view('admin.works.show',['work_data'=>$work_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //查到对应的文章
        $Work = Work::find($id);

        return view('admin.works.edit',['Work'=>$Work]);
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
        $res = Work::destroy($id);
        // 删除用户头像
        /*
            use Illuminate\Support\Facades\Storage;
            Storage::delete('file.jpg');
            Storage::delete(['file1.jpg', 'file2.jpg']);
         */
        if ($res) {
            return redirect('admin/works')->with('success','删除成功');
        } else {
            return back()->with('error','删除失败');
        }
    }

    // 快速显示
    public function status($id)
    {       
        $Work = Work::find($id);
        $status = abs($Work->status-1);
        $Work->status = $status;
        $res = $Work->save();

        if($res){
            return back()->with('success','操作成功');
        }else{
            return back()->with('error','操作失败');
        }
    }
}
