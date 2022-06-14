@extends('admin.main')
@section( 'content')
    <html>
    <head>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../../adminlte/plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="../../../adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../../adminlte/dist/css/adminlte.min.css">
    </head>
    <body>
    <div class="container">
              <div class="card-body">
            <form action="#" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Bài Đăng: </strong>
                                <span>{{$dangtin->Tieude}}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Địa chỉ :</strong>
                                <span>{{$dangtin->Diachi}}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Giá phòng:</strong>
                                <span>{{$dangtin->Giaphong}}vnđ</span>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Diện tích:</strong>
                                <span>{{$dangtin->Dientich}}</span>m<sup>2</sup>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Hình ảnh:</strong>
                                <br>
                                <img src="/upload/dangtin/{{$dangtin->Hinhanh}}" style="width: 300px" >
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Mô tả:</strong>
                                <span>{{$dangtin->Mota}}</span>
                            </div>
                        </div>
                        <hr>

                    </div>
                    <div class="col-md-6">

                            <div class="form-group">
                                <strong>Người đăng:</strong>
                                <span style="color: red">{{$dangtin->user->name }}</span>
                            </div>
                        <hr>
                        <div class="form-group">
                            <strong>Loại Hình:</strong>
                            <span>{{$dangtin->loaiphong->Tenloaiphong }}</span>
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>Số điện thoại:</strong>
                            <span style="color: #074f07;">{{$dangtin->Sdt}}</span>
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>Loại Hình :</strong>
                            <span style="color: #00bb00">{{$dangtin->loaiphong->Tenloaiphong }}</span>
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>Số bình luận :</strong>
                            <span>{{$comment}}</span>
                        </div>
                        <hr>
                        <div class="form-group">
                            <strong>Điểm đánh giá:</strong>
                            <span>{{$grate}}</span><i class="fa fa-star" style="color: yellow"></i>
                        </div>
                    </div>
                </div>

            </form>
                  <hr>
                  <div class="container">
                      <div class="row">
                          <div  class="col-md-6">

                              <h3>Danh sách bình luận</h3>
                              @foreach($dangtin->comment as $data)
                                  <div class="mt-2">

                                      <div class="d-flex flex-row p-3">

                                          <img src="/upload/user/{{$data->user->Anhdaidien}}" width="40" height="40" class="rounded-circle mr-3">

                                          <div class="w-100">

                                              <div class="d-flex justify-content-between align-items-center">
                                                  <div class="d-flex flex-row align-items-center">
                                                      <span class="mr-2"></span>
                                                      <small class="c-badge" style="width:180px;font-size: 18px">{{$data->user->name}}</small>
                                                  </div>
                                                  <small>{{$data->created_at}}</small>
                                              </div>

                                              <p class="text-justify comment-text mb-0" style="color: #0a0e14;font-size: 16px">{{$data->noidung}}</p>

                                              <div class="d-flex flex-row user-feed">

                                                  <span class="wish"><i class="fa fa-heartbeat mr-2"></i>{{$data->dangtin->Tieude}}</span>

                                                  <span class="ml-3"><a href="{{route('admin.dangtin.destroy',$data->id)}}" type="submit"  class="fa fa-comments-o mr-2" id="btn-reply">Xóa</a></span>


                                              </div>

                                          </div>


                                      </div>
                                  </div>
                              @endforeach
                          </div>


                      </div>
                  </div>

                  <div class="pull-right" style="margin-top: 20px;">
                <a class="btn btn-success" href="{{url('http://localhost:8000/admin/dangtin')}}">Quay lại
                </a>
            </div>
        </div>
    </div>
    </body>
    </html>
@endsection

