<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Friends;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $friends = Friends::get();
        return view('admin.friends.index',['friends'=>$friends]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.friends.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        // 接收数据
        $friends = new Friends;
        $friends->friend_name = $data['friend_name'];
        $friends->url = $data['url'];
        $res = $friends->save();


        if($res){
            return redirect('admin/friends')->with('success','添加成功');
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
        //
        $friends = Friends::find($id);
        return view('admin.friends.edit',['friends'=>$friends]);
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
        //
        $data = $request->all();

        // 接收数据
        $friends = Friends::find($id);
        $friends->friend_name = $data['friend_name'];
        $friends->url = $data['url'];
        $res = $friends->save();


        if($res){
            return redirect('admin/friends')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
        }
    }

    /**
     * 快速开启
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        //
        $friends = Friends::find($id);
        $status = abs($friends->status-1);
        $friends->status = "$status";
        $res = $friends->save();

        if($res){
            return back()->with('success','操作成功');
        }else{
            return back()->with('error','操作失败');
        }
    }
}
