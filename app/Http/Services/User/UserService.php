<?php
namespace App\Http\Services\User;
use App\Models\User;
use Faker\Core\File;
use http\Env\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class UserService
{
    public function update($request, $user)
    {

        try {
            $user->name = (string)$request->input('name');
            $user->email = (string)$request->input('email');
            $user->diachi = (string)$request->input('diachi');
            $user->sdt = (string)$request->input('sdt');
            $user->ngaysinh = (string)$request->input('ngaysinh');
            $user->gioitinh = (string)$request->input('gioitinh');
            $user->save();
            Session::flash('success', 'Đã cập nhật thành công');

        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật không thành công vui lòng kiểm tra lại');
            return false;

        }
        return true;
    }
}


