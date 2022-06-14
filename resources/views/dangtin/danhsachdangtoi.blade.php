@section('title')
  Trang đăng tin của tôi
@endsection
@extends('welcome')
@section('content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-12 margin-tb">
                <div id="notify_dangtin"></div>
                <div class="pull-right" style="margin-top: 20px;">
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session('thongbao'))
            <span class="alert alert-success">
                                    <strong>{{session('thongbao')}}</strong>
                                </span>

        @endif
        @if(session('baoloi'))
            <span class="alert alert-danger">
                <strong>{{session('baoloi')}}</strong>
            </span>

        @endif
{{--        <form action="" class="form-inline">--}}
{{--            <div class="form-group">--}}
{{--                <input class="form-control" name="key" placeholder="Tìm kiếm.."/>--}}
{{--            </div>--}}
{{--            <button type="submit" class="btn btn-primary">--}}
{{--                <i class="fas fa-search"></i>--}}
{{--            </button>--}}
{{--        </form>--}}


        <span class="align-content-md-center" style="color: red;align-items: center">Danh sách các bài của tôi</span>
        <table class="table table-bordered mt-5">
            <tr>
                <th>Tiêu đề</th>
                <th>Địa chỉ</th>
                <th>Giá</th>
                <th>Người đăng</th>
                <th>Ảnh</th>
                <th>Diện tích</th>
                <th>Số lượng phòng</th>
                <th>Ngày đăng</th>
                <th>Hành động</th>
            </tr>
            @foreach ($dangtin as $data)
                <tr>

                    <td>{{ $data->Tieude }}</td>
                    <td>{{$data->Diachi}}</td>
                    <td>{{number_format($data->Giaphong)}}vnđ</td>
                    <td>{{$data->user->name}}</td>
                    <td><img src="/upload/dangtin/{{$data->Hinhanh}}" width="120"></td>
                    <td>{{$data->Dientich}}m<sup>2</sup></td>
                    <td>{{$data->soluongphong}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
{{--                        {{$dangtin_count}}--}}
                    </td>
                    <td>
                        <a class="btn btn-sm" href="{{route('trangchitiet',$data->id) }}">
                            <i class="fas fa-store"></i>
                        </a>
                        <a class="btn btn-sm" href="{{route('capnhat.dangtin',$data->id)}}">
                            <i class="fas fa-edit">Xem</i>
                        </a>
                    @csrf
                </tr>
            @endforeach
        </table>

        <nav aria-label="Page navigation ">
            <nav aria-label="Page navigation example">
                {{ $dangtin->appends(request()->all())->links()}}
                </li>
                </ul>

            </nav></nav>
    </div>

@endsection
