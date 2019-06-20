<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Actives;


class ActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //活动首页显示
        $actives = Actives::get();
        return view('admin.actives.index',['actives'=>$actives]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //显示一个添加页面
        return view('admin.actives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //验证数据执行添加
        //验证数据并添加到数据库
      
       $this->validate($request, [
            'active_name' => 'required',
            'discount' => 'required:',                
            'active_thumb' => 'required',
            'background' => 'required',
        ],[
            'active_name.required'=>'活动名称必填',           
            'discount.required'=>'折扣必填',                      
            'active_thumb.required'=>'展示图必填',
            'background.required' =>'背景图必填' ,
        ]);
       
            // 接受展示图
            $active_thumb = $request->file('active_thumb')->store(date('Ymd'));
            //接收背景图
            $background = $request->file('background')->store(date('Ymd'));

            //接收数据
            $data = $request->all();
            $actives = new Actives;
            $actives->active_name = $data['active_name'];
            $actives->discount = $data['discount'];
            $actives->active_thumb =  $active_thumb;
            $actives->background = $background; 

            $res = $actives->save();
            if($res){
          
                return redirect('admin/actives')->with('success','添加成功');
            }else{
            
                return back()->with('error','添加失败');
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
        //展示修改页面
         $actives = Actives::find($id);
        return view('admin.actives.edit',['actives'=>$actives]);
        
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
        //判断是否有先的图片上传
        if($request->hasFile('active_thumb')){
            $active_thumb = $request->file('active_thumb')->store(date('Ymd'));
        }else{
            $active_thumb = $request->input('old_thumb');
        }
         if($request->hasFile('background')){
            $background = $request->file('background')->store(date('Ymd'));
        }else{
            $background = $request->input('old_background');
        }
       
        
        $actives = Actives::find($id);
        //接受修改数据
        $actives->active_name = $request->input('active_name','');
        $actives->discount = $request->input('discount','');
        $actives->active_thumb =  $active_thumb;
        $actives->background = $background;

        //执行修改添加到数据库       
        $res = $actives->save();

        if($res){
            
            return redirect('admin/actives')->with('success','修改成功');
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
        //找是否活动在轮播图展示
        $banners = Actives::find($id)->actives;
        
        if($banners){
            return back()->with('error','此活动已参加展示,请勿删除');
        }
        //找到要删除的活动信息
        $res = Actives::destroy($id);

        if($res){
            
            return redirect('admin/actives')->with('success','删除成功');
        }else{
            
            return back()->with('error','删除失败');
        }

    }
}
