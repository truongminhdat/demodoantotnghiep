@section('title')
    Đăng Nhập
@endsection
@extends('welcome')
@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-4">
                <form action="{{route('forgetPass')}}" method="post" role="form">
                    @csrf
                    <legend>Lấy lại mật khẩu</legend>
                    <p style="color: #0c84ff; font-weight: bold">Vui lòng nhập email mà bạn đã đăng ký tài khoản</p>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Nhập email" >
                        @error('email') <small class="help-block">{{$message}}</small> @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi email xác nhận</button>
                </form>
            </div>
        </div>
    </div>
@endsection
