<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformationController extends Controller
{
    //个人信息页面
    public function index()
    {

    	return view('home.information.index');
    }
    
}
