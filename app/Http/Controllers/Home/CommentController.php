<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\GoodStock;
use App\Models\GoodComment;
class CommentController extends Controller
{
    //
    public function index()
    {
        $uid = session('home_user')->uid;
        $comment = GoodComment::where('uid',$uid)->get();
        return view('home.comment.index',['comment'=>$comment]);
    }
}
