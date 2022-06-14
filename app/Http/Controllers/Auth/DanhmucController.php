<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Services\User\UserService;
use App\Models\Dangtin;
use App\Models\Loaiphong;
use App\Models\Phuong;
use App\Models\Quan;
use App\Models\slide;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class DanhmucController extends Controller
{
    function __construct()
    {
        $data = [
            'slide' => slide::all(),
            'dangtin' => Dangtin::all(),
            'phuong' => Phuong::all(),
            'quan' => Quan::all(),

        ];
        view()->share('data', $data);
        view()->share('slide', $data);
        view()->share('phuong', $data);
        view()->share('quan', $data);
        $dangtin = Dangtin::with('loaiphong')->get();
        $phuong = Dangtin::with('phuong')->get();
        $user = Dangtin::with('user')->get();
        $quan = Phuong::with('quan')->get();
        $loaiphong = Loaiphong::all();
        $loaiquan = Quan::all();
        $phuong = Phuong::all();
        view()->share('loaiquan', $loaiquan);
        view()->share('quan', $quan);
        view()->share('phuong', $phuong);
        view()->share('dangtin', $dangtin);
        view()->share('user', $user);
        view()->share('loaiphong', $loaiphong);
    }
    public function index($id){

            $dangtin =  Dangtin::where('loaiphong_id',$id)->get();
            return view('danhmuc.index',compact('dangtin',));
    }
    public function quan($id){
        $dangtin = Dangtin::where('quan_id',$id)->get();
        return view('danhmuc.quan',compact('dangtin'));
    }
}
