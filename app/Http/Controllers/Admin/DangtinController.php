<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Dangtin;
use App\Models\Danhgia;
use App\Models\User;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class DangtinController extends Controller
{
    public function index()
    {
        $dangtin = Dangtin::orderBy('created_at','DESC')->paginate(3);
        return view('admin.dangtin.dangtin', [
            'title' => 'Quản lí Đăng tin'
        ], compact('dangtin'));
    }

    public function duyetbaidang(Request $request)
    {
        $data = $request->all();
        $dangtin = Dangtin::find($data['id']);
        $dangtin->status = $data['status'];
        $dangtin->save();
    }

    public function edit($id)
    {
        $dangtin = Dangtin::find($id);
        $comment = Comment::where('dangtin_id',$id)->count('id');
        $danhgia = Danhgia::count();
        $grate = Danhgia::where('dangtin_id',$id)->avg('grate');
        $grate = round($grate);
        return view('admin.dangtin.xemdangtin', [
                'title' => 'Xem bài đăng'
            ]
            , compact('dangtin', 'comment', 'danhgia','grate'));
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('admin.dangtin')->with('thongbao','Xóa thành công');

    }
//    public function search(Request $request){
//        $output = '';
//        $dangtin = Dangtin::where('Tieude','LIKE','%'.$request->keyword.'%')->get();
//        foreach ($dangtin as $dangtin){
//            $output = '<tr>
//                     <td>'.$dangtin->Tieude.'</td>
//                    <td>'.$dangtin->Diachi.'</td>
//                    <td>'.$dangtin->Giaphong.'</td>
//                    <td>'.$dangtin->user->name.'</td>
//                       </tr>';
//        }
//        return response()->json($output);
//
//    }
}

