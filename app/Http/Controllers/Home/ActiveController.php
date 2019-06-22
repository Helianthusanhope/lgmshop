<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Actives;

class ActiveController extends Controller
{
	//获取所有活动信息
	public static function getActivesAll()
	{
		$actives_data = Actives::all();

		return $actives_data;
	}
	
    //显示一个活动页面
    public function index($id)
    {
    	return view('home.active.index');
    }
}
