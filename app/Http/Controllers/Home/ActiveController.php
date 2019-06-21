<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiveController extends Controller
{
    //显示一个活动页面
    public function index()
    {
    	return view('home.active.index');
    }
}
