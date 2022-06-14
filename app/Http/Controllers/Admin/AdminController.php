<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function LoginPost(Request $request)
    {
        {
            if(Auth::attempt($request->only('email','password'))){
                if (Auth::user()->role_id == 1){
                    return redirect()->route('admin.main');
                }
                else{
                    return redirect()->route('dangnhap');
                }
            }
            else
            {
                    return redirect()->route('admin.login');
                }
            }
    }
    public function index(){

           return view('admin.users.login',[
               'title'=>'Trang Đăng Nhập',
           ]);

    }
    public function logout(){
        Auth::logout();
        return view('admin.users.login',[
            'title'=>'Trang Đăng Nhập',
        ]);
    }
    public function error()
    {
        $code = request()->code;
        return view('admin.error.index',[
            'title'=>'Không có quyền'
        ],compact('code'));
    }



}
