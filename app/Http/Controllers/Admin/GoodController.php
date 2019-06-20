<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\GoodStock;
use DB;
use App\Http\Controllers\Admin\CateController;
use Illuminate\Support\Facades\Storage;
class GoodController extends Controller
{
    //填写测试数据
     public function data()
    {
        for ($i=0; $i < 30; $i++) { 
            # code...
    
            $data = [
                'gname'=>'蔬菜'.rand(1234,4321),
                'cid'=>4,
                'desc'=>rand(123456,4564511).'因此,用户可能一不小心就关错了标签页,或者直接点击浏览器右上角的关闭按钮一...这当然不是我们所希望看到的,我们希望的可能是,在提交该页面上表单的...',
                'price'=>rand(1,999).'.'.rand(0,99),
                'detail'=>rand(123456,4564511).'是直接都按js走了。不回等你按确定还是取消按钮呢。。 js方法是 function ...点击确定按钮时,弹出确定和取消,点击取消也提交表单了'
            ];
            $file_path = '/20190613/0JQDVwewH1WXVbw6xxA4VPxPC6ehOpbuJnyyPR0j.jpeg';

            $good = new Goods;
            $good->thumb = $file_path;
            $good->gname = $data['gname'];
            $good->cid = $data['cid'];
            $good->desc = $data['desc'];
            $good->price = $data['price'];
            $good->detail = $data['detail'];
            $res = $good->save();
            $gid = $good->gid;
            for ($y=0; $y <3 ; $y++) { 
                $goodstock = new GoodStock;
                $goodstock->gid = $gid;
                $goodstock->color = 'red';
                $goodstock->size = 'xxl';
                $goodstock->stock = rand(100,999);
                $res2 = $goodstock->save();
            }
            
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $this::data();
        $goods = Goods::get();
        return view('admin.goods.index',['goods'=>$goods,'cates'=>CateController::getCateDate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.goods.create',['cates'=>CateController::getCateDate()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        DB::beginTransaction();
            
        // 上传缩略图
        if($request->hasFile('thumb')){

            // 创建文件上传对象
            $file_path = $request->file('thumb')->store(date('Ymd'));
        }else{
            $file_path = '';
        }
        
        $data = $request->all();
        // dump($data);

        // 接收数据
        $good = new Goods;
        $good->thumb = $file_path;
        $good->gname = $data['gname'];
        $good->cid = $data['cid'];
        $good->desc = $data['desc'];
        $good->price = $data['price'];
        $good->detail = $data['detail'];
        $res = $good->save();


        if($res){
            DB::commit();
            return redirect('admin/goods')->with('success','添加成功');
        }else{
            DB::rollBack();
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
        $goods = GoodStock::where('gid',$id)->get();
        $detail = Goods::find($id);
        return view('admin.goods.show',['goods'=>$goods,'detail'=>$detail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $good = Goods::find($id);

        // 加载修改页面
        return view('admin.goods.edit',['good'=>$good,'cates'=>CateController::getCateDate()]);
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
        DB::beginTransaction();
            
        // 上传缩略图
        if($request->hasFile('thumb')){
            Storage::delete($request->input('old_thumb',''));
            // 创建文件上传对象
            $file_path = $request->file('thumb')->store(date('Ymd'));
        }else{
            $file_path = $request->input('old_thumb');;
        }
        
        $data = $request->all();
        // dump($data);

        // 接收数据
        $good = Goods::find($id);
        $good->thumb = $file_path;
        $good->gname = $data['gname'];
        $good->cid = $data['cid'];
        $good->desc = $data['desc'];
        $good->price = $data['price'];
        $good->detail = $data['detail'];
        $res = $good->save();


        if($res){
            DB::commit();
            return redirect('admin/goods')->with('success','修改成功');
        }else{
            DB::rollBack();
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
        //
        DB::beginTransaction();
        if (GoodStock::where('gid', $id)->first()) {
            $res1 = Goods::destroy($id);
            $res2 = GoodStock::where('gid',$id)->delete();
            if ($res1 && $res2) {
                $res = 1;
            } else {
                $res = 0;
            }
        } else {
            $res = Goods::destroy($id);
        }
        // 删除用户头像
        /*
            use Illuminate\Support\Facades\Storage;
            Storage::delete('file.jpg');
            Storage::delete(['file1.jpg', 'file2.jpg']);
         */
        if ($res) {
            DB::commit();
            return redirect('admin/goods')->with('success','删除成功');
        } else {
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
    // 库存删除
    public function delete($id)
    {
        //
        DB::beginTransaction();
        $res = GoodStock::destroy($id);

        // 删除用户头像
        /*
            use Illuminate\Support\Facades\Storage;
            Storage::delete('file.jpg');
            Storage::delete(['file1.jpg', 'file2.jpg']);
         */
        if ($res) {
            DB::commit();
            return back()->with('success','删除成功');
        } else {
            DB::rollBack();
            return back()->with('error','删除失败');
        }
    }
    // 库存添加
    public function stockstore(Request $request)
    {
        //
        DB::beginTransaction();
            
        $data['gid'] = $request->input('gid');
        $data['color'] = $request->input('color','');
        $data['size'] = $request->input('size','');
        $data['stock'] = $request->input('stock');
        $data['created_at'] = date('Y-m-d H:i:s',time());
        $data['updated_at'] = date('Y-m-d H:i:s',time());
        // 接收数据
        $res = DB::table('good_stocks')->insert($data);

        if($res){
            DB::commit();
            return back()->with('success','添加成功');
        }else{
            DB::rollBack();
            return back()->with('error','添加失败');
        }
    }
    // 快速上架
    public function status($id)
    {
        //
        
        DB::beginTransaction();
            
        $good = Goods::find($id);
        if ($good) {
            # code...
        }
        $status = abs($good->good_status-1);
        $good->good_status = "$status";
        $res = $good->save();

        if($res){
            DB::commit();
            return back()->with('success','操作成功');
        }else{
            DB::rollBack();
            return back()->with('error','操作失败');
        }
    }
}
