@extends('admin.main')
@section( 'content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        @if (Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif


        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <img src="/upload/user/{{$user->Anhdaidien}}" style="width: 300px;height: 300px; border-radius: 50% ">
            </div>

                <div class="col-md-8">
                    <div class="container">
                        <form action="{{route('admin.profile.update',$user->id)}}" method="post">
                            @csrf
                        <div class="row">

                            <div class="col-md-6 mt-5">
                                <div class="form-group">
                                    <label>Tên Tài Khoản</label>
                                    <input type="text" name="name" class="form-group" value="{{$user->name}}" >
                                </div>
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <input type="text" name="ngaysinh" class="form-group" value="{{$user->ngaysinh}}" >
                                </div>
                            </div>
                            <div class="col-md-6 mt-5">
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" name="sdt" class="form-group" value="{{$user->sdt}}" >
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-group" value="{{$user->email}}" >
                                </div>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <input type="file" name="Anhdaidien">--}}
{{--                            </div>--}}
                        </div>
                            <button class="btn-primary" type="submit">Save</button>
                        </form>
                        <a href="{{url('http://localhost:8000/admin/getupdatepassword')}}">Đổi mật khẩu </a>

                    </div>
                </div>



        </div>

    </div>
@endsection

