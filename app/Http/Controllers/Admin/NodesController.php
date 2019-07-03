<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Nodes;
use App\Models\RolesNodes;
class NodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = DB::table('nodes')->get();
        // 加载模板
        return view('admin.nodes.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 加载模板
        return view('admin.nodes.create');
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
        // dump($request->all());
        //权限名称 user cate ...
        $cname = $request->input('cname');

        $controller = $cname.'controller';

        $aname = $request->input('aname');

        $desc = $request->input('desc');

        $res = DB::table('nodes')->insert(['cname'=>$controller,'aname'=>$aname,'desc'=>$desc]);
        if($res){
            return redirect('admin/nodes')->with('success','添加成功');
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
        //获取该条权限的数据
        $node_data = DB::table('nodes')->find($id);
        return view('admin.nodes.edit',['node_data'=>$node_data]);
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
        $nodes = Nodes::find($id);
        //控制器名称
        $nodes->cname = $request->input('cname');

        $nodes->aname = $request->input('aname');
        //权限名称
        $nodes->desc = $request->input('desc');

        $res = $nodes->save();
        if($res){
            return redirect('admin/nodes')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除 权限
        DB::beginTransaction();
        $res1 = Nodes::destroy($id);
        $res2 = RolesNodes::where('nid',$id)->delete();
       
        if($res1 && $res2){
            DB::commit();
            return redirect('admin/nodes')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
