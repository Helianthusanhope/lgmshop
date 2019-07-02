<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Adminusers;
use App\Models\Adminusers_roles;
use App\Models\Roles;
use DB;
use Hash;
class AdminuserController extends Controller
{
    // 获取所有管理员的角色
    public static function getAdminusersRoles()
    {
        // 获取所有管理员的角色
        $admin_user_roles = DB::select('select au.id,r.rname from  adminusers as au,adminusers_roles as ur,roles as r  where au.id = ur.uid and ur.rid = r.id ');
        // dump($admin_user_roles);
        $uid = array_column($admin_user_roles, 'id');
        $rname = array_column($admin_user_roles, 'rname');
        $admin_user_roles = array_combine($uid,$rname);  
        // dd($admin_user_roles);
        
        return $admin_user_roles;
    }

     // 获取所有角色对应管理员id
    // public static function getAdminusersRoles()
    // {
    //     // 获取所有管理员的角色
    //     $admin_user_roles = DB::select('select au.id,r.rname from  adminusers as au,adminusers_roles as ur,roles as r  where au.id = ur.uid and ur.rid = r.id ');
    //     // dump($admin_user_roles);
    //     $uid = array_column($admin_user_roles, 'id');
    //     $rname = array_column($admin_user_roles, 'rname');
    //     $admin_user_roles = array_combine($uid,$rname);  
    //     // dd($admin_user_roles);
        
    //     return $admin_user_roles;
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //显示管理员列表
        $adminusers = Adminusers::get();
        //获取所有管理员对应的角色
        $adminuser_roles = self::getAdminusersRoles();
        
        return view('admin.adminuser.index',['adminusers'=>$adminusers,'adminuser_roles'=>$adminuser_roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取所有的 角色
        $roles_data = DB::table('roles')->get();



        return view('admin.adminuser.create',['roles_data'=>$roles_data]);
        
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
        DB::beginTransaction();
        $uname = $request->input('uname',''); 
        $upass = $request->input('upass',''); 
        $repass = $request->input('repass',''); 
        $rid = $request->input('rid',''); 

        if($upass != $repass){
            return back()->width('error','俩次密码不一致');
        }

        // 文件上传
        if($request->hasFile('profile')){
            $path = $request->file('profile')->store(date('Ymd'));
        }else{
            $path = '';
        }

        $temp['uname'] = $uname;
        $temp['upass'] = Hash::make($upass);
        $temp['profile'] = $path;


        $uid = DB::table('adminusers')->insertGetId($temp);

        $res  = DB::table('adminusers_roles')->insert(['uid'=>$uid,'rid'=>$rid]);

        if($uid && $res){
            DB::commit();
            return redirect('admin/adminuser')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
            DB::rollBack();
        }

    }

    /**
     * 修改密码
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show() 
    {
        return view('admin.adminuser.show');
    }

    public function changeInfo(Request $request,$id) 
    {
        // dd($request->all());
        $id = session('admin_user')->id;
        // 接收值
        $data['uname'] = $request->input('uname','');
        $data['upass'] = Hash::make($request->input('upass',''));
        // 执行添加
        $res = DB::table('adminusers')->where('id',$id)->update($data);
        if($res){
            //注册
            echo json_encode(['msg'=>'ok','info'=>'修改成功']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取该管理员对应的名字
        $adminusers = Adminusers::find($id);

        // 获取所有的 角色
        $roles_data = DB::table('roles')->get();

        //获取 所有 管理员id对应的 角色
        $adminuser_roles = self::getAdminusersRoles();
        
        //获取该管理员对应的角色
        $role = $adminuser_roles[$id];

        return view('admin.adminuser.edit',['adminusers'=>$adminusers,'roles_data'=>$roles_data,'role'=>$role]);
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
        //开启事务
        DB::beginTransaction();
        //把 uname 更新到 Adminusers中
        $adminuser = Adminusers::find($id);
        $adminuser->uname = $request->input('uname','');
        $res1 = $adminuser->save();
        //把 uid 对应的 rid 更新到 Adminusers_roles中
        $adminusers_role = Adminusers_roles::where('uid',$id)->first();
        $adminusers_role->rid = $request->input('rid','');
        $res2 = $adminusers_role->save();

        if($res1 && $res2){
            DB::commit();
            return redirect('admin/adminuser')->with('success','修改成功');
        }else{
            DB::rollBack();
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
        //
        DB::beginTransaction();
        $res1 = Adminusers::destroy($id);
        $res2 = Adminusers_roles::where('uid',$id)->delete();
       
        if($res1 && $res2){
            DB::commit();
            return redirect('admin/adminuser')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
