@section('title')
    Đăng ký
@endsection
@extends('welcome')
@section('content')


        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card card-signin flex-row my-5">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body">
                        @if(session('thongbao'))
                            <span class="alert alert-success">
                                    <strong>{{session('thongbao')}}</strong>
                                </span>

                        @endif
                        <h5 class="card-title text-center">Đăng tý tài khoản</h5>
                        <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
                         @csrf
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" placeholder="Nhập tên đăng nhập"/>
                                @if($errors->has('name'))
                                    {{$errors->first('name')}}
                                @endif
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" placeholder="Nhập email"/>
                                @if($errors->has('email'))
                                    {{$errors->first('email')}}
                                @endif

                            </div>


                            <hr>
                            <div class="form-group">
                                <input name="password" type="password" class="form-control" placeholder="Nhập password"/>
                                @if($errors->has('password'))
                                    {{$errors->first('password')}}
                                @endif
                            </div>
                            <div class="form-group">
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Nhập lại mật khẩu"/>
                            </div>
                            <div class="form-group">
                                <input name="diachi" type="text" class="form-control" placeholder="Nhập Địa chỉ"/>
                                @if($errors->has('diachi'))
                                    {{$errors->first('diachi')}}
                                @endif

                            </div>
                            <div class="form-group">
                                <input class="form-check-input" type="radio" name="gioitinh" value="Nam" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nam
                                </label>
                            </div>
                            <div class="form-group">
                                <input class="form-check-input" type="radio" name="gioitinh" value="Nữ" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Nữ
                                </label>
                            </div>
                            <div class="form-group">
                                <input name="sdt" type="text" class="form-control" placeholder="Nhập số điện thoại"/>
                                @if($errors->has('sdt'))
                                    {{$errors->first('sdt')}}
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <input name="ngaysinh" type="date" class="form-control" placeholder="Ngày sinh"/>
                                @if($errors->has('ngaysinh'))
                                    {{$errors->first('ngaysinh')}}
                                @endif
                            </div>
                            <div class="form-group">
                                <input name="Anhdaidien" type="file" class="form-control">
                                <label>Ảnh đại điện</label>
                                @if($errors->has('Anhdaidien'))
                                    {{$errors->first('Anhdaidien')}}
                                @endif
                            </div>
                            <div class="form-group">
                                <input name="Anhbia" type="file" class="form-control">
                                <label>Ảnh bìa</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                            <a class="d-block text-center mt-2 small" href="#">Sign In</a>
                            <hr class="my-4">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.date').datetimepicker({
            format: 'DD-MM-YYYY HH:mm:ss'
        });
    </script>
@endsection

