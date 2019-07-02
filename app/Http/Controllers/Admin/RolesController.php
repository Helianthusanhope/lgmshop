<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Roles;
use App\Models\RolesNodes;
class RolesController extends Controller
{
    public static function conall()
    {
        $actions=explode('\\', \Route::current()->getActionName());
        //或$actions=explode('\\', \Route::currentRouteAction());
        $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
        $func=explode('@', $actions[count($actions)-1]);
        $controllerName=$func[0];
        $actionName=$func[1];
        $data = DB::table('nodes')->pluck('desc','cname');
        return [
            'usercontroller'=>'用户管理',
            'catecontroller'=>'分类管理',
            'indexcontroller'=>'首页显示',
            'adminusercontroller'=>'管理员管理',
            'rolescontroller'=>'角色管理',
            'nodescontroller'=>'权限管理',
            'catecontroller'=>'分区管理',
            'goodcontroller'=>'商品管理',
            'ordercontroller'=>'订单管理',
            'bannercontroller'=>'轮播图管理',
            'activecontroller'=>'活动管理',
            'friendcontroller'=>'友情链接管理',
            'webconfigcontroller'=>'网站配置管理',
            'workcontroller'=>'新闻(文章)管理',
        ];
    }

    public static function getNodesList()
    {
        $nodes_data = DB::table('nodes')->get();

        $list = [];
        foreach($nodes_data as $k=>$v){
            $temp['id'] = $v->id;
            // $temp['cname'] = $v->cname;
            $temp['aname'] = $v->aname;
            $temp['desc'] = $v->desc;
            $list[$v->cname][] = $temp;
        }

        return $list;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles_data = DB::table('roles')->get();

        // 加载模板
        return view('admin.roles.index',['roles_data'=>$roles_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*[
            'usercontroller'=>['index','create','xxxx']
            'catecontroller'=>['index','create','xxxx']
        ]*/

       
        $list = self::getNodesList();

        // 加载模板
        return view('admin.roles.create',['list'=>$list,'conall'=>self::conall()]);
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

        $rname = $request->input('rname','');

        $nids = $request->input('nids');

        // 添加角色表
        $rid = DB::table('roles')->insertGetId(['rname'=>$rname]);

        // 添加角色关系表
        foreach ($nids as $k => $v) {
           $res =  DB::table('roles_nodes')->insert(['rid'=>$rid,'nid'=>$v]);  
        }


        if($rid && $res){
            DB::commit();
            return redirect('admin/roles')->with('success','添加成功');
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
        //该角色的所有权利
        $nodes_id = DB::table('roles_nodes')->where('rid',$id)->pluck('nid')->toArray();
        //所有权利列表
        $list = self::getNodesList();
        //该角色信息
        $role_data = DB::table('roles')->where('id',$id)->first();
        return view('admin.roles.edit',['nodes_id'=>$nodes_id,'role_data'=>$role_data,'list'=>$list,'conall'=>self::conall()]);
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
        

        DB::beginTransaction();
        //该角色id 
        $rid  = $id;
        // 添加角色表
        $roles = Roles::find($rid);
        $roles->rname = $request->input('rname','');
        $res1 = $roles->save();

        $nids = $request->input('nids');

        // 添加角色关系表
        foreach ($nids as $k => $v) {
           $res2 =  RolesNodes::where('rid',$rid)->update(['rid'=>$rid,'nid'=>$v]);  
        }


        if($res1 && $res2){
            DB::commit();
            return redirect('admin/roles')->with('success','添加成功');
        }else{
            DB::rollBack();
             return back()->with('error','添加失败');
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
        //删除角色
        DB::beginTransaction();
        $res1 = Roles::destroy($id);
        $res2 = RolesNodes::where('rid',$id)->delete();
       
        if($res1 && $res2){
            DB::commit();
            return redirect('admin/roles')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
