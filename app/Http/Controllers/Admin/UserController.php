<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsers;
use App\Models\Users;
use App\Models\UserInfo;
use App\Models\UserAddr;
use Hash;
use DB;
use Illuminate\Support\Facades\Storage;
class UserController extends Controller
{
    //填写测试数据
     public function data()
    {
        for ($i=0; $i < 30; $i++) { 
            # code...
    
            $data = [
                'uname'=>'zhangsan'.rand(1234,4321),
                'upass'=>Hash::make('123123'),
                'email'=>'zhangsan'.rand(1234,4321).'@qq.com',
                'phone'=>'1'.rand(1234,4321).rand(123456,654321)
            ];
            $file_path = '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg';

            $user = new Users;
            $user->uname = $data['uname'];
            $user->upass = Hash::make($data['upass']);
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $res1 = $user->save();
            $uid = $user->uid;

            $userinfo = new UserInfo;
            $userinfo->uid = $uid;
            $userinfo->profile = $file_path;
            $res2 = $userinfo->save();

            $useraddr = new UserAddr;
            $useraddr->uid = $uid;
            $useraddr->address = 'aaaaa';
            $res3 = $useraddr->save();
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        //显示用户列表
        $users = Users::all();
        
        // 加载页面
        return view('admin.users.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 显示用户添加
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsers $request)
    {
        // 验证数据
       /* $this->validate($request, [
            'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{5,17}$/',
            'upass' => 'required|regex:/^[\w]{6,18}$/',
            'repass' => 'required|same:upass',
            'email' => 'required|email',
            'phone' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
            'profile' => 'required',
        ],[
            'uname.required'=>'用户名必填',
            'uname.regex'=>'用户名格式错误',
            'upass.required'=>'密码必填',
            'upass.regex'=>'密码格式错误',
            'repass.required'=>'确认密码必填',
            'repass.same'=>'俩次密码不一致',
            'email.required'=>'邮箱必填',
            'email.email'=>'邮箱格式错误',
            'phone.required'=>'手机号必填',
            'phone.regex'=>'手机号格式不正确',
            'profile.required'=>'头像必填',
        ]);*/

        // 验证数据
        $this->validate($request, [
            'upass' => 'required|regex:/^[\w]{6,18}$/',
            'repass' => 'required|same:upass',
        ],[
            'upass.required'=>'密码必填',
            'upass.regex'=>'密码格式错误',
            'repass.required'=>'确认密码必填',
            'repass.same'=>'俩次密码不一致',
        ]);

        DB::beginTransaction();
            
        // 上传头像
        if($request->hasFile('profile')){

            // 创建文件上传对象
            $file_path = $request->file('profile')->store(date('Ymd'));
        }else{
            $file_path = '';
        }
        
        $data = $request->all();
        // dump($data);

        // 接收数据
        $user = new Users;
        $user->uname = $data['uname'];
        $user->upass = Hash::make($data['upass']);
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $res1 = $user->save();
        if($res1){
            // 获取uid
            $uid = $user->uid;
        }

        // DB::table()->insertGetId(); //返回最后插入id号

        // 压入头像
        $userinfo = new Userinfo;
        $userinfo->uid = $uid;
        $userinfo->profile = $file_path;
        $res2 = $userinfo->save();

        if($res1 && $res2){
            DB::commit();
            return redirect('admin/users')->with('success','添加成功');
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
         $user = Users::find($id);


        // 加载修改页面
        return view('admin.users.edit',['user'=>$user]);
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
        // 获取头像
        if($request->hasFile('profile')){
            // 删旧文件
            Storage::delete($request->input('old_profile',''));
            $file_path = $request->file('profile')->store(date('Ymd'));
        }else{
            $file_path = $request->input('old_profile');
        }
        
        $user = Users::find($id);
        $user->email = $request->input('email','');
        $user->phone = $request->input('phone','');
        $res1 = $user->save();
        $userinfo = UserInfo::where('uid',$id)->first();
        $userinfo->profile = $file_path;
        $res2 = $userinfo->save();

        if($res1 && $res2){
            DB::commit();
            return redirect('admin/users')->with('success','修改成功');
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
        $profile = UserInfo::find($id)->profile;
        Storage::delete($profile);
        $res1 = Users::destroy($id);
        $res2 = UserInfo::where('uid',$id)->delete();

        // 删除用户头像
        /*
            use Illuminate\Support\Facades\Storage;
            Storage::delete('file.jpg');
            Storage::delete(['file1.jpg', 'file2.jpg']);
         */
        if($res1 && $res2){
            DB::commit();
            return redirect('admin/users')->with('success','删除成功');
        }else{
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
}
