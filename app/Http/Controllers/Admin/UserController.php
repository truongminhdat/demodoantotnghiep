<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user = User::paginate(10)->fragment('user');
        return view('admin.users.taikhoannguoidung',[
            'title'=>'Quản Lí Tài Khoản'
        ],compact('user'));
    }
    public function duyettaikhoan(Request $request){
        $data = $request->all();
        $user = User::find($data['id']);
        $user->status = $data['status'];
        $user->save();
    }
    public function edit(User $user){
        return view('admin.users.edit',[
            'title'=>'Chỉnh sửa tài khoản'
        ],compact('user'));

    }
    public function update(Request $request,$id){
        $updateuser = User::find($id);
        $updateuser->name = $request->input('name');
        $updateuser->email = $request->input('email');
        $updateuser->password = $request->input('password');
        $updateuser->diachi = $request->input('diachi');
        $updateuser->sdt = $request->input('sdt');
        $updateuser->gioitinh = $request->input('gioitinh');
        $updateuser->ngaysinh = $request->input('ngaysinh');
        $updateuser->role_id = $request->input('role_id');
        if($request->hasFile('Anhdaidien')){
            $destination = public_path('/upload/user').$updateuser->Anhdaidien;
            if (\Illuminate\Support\Facades\File::exists($destination)){
                \Illuminate\Support\Facades\File::delete($destination);
            }
            $file = $request->file('Anhdaidien');
            $destination_path = public_path('/upload/user');
            $file_Name_anhdaidien = time().'_'.$file->getClientOriginalName();
            $file->move($destination_path,$file_Name_anhdaidien);
            $updateuser->Anhdaidien = $file_Name_anhdaidien;
        }
        if($request->hasFile('Anhbia')){
            $destination = public_path('/upload/user').$updateuser->Anhbia;
            if (\Illuminate\Support\Facades\File::exists($destination)){
                \Illuminate\Support\Facades\File::delete($destination);
            }
            $file = $request->file('Anhbia');
            $destination_path = public_path('/upload/user');
            $file_Name_anhbia = time().'_'.$file->getClientOriginalName();
            $file->move($destination_path,$file_Name_anhbia);
            $updateuser->Anhbia = $file_Name_anhbia;
        }
        $updateuser->update();
        return redirect()->back()->with('success','Bạn đã cập nhật thành công');
    }
    public function profile(){
         $user = Auth::user();
        return view('admin.users.profile',[
            'title'=>' Người dùng',
        ],compact('user'))
            ;
    }
    public function updateprofile(Request $request,$id){
        $updateuser = User::find($id);
        $updateuser->name = $request->input('name');
        $updateuser->email = $request->input('email');
        $updateuser->sdt = $request->input('sdt');
        $updateuser->ngaysinh = $request->input('ngaysinh');
        if($request->hasFile('Anhdaidien')){
            $destination = public_path('/upload/user').$updateuser->Anhdaidien;
            if (\Illuminate\Support\Facades\File::exists($destination)){
                \Illuminate\Support\Facades\File::delete($destination);
            }
            $file = $request->file('Anhdaidien');
            $destination_path = public_path('/upload/user');
            $file_Name_anhdaidien = time().'_'.$file->getClientOriginalName();
            $file->move($destination_path,$file_Name_anhdaidien);
            $updateuser->Anhdaidien = $file_Name_anhdaidien;
        }
        if($request->hasFile('Anhbia')){
            $destination = public_path('/upload/user').$updateuser->Anhbia;
            if (\Illuminate\Support\Facades\File::exists($destination)){
                \Illuminate\Support\Facades\File::delete($destination);
            }
            $file = $request->file('Anhbia');
            $destination_path = public_path('/upload/user');
            $file_Name_anhbia = time().'_'.$file->getClientOriginalName();
            $file->move($destination_path,$file_Name_anhbia);
            $updateuser->Anhbia = $file_Name_anhbia;
        }
        $updateuser->update();
        return redirect()->back()->with('success','Bạn đã cập nhật thành công');
    }
    public function getupdatepassword(){
        return view('admin.users.doipassword',[
            'title'=>'Thay đổi password',
        ]);
    }

    public function updatepassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Mật khẩu hiện tại của bạn không đúng");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","Mật khẩu mới trùng với mật khẩu cũ của bạn");
        }

        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password =($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Thay đổi password thành công!!");
    }
}

