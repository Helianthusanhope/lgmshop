<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    //个人中心首页
    public function index()
    {

 
        //获取用户的个人信息,收货地址
        $userinfo = AddressController::userinfo();
        $address  =  AddressController::address();
        return view('home.personal.index',['userinfo'=>$userinfo,'address'=>$address]);


    }
}
