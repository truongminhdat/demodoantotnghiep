<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Dangtin;
use App\Models\Danhgia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function comment($id,Request $request){
        $this->validate($request,[
           'noidung'=>'required'
        ],[
            'noidung.required'=>'Bạn chưa bình luận'


        ]);
        $iddangtin = $id;
        $comment = new Comment();
        $comment->dangtin_id = $iddangtin;
        $comment->user_id = Auth::user()->id;
        $comment->noidung = $request->noidung;
        $comment->save();
        return redirect("trangchitiet/$id/")->with('thongbao','Viết bình luận thành công');


    }

}
