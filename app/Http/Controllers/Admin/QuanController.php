<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quan;
use Illuminate\Http\Request;
use Illuminate\Queue\NullQueue;
use App\Http\Services\Quan\QuanService;

class QuanController extends Controller
{    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $quanService;
    public function __construct(QuanService $quanService)
    {
        $this->quanService = $quanService;
    }

    public function index()
    {
        $quan= Quan::paginate(10);
        return view('admin.quan.index',[
            'title'=>'Quản lí Quận'
        ],compact('quan'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quan.create', [
            'title' => 'Thêm quận',
            'quans'=> $this->quanService

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
           'Tenquan'=>'required|min:6'
      ]);
        $this->quanService->create($request);
        return redirect()->route('admin.quan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Quan $quan)
    {
        return view('admin.quan.edit',[
            'title'=>'Chỉnh sửa danh mục:'. $quan->Tenquan,
            'quan'=>$quan,
        ]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Quan $quan)
    {
//        Quan::updated($request->input());
//        return redirect()->route('admin.quan')->with('thongbao','Cập nhật thanh cong');
        $this->quanService->update($request,$quan);
        return redirect()->route('admin.quan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quan = Quan::find($id);
        $quan->delete();
      return redirect()->route('admin.quan');

    }
}
