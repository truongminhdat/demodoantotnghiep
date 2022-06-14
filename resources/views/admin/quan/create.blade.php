@extends('admin.main')
@section( 'content')


    <div class="container">

            <div class="card-body">
                <form action="{{route('admin.quan.store')}}" method="post">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                           Kiểm tra lại dữ liệu
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Tên quận</strong>
                                <input class="form-control" type="text" name="Tenquan" placeholder="Nhập Tên Quận">
                                @error('Tenquan')
                                Vui lòng nhập Tên quận
                                @enderror

                            </div>
                        </div>

                        <button class="btn btn-success" type="submit">Lưu</button>


                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection
