<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestPassword;
use App\Models\Dangtin;
use App\Models\Loaiphong;
use App\Models\PasswordReset;
use App\Models\Phuong;
use App\Models\Quan;
use App\Models\Roles;
use App\Models\slide;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Services\User\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    protected $userService;

    function __construct(UserService $userService)
    {
        $this->userService = $userService;
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

    public function trangchu(Request $request)
    {
        $params = $request->all();
        $loaiPhong = !empty($params['loaiTin']) ? $params['loaiTin'] : 0;
        $quan = !empty($params['quan']) ? $params['quan'] : 0;
        $dienTich = !empty($params['dienTich']) ? $params['dienTich'] : 0;
        $giaPhong = !empty($params['giaPhong']) ? $params['giaPhong'] : 0;

        $arr = [
            1 => [0, 500],
            2 => [500, 1000000],
            3 => [1000000, 1500000],
            4 => [1500000, 2000000],
            5 => [2000000, 3000000],
            6 => [3000000, 4000000],
            7 => [4000000, 5000000],
            8 => [5000000, 9000000000],
        ];

        $dangtin = Dangtin::where('status', '1')
            ->when($loaiPhong > 0, function ($query) use ($loaiPhong) {
                $query->whereHas('loaiphong', function ($query) use ($loaiPhong) {
                    $query->where('id', $loaiPhong);
                });
            })
            ->when($quan > 0, function ($query) use ($quan) {
                $query->whereHas('quan', function ($query) use ($quan) {
                    $query->where('id', $quan);
                });
            })
            ->when($dienTich > 20, function ($query) use ($dienTich) {
                $query->where('Dientich', '<', $dienTich + 1)
                    ->where('Dientich', '>', $dienTich - 11);
            })
            ->when($dienTich == 20, function ($query) use ($dienTich) {
                $query->where('Dientich', '<', $dienTich + 1);
            })
            ->when($giaPhong > 0, function ($query) use ($giaPhong, $arr) {
                $query->whereBetween('Giaphong', $arr[$giaPhong]);
            })
            ->where('soluongphong', '>', 0)->orderBy('created_at','DESC')->paginate(6);
        return view('pages.home', compact('dangtin', 'loaiPhong', 'quan', 'dienTich', 'giaPhong'));
    }

    public function showRegister()
    {
        return view('pages.dangki');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:6|max:30|',
                'email' => 'required|email',
                'Anhdaidien' => 'required|image|mimes:jpg,jpeg,png,gif|max:100000',
                'Anhbia' => 'required|image|mimes:jpg,jpeg,png,gif|max:100000',
                'sdt' => 'required',

                'password' => 'required|confirmed|min:6|max:20',
            ], [
                'password.confirmed' => 'Mật khẩu không trùng khớp'
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            if ($request->hasFile('Anhdaidien')) {
                $file = $request->file('Anhdaidien');
                $destination_path = public_path('upload/user');
                $file_Name = time() . '_' . $file->getClientOriginalName();
                $file->move($destination_path, $file_Name);
            } else {
                $file_Name = 'noname.jpg';

            }
            if ($request->hasFile('Anhbia')) {
                $file = $request->file('Anhbia');
                $destination_path = public_path('upload/user');
                $file_Name_anhbia = time() . '_' . $file->getClientOriginalName();
                $file->move($destination_path, $file_Name_anhbia);
            } else {
                $file_Name = 'noname.jpg';

            }
            try {
                $user = DB::table('users')->where('email', $request->email)->first();
                if (!$user) {
                    $newUser = new User();
                    $newUser->name = $request->name;
                    $newUser->email = $request->email;
                    $newUser->password = $request->password;
                    $newUser->diachi = $request->diachi;
                    $newUser->sdt = $request->sdt;
                    $newUser->gioitinh = $request->gioitinh;
                    $newUser->ngaysinh = $request->ngaysinh;
                    $newUser->Anhdaidien = $file_Name;
                    $newUser->Anhbia = $file_Name_anhbia;
                    $newUser->level = $request->level;
                    $newUser->role_id = 2;
                    $newUser->save();
                    return redirect()->route('register')->with('thongbao', 'Tạo tài khoản thành công,mời bạn đăng nhập');

                } else {
                    return redirect()->route('login')->with('thongbao', 'Tài khoản đã tồn tại mời đăng nhập,mời bạn đăng nhập');
                }
            } catch (\Exception $exception) {
                return redirect()->route('register')->with('thongbao', 'Đăng kí tài khoản không thành công mời đăng kí lại');
            }


        }
    }

    public function getDangNhap()
    {
        return view('pages.dangnhap');
    }

    function postDangnhap(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:3|max:320'
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Bạn chưa nhập password',
            'password.min' => 'Password không được nhỏ hơn 3 ký tự',
            'password.max' => 'Password không được nhiều hơn 32 ký tự'


        ]);
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $dataUser = User::where('email', $request->email)->first();
        if (!$dataUser) {
            return redirect('dangnhap')->with('thongbao', 'Tài khoản không tồn tại');
        }
        if ($dataUser->status == 1) {
            return redirect('dangnhap')->with('thongbao', 'Tài khoản đã bị khóa');
        }
        if ($dataUser->role_id == 2) {
            $url = Session::get('url_previous');
            Session::forget('url_previous');

            if (!empty($url)) {
                $url = $url[0];

                if (strpos($url, 'trangchitiet') > 0) {
                    $id = substr($url, strlen($url) - 1);
                    return redirect('trangchitiet/' . $id);
                }
            }

            if (Auth::attempt($arr)) {
                return redirect('trangchu');
            } else {
                return redirect('dangnhap')->with('thongbao', 'Tài khoản đã bị khóa hoặc chưa đăng kí vui lòng kiểm tra lại');
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('trangchu');
    }

    public function getnguoidung()
    {
        $user = Auth::user();
        return view('pages.nguoidung', ['user' => $user]);
    }

    public function updatenguoidung(Request $request, $id)
    {
        $updateuser = User::find($id);
        $updateuser->name = $request->input('name');
        $updateuser->email = $request->input('email');
        $updateuser->password = $request->input('password');
        $updateuser->diachi = $request->input('diachi');
        $updateuser->sdt = $request->input('sdt');
        $updateuser->gioitinh = $request->input('gioitinh');
        $updateuser->ngaysinh = $request->input('ngaysinh');
        if ($request->hasFile('Anhdaidien')) {
            $destination = public_path('upload/user') . $updateuser->Anhdaidien;
            if (\Illuminate\Support\Facades\File::exists($destination)) {
                \Illuminate\Support\Facades\File::delete($destination);
            }
            $file = $request->file('Anhdaidien');
            $destination_path = public_path('upload/user');
            $file_Name_anhdaidien = time() . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $file_Name_anhdaidien);
            $updateuser->Anhdaidien = $file_Name_anhdaidien;
        }
        if ($request->hasFile('Anhbia')) {
            $destination = public_path('upload/user') . $updateuser->Anhbia;
            if (\Illuminate\Support\Facades\File::exists($destination)) {
                \Illuminate\Support\Facades\File::delete($destination);
            }
            $file = $request->file('Anhbia');
            $destination_path = public_path('upload/user');
            $file_Name_anhbia = time() . '_' . $file->getClientOriginalName();
            $file->move($destination_path, $file_Name_anhbia);
            $updateuser->Anhbia = $file_Name_anhbia;
        }
        $updateuser->update();
        return redirect()->back()->with('success', 'Bạn đã cập nhật thành công');

    }

    public function getupdatepassword()
    {
        return view('user.resetpassword');
    }

    public function updatepassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Mật khẩu hiện tại của bạn không đúng");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "Mật khẩu mới trùng với mật khẩu cũ của bạn");
        }

        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = ($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success", "Thay đổi password thành công!!");
    }
    public function showForgotPasswordForm()
    {
        return view('user.forgetpass');
    }

    public function submitForgotPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $to_email = $request->email;
        Mail::send('mail.mail', ['token' => $token], function ($message) use ($to_email) {
            $message->to($to_email)->subject('Mail từ hệ thống !');
            $message->from($to_email, "Veryfying Resset Mail");
        });

        return back()->with('message', 'Vui lòng kiểm tra mail của bạn');
    }

    public function showResetPasswordForm($token)
    {
        return view('user.getPass', ['token' => $token]);
    }


    public function submitResetPasswordForm(Request $request)
    {
        //   dd($request->all());
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
            ->where(
                'token', $request->token_reset
            )
            ->first();

        // dd($updatePassword);
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $updatePassword->email)
            ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        return redirect('dangnhap')->with('success', 'Mật khẩu của bạn đã được thay đổi');
    }
}
