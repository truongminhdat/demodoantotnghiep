@extends('welcome')
@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors)
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <div class="col-md-4">
                <form action="{{route('updateresetpassword')}}" method="post" role="form">
                    @csrf
                    <input type="hidden" name="token_reset" value="{{ $token }}">
                    <legend>Đặt lại mật khẩu</legend>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập password">
                    </div>
                    <div class="form-group">
                        <label for="">Nhập lại password</label>
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Nhập lại password">
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
