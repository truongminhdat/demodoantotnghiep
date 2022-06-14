<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Dangtin;
use App\Models\Datphong;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongkeController extends Controller
{
    public function __construct()
    {
//        $dangtin = Dangtin::all();
//        view()->share('dangtin',$dangtin);
    }

    public function index(){
        $user_count = User::count();
        $product_count = Dangtin::count();
        $comment_count = Comment::count();
        $dangtin = Dangtin::where('status',1)->get();
        $user = User::all();
        if (request()->date_from && request()->date_to){
            $dangtin = Dangtin::where('status',1)->whereBetween('created_at',[request()->date_from,request()->date_to])->get();
        }
        return view('admin.thongke.thongke',[
            'title'=>'Thống kê danh sách trong admin',
        ],compact('user_count','product_count','dangtin','comment_count','user'));
    }
    public function thongkenguoidung(){
        $dangtin = Dangtin::where('status',1)->get();
        $user = User::all();
        if (request()->date_from && request()->date_to){
            $dangtin = Dangtin::where('status',1)->whereBetween('created_at',[request()->date_from,request()->date_to])->get();
        }
        return view('admin.thongke.thongkenguoidung',[
            'title'=>'Thống kê danh sách người dùng',
        ],compact('dangtin','user'));
    }
    public function thongkebieudo(){

        $user = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))->pluck('count');
        $months = User::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck("month");
        $data =  [0,0,0,0,0,0,0,0,0,0,0,0];
        foreach ($months as $index =>$month){
            --$month;
            $data[$month] = $user[$index];
        }
        $user_count = User::count();
        $product_count = Dangtin::count();
        $comment_count = Comment::count();
        $dangtin = Dangtin::where('status',1)->get();
        $user = User::all();
        $datphong = Datphong::count();
        if (request()->date_from && request()->date_to){
            $dangtin = Dangtin::where('status',1)->whereBetween('created_at',[request()->date_from,request()->date_to])->get();
        }
        return view('admin.thongke.thongkebieudo',[
            'title'=>'Thống kê danh sách trong admin'
        ],compact('data','user','user_count','dangtin','comment_count','product_count','datphong'));
    }
}
