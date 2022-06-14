@extends('admin.main')
@section( 'content')
    <div class="container">

        <div class="card-body">
            <form action="{{route('admin.slide.store')}}" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        Kiểm tra lại dữ liệu
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input class="form-control" type="file" name="Hinh" >
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <input class="form-control" type="text" name="Noidung" placeholder="Nhập nội dung">
                            @error('Noidung')
                          Vui lòng nhập nội dung
                            @enderror

                        </div>
                    </div>

                </div>
                <div class="mt-2"><button type="submit" class="btn btn-primary">Lưu</button></div>
            </form>
        </div>

@endsection
