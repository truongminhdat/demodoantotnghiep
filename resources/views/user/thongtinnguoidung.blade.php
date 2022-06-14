<div class="col-md-12">
   <div class="text-center">
       <img class="img-fluid" src="upload/user/{{ $user->Anhbia }}" alt="">
   </div>
    <div class="text-left">
        <img class="img-thumbnail" src="upload/user/{{ $user->Anhdaidien }}" alt="">
    </div>
</div>
<div class="row" style="margin-top: 120px">
    <div class="col-lg-10 col-xl-9 mx-auto">

            <div class="card-body">
                @if(session('success'))
                    <span class="alert alert-success">
                                    <strong>{{session('success')}}</strong>
                                </span>

                @endif
                <h5 class="card-title text-center">Thông tin tài khoản</h5>
                <form action="{{route('update',$user->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input name="name" value="{{$user->name}}"  type="text" class="form-control" placeholder="Nhập tên đăng nhập"/>
                        @if($errors->has('name'))
                            {{$errors->first('name')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <input name="email" value="{{$user->email}}" type="email" class="form-control" placeholder="Nhập email"/>
                        @if($errors->has('email'))
                            {{$errors->first('email')}}
                        @endif

                    </div>


                    <hr>
                    <div class="form-group">
                        <input name="diachi" value="{{$user->diachi}}"  type="text" class="form-control" placeholder="Nhập Địa chỉ"/>
                        @if($errors->has('diachi'))
                            {{$errors->first('diachi')}}
                        @endif

                    </div>
                    <div class="form-group">
                        <input name="gioitinh" value="{{$user->gioitinh}}"  type="text" class="form-control" placeholder="Nhập giới tính"/>
                        @if($errors->has('gioitinh'))
                            {{$errors->first('gioitinh')}}
                        @endif

                    </div>


                    <div class="form-group">
                        <input name="ngaysinh" value="{{$user->ngaysinh}}" type="text" class="form-control" placeholder="Ngày sinh"/>
                        @if($errors->has('ngaysinh'))
                            {{$errors->first('ngaysinh')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <input name="sdt" value="{{$user->sdt}}" type="text" class="form-control" placeholder="Nhập số điện thoại"/>
                    </div>
                    <div class="form-group">
                        <input name="Anhdaidien" value="{{$user->Anhdaidien}}" type="file" class="form-control">
                        <label>Ảnh đại điện</label>
                        @if($errors->has('Anhdaidien'))
                            {{$errors->first('Anhdaidien')}}
                        @endif
                    </div>
                    <div class="form-group">
                        <input name="Anhbia" value="{{$user->Anhbia}}" type="file" class="form-control">
                        <label>Ảnh bìa</label>
                    </div>
                    <button class="btn btn-primary text-uppercase" type="submit">Cập nhật</button>
                    <a class="d-block text-center mt-2 small" href="{{route('password')}}">Đổi mật khẩu</a>
                    <hr class="my-4">
                </form>
            </div>
        </div>
    </div>
</div>
</div>

