<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodlistController extends Controller
{
    //显示商品列表页
    public function index()
    {
    	// echo "商品列表";
    	return view('home.goodlist.index');
    }
}
