<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Actives;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return 显示轮播图列表
     */
    public function index()
    {   
        //获取轮播图信息
        
        $banner_data = Banners::get();
      
        //显示轮播图列表
        return view('admin.banners.index',['banner_data'=>$banner_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //获取所有的活动
         $actives = Actives::get();       
        //显示轮播图页面
        return view('admin.banners.create',['actives'=>$actives]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return 执行轮播图的添加操作
     */
    public function store(Request $request)
    {
        //验证数据并添加到数据库
      
       $this->validate($request, [
            'title' => 'required',
            'desc' => 'required:',                
            'url' => 'required',
        ],[
            'title.required'=>'标题必填',           
            'desc.required'=>'描述必填',                      
            'url.required'=>'轮播图必填',
        ]);

       //检测是否有文件
       if($request->hasFile('url')){

            // 创建文件上传对象
            $url = $request->file('url')->store(date('Ymd'));

        }    
        //接收轮播图提交数据
        $data = $request->all();
       
        //将数据压入数据库并保存
        $banner = new Banners;
        $banner->title = $data['title'];
        $banner->desc  = $data['desc'];
        $banner->url   = $url;
        $banner->status = $data['status'];
        $banner->active_id = $data['active_id'];

        $res = $banner->save();
        if($res){
            
            return redirect('admin/banners')->with('success','修改成功');
        }else{          
            return back()->with('error','修改失败');
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
        //获取数据分配给页面
         $banners = Banners::find($id);

        //显示修改页面
        return view('admin.banners.edit',['banners'=>$banners]);
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
       //执行修改       
        // 获取轮播图
        if($request->hasFile('url')){
            $url = $request->file('url')->store(date('Ymd'));
        }else{
            $url = $request->input('old_url');
        }
        
        $banners = Banners::find($id);
        // dd($banners);
        $banners->title = $request->input('title','');
        $banners->desc = $request->input('desc','');
        $banners->url = $url; 
        $banners->status = $request->input('status','');
        $banners->active_id = $request->input('active_id','');
        $res = $banners->save();

        if($res){
            
            return redirect('admin/banners')->with('success','修改成功');
        }else{
           
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
        //执行修改
        $res = Banners::destroy($id);
       if($res){           
            return redirect('admin/banners')->with('success','删除成功');
        }else{           
            return back()->with('error','删除失败');
        }
    }
}
