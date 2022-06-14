@section('title')
    Đăng Nhập
@endsection
@extends('welcome')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->

            <!-- The content half -->
            <div class="col-md-12 bg-light">
                <div class="login d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                @if(session('thongbao'))
                                    <span class="alert alert-success">
                                    <strong>{{session('thongbao')}}</strong>
                                </span>

                                @endif
                                <h5 class="card-title text-center">Đăng Nhập</h5>
                                <form action="{{route('login')}}" method="post" >
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input id="inputEmail" type="email" placeholder="Email address" name="email" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="inputPassword" type="password" placeholder="Password" name="password" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                        <label for="customCheck1" class="custom-control-label">Remember password</label>
                                    </div>
                                    <div class="form-group">
                                        <p>Bạn quên mật khẩu ?, <a href='#'>Click lấy lại mật khẩu</a></p>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>
    </div>
@endsection
