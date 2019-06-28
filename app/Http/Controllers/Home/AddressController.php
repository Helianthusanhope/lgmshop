<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\UserAddr;
use DB;

class AddressController extends Controller
{
    //封装查询地址的方法   
    public static function address()
    {
        //获取数据并分配
        $uid = session('home_user')->uid;
        $user = Users::find($uid);
        // 找到用户的的收货地址
        return $addr = $user->useraddr;


    }

    //封装查询获取个人信息的方法
    
    public static function userinfo()
    {
        $uid = session('home_user')->uid;
        $userinfo = DB::table('user_infos')->where('uid',$uid)->first();
        return $userinfo;
    }

    //收货地址页面显示
    public function index()
    {
    	//获取所有的地址
        $addr = self::address();
    	return view('home.address.index',['addr'=>$addr]);
    }

    //执行添加
    public function store(Request $request)
    {
        $this->validate($request, [
            'addrname' => 'required',
            'phone' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',           
            'address' => 'required',
        ],[
            'addrname.required'=>'收货人必填',
            'phone.required'=>'收货人电话',
            'phone.regex'=>'请填写正确的手机号',
            'address.required'=>'地址必填',            
            
        ]);

        //接收数据
        $addr = $request->all();

        $province = $addr['province'];
        $country = $addr['country'];
        $town = $addr['town'];
        $addr['area'] = $province.' '. $country.' '.$town;
        $phone = $addr['phone'];
        var_dump($phone);      
        $uid = session('home_user')->uid;
        
        //执行添加
        $useraddr = new  UserAddr;

        $useraddr->uid = $uid;
        $useraddr->address = $addr['address'];
        $useraddr->addrname = $addr['addrname'];
        $useraddr->phone = $phone;
        $useraddr->area = $addr['area'];
        $useraddr->status = '0';




        $res = $useraddr->save();
        
        if($res){
             return back()->with('success','添加成功');
        }    
        
    }

    //执行修改为默认地址   
    public function update(Request $request, $id)
    {
        //找到需要修改的地址 
        
        $useraddr = UserAddr::find($id);
        //查询是否已经存在默认地址
        $addrup = UserAddr::where('status','1')->where('uid',$useraddr->uid)->first();
        //如果已经存在默认地址那就清空
        if ($addrup) {
            $addrup->status = '0';
            $res1 = $addrup->save();
        } else {
            $res1 = true;
        }
        //如果没有默认地址就设置
        $useraddr->status = '1';
        $res2 = $useraddr->save();
        if($res1 && $res2) {
            return back()->with('success','设置成功');
        }
 
       

    }

    //执行地址的删除      
    public function edit(Request $request)
    {
        $aid = $request->aid;
        $addr = UserAddr::find($aid);

        // $res  = $addr->delete();

        if ($addr->status == '1') {

            return back()->with('error','请勿删除默认地址'); ;
        }else{

            $res  = $addr->delete();
            return back()->with('success','删除成功'); ;
        }

           
    }
}
