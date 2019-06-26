<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\ UserAddr;
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

    //收货地址页面显示
    public function index()
    {
    	
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
    public function update(Request $request)
    {
        
        //获取需要设置的aid 
        $aid = $request->aid;    
        //查询现有的收货地址
        $addr_all = self::address();

        $status = [];
        foreach($addr_all as $k=>$v){          
            //如果有默认地址,就将默认地址清空
            if($v->aid == $aid && $v->status == '1'){
               
                $addr = UserAddr::find( $v->aid );
                $addr->status ='0';
                $res = $addr->save();

                if($res){

                return back()->with('success','设置成功'); 
                }
                
                
            }
             //接受要修改的地址,设置为默认地址              
            if($v->aid == $aid && $v->status =='0' ){

                $addr = UserAddr::find( $aid );
                $addr->status = '1' ;
                $res = $addr->save();

                if($res){
                return back()->with('success','设置成功'); 
            }
      
        }


                    
        }
        
   
       

    }

    //执行地址的删除      
    public function edit(Request $request)
    {
        $aid = $request->aid;
        $addr = UserAddr::find($aid);
        $res  = $addr->delete();

        if($res){

            return back()->with('success','删除成功'); 
        }

           
    }
}
