@extends('admin.main')
@section( 'content')
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
        <table class="table table-bordered">
            <tr>
                <th>Duyệt</th>
                <th>Hoạt động</th>
                <th>Tên tài khoản</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Giới tính</th>
                <th>Ảnh đại diện</th>
                <th>Ảnh bìa</th>
            </tr>
            @foreach ($user as $data)
                @if($data->role_id == 2)
                <tr>
                    <td>
                        @if($data->status == 1 )
                            <input type="button" data-status="0" id="{{$data->id}}" class="btn btn-secondary duyet_btn" value="Mở khóa">
                        @else
                            <input type="button" data-status="1" id="{{$data->id}}" class="btn btn-primary duyet_btn" value="Khóa tài khoản">
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.user.edit',$data->id)}}" class="btn btn-xs btn-primary">Sửa</a>
                        <a href="" class="btn btn-xs btn-danger">Xóa</a>
                    </td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->diachi}}</td>
                    <td>{{$data->sdt}}</td>
                    <td>{{$data->gioitinh}}</td>
                    <td><img  src="/upload/user/{{ $data->Anhdaidien }}" width="120" alt=""></td>
                    <td><img  src="/upload/user/{{ $data->Anhbia}}" width="120" alt=""></td>

                </tr>
                @else
                @endif
            @endforeach
        </table>

        <nav aria-label="Page navigation ">
            <nav aria-label="Page navigation example">
                </li>
                {{$user->links()}}
                </ul>

            </nav></nav>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $('.duyet_btn').click(function (){
            var status = $(this).data('status');
            var id = $(this).attr('id');
            if(status == 0){
                var alert = 'Bạn đã mở tài khoản';
            }
            else {
                var alert = 'Bạn đã khóa tài khoản'
            }

            $.ajax({
                url:"{{url('admin/duyettaikhoan')}}",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },

                data:{status:status,id:id},
                success:function(data) {
                    $('#notify_dangtin').html(data);
                    $('#notify_dangtin').html('<span class="text text-alert">'+alert+'</span>');
                }





            })
        })

    </script>
@endsection
