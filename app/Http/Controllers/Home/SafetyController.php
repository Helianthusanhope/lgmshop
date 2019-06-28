<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SafetyController extends Controller
{
    //显示安全设置中心
    
    public function index()
    {
    	return view('home/safety/index');
    }
    
}
