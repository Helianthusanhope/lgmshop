<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Work;
class WorkController extends Controller
{
	//查上一条新闻
	 private function prev($id)
    {
        $data = Work::where('wid','<',$id)->orderBy('wid','desc')->first();

        if ($data) {
            return $data;
        }else{
            return false;
        }
    }
    //查下一条新闻
    private function next($id)
    {
        $data = Work::where('wid','>',$id)->orderBy('wid','asc')->first();

        if ($data) {
            return $data;
        }else{
            return false;
        }
    }
    //获取所有新闻信息
	public static function getWorksAll()
	{
		//显示最新的8条新闻
		$works_data = Work::orderBy('created_at','desc')->take(8)->get();

		return $works_data;
	}
	
    //显示一个新闻详情页面
    public function index($id)
    {
    	$work_data = Work::find($id);
    	$prev_work = self::prev($id);
    	$next_work = self::next($id);
        $works_data = WorkController::getWorksAll();
    	return view('home.work.index',['works_data'=>$works_data,'work_data'=>$work_data,'next_work'=>$next_work,'prev_work'=>$prev_work]);
    }
}
