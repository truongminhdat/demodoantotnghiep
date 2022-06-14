@section('title')
   Cập nhật đăng tin
@endsection
@extends('welcome')
@section('content')


    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
                <div class="card-body">
                    <h5 class="card-title text-center" style="color: #0a0e14;font-weight: bold">Thông tin phòng trọ</h5>
                    @if(session('thongbao'))
                        <span class="alert alert-success">
                                    <strong>{{session('thongbao')}}</strong>
                                </span>

                    @endif
                    <form action="{{route('capnhat.dangtin',$dangtin->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input name="Tieude" type="text" class="form-control" value="{{$dangtin->Tieude}}"/>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1">Loại phòng</label>
                                <select class="form-control" name="loaiphong_id" id="exampleFormControlSelect1">
                                    @foreach($loaiphong as $data)
                                        <option value="{{$data->id}}">{{$data->Tenloaiphong}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleFormControlSelect1">Chọn Khu Vực</label>
                                <select class="form-control" name="phuong_id" id="exampleFormControlSelect2">

                                    @foreach($loaiquan as $data)
                                        <option value="#">Chọn quận</option>
                                        <option value="{{$data->id}}">{{$data->Tenquan}}</option>
                                        @if($data->phuong)
                                            @foreach($data->phuong as $data1)
                                                <option value="{{$data1->id}}">--{{$data1->TenPhuong}}</option>
                                            @endforeach
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label>Địa chỉ cụ thể</label>
                            <input name="Diachi" type="text" class="form-control" value="{{$dangtin->Diachi}}"/>
                            @if($errors->has('Diachi'))
                                {{$errors->first('Diachi')}}
                            @endif

                        </div>

                        <div class="form-group">
                            <i class="bi bi-house-door-fill"></i><label>Giá phòng</label>
                            <input name="Giaphong" type="text" id="icon-money" class="form-control" value="{{$dangtin->Giaphong}}"/>
                            @if($errors->has('Giaphong'))
                                {{$errors->first('Giaphong')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Diện tích</label>
                            <input name="Dientich" type="text" class="form-control" value="{{$dangtin->Dientich}}"/>
                            @if($errors->has('Dientich'))
                                {{$errors->first('Dientich')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input name="Sdt" type="text" class="form-control" value="{{$dangtin->Sdt}}" />
                            @if($errors->has('Sdt'))
                                {{$errors->first('Sdt')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <label>Số lượng phòng</label>
                            <input name="soluongphong" type="text" class="form-control" value="{{$dangtin->soluongphong}}"/>
                            @if($errors->has('soluongphong'))
                                {{$errors->first('soluongphong')}}
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input name="Mota" type="textarea" class="form-control" value="{{$dangtin->Mota}}"/>
                            @if($errors->has('Mota'))
                                {{$errors->first('Mota')}}
                            @endif

                        </div>
                        <div class="form-group">
                            <div>
                            <img src="upload/dangtin/{{$dangtin->Hinhanh}}" alt="{{$dangtin->Tieude}}" style="height: 505px;">
                            </div>
                            <input name="Hinhanh" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Tiện nghi</label>
                            <input name="tiennghi" type="textarea" class="form-control" value="{{$dangtin->tiennghi}}"/>

                            <hr>
                        </div>
                        <button class="btn btn-lg btn-primary" type="submit">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

