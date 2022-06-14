<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Phuong;
use App\Models\Quan;
use Illuminate\Http\Request;

class PhuongController extends Controller
{
    public function __construct(){
        $phuong = Phuong::all();
        $quan = Quan::all();
        view()->share('phuong',$phuong);
        view()->share('quan',$quan);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phuong= Phuong::paginate(10);
        return view('admin.phuong.index',[
            'title'=>'Quản lí Phường'
        ],compact('phuong'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.phuong.create', [
            'title' => 'Thêm Phường',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'TenPhuong'=>'required|min:3'
        ],[
            'TenPhuong.required'=>'Bạn chưa nhập giá trị'
        ]);
        try {
            $phuong = new Phuong();
            $phuong->TenPhuong = $request->TenPhuong;
            $phuong->quan_id = $request->quan_id;
            $phuong->save();
            return redirect()->route('admin.phuong')->with('thongbao','Thêm thành công');
        }catch (\Exception $exception){
            return redirect()->route('admin.phuong')->with('baoloi','Thêm không thành công');
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
    }
}
