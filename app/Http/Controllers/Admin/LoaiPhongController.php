<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Loaiphong;
use Illuminate\Http\Request;

class LoaiPhongController extends Controller
{
    public function index(){
        $loaiphong = Loaiphong::paginate(10);
        return view('admin.loaiphong.index',[
            'title'=>'Quản Lí Loại Phòng'
        ],compact('loaiphong'));
    }
    public function create(){
        return view('admin.loaiphong.create', [
            'title' => 'Thêm Loại Phòng',
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'Tenloaiphong'=>'required|min:6'
        ],[
            'Tenloaiphong.required'
        ]);
         $newloaiphong = new Loaiphong();
         $newloaiphong->Tenloaiphong = $request->Tenloaiphong;
         $newloaiphong->save();
        return redirect()->route('admin.loaiphong')->with('success','Thêm loại phòng thành công');

    }
    public function destroy($id)
    {
        $loaiphong = Loaiphong::find($id);
        $loaiphong->delete();
        return redirect()->route('admin.loaiphong');

    }
}
