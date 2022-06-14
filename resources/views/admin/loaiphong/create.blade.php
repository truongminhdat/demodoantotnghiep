@extends('admin.main')
@section( 'content')

    <div class="container">

        <div class="card-body">
            <form action="{{route('admin.loaiphong.store')}}" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        Kiểm tra lại dữ liệu
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Tên Loại Phòng</strong>
                            <input class="form-control" type="text" name="Tenloaiphong" placeholder="Nhập Tên Loại Phòng">
                            @error('Tenloaiphong')
                             Vui lòng nhập tên loại phòng
                            @enderror

                        </div>
                    </div>

                </div>
                <div class="mt-2"><button type="submit" class="btn btn-primary">Lưu</button></div>
            </form>
        </div>

    </div>


@endsection
