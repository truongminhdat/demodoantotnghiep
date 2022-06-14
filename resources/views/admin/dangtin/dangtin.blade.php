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
{{--        <form action="" class="form-inline">--}}
{{--            <div class="form-group">--}}
{{--                <input class="form-control" name="key" placeholder="Tìm kiếm.."/>--}}
{{--            </div>--}}
{{--            <button type="submit" class="btn btn-primary">--}}
{{--                <i class="fas fa-search"></i>--}}
{{--            </button>--}}
{{--        </form>--}}



        <table class="table table-bordered mt-5">
            <tr>
                <th>Duyệt
                <th>Tiêu đề</th>
                <th>Địa chỉ</th>
                <th>Giá</th>
                <th>Người đăng</th>
                <th>Ảnh</th>
                <th>Diện tích</th>
                <th>Số lượng phòng</th>
                <th>Ngày đăng</th>
                <th>Tình trạng</th>
                <th>Hành động</th>
            </tr>
            @foreach ($dangtin as $data)
                <tr>

                    <td>
                        @if($data->status == 1 )
                            <input type="button" data-status="0" id="{{$data->id}}" class="btn btn-danger duyet_btn" value="Bỏ duyệt">
                        @else
                            <input type="button" data-status="1" id="{{$data->id}}" class="btn btn-success duyet_btn" value="Duyệt">
                        @endif
                    </td>
                    <td>{{ $data->Tieude }}</td>
                    <td>{{$data->Diachi}}</td>
                    <td>{{($data->Giaphong)}}vnđ</td>
                    <td>{{$data->user->name}}</td>
                    <td><img src="/upload/dangtin/{{$data->Hinhanh}}" width="120"></td>
                    <td>{{$data->Dientich}}m<sup>2</sup></td>
                    <td>{{$data->soluongphong}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                       @if($data->status == 0)
                          <span style="color: red">Chưa duyệt</span>
                        @else
                           <span style="color: #0c84ff">Đã duyệt</span>

                        @endif
                    </td>
                    <td>
                        <a class="btn btn-sm" href="{{route('admin.dangtin.edit',$data->id)}}">
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
@section('js')
    <script type="text/javascript">
        $('.duyet_btn').click(function (){
            var status = $(this).data('status');
            var id = $(this).attr('id');
            if(status == 0){
                var alert = 'Bạn đã bỏ duyệt ';
            }
            else {
                var alert = 'Bạn đã duyệt bài đăng'
            }

            $.ajax({
                url:"{{url('admin/duyetbaidang')}}",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },

               data:{status:status,id:id},
                success:function(data) {
                    $('#notify_dangtin').html(data);
                    $('#notify_dangtin').html('<span class="alert alert-default-primary">'+alert+'</span>');
                }
            })
        })
    </script>
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.baotrongit.com/Money-Format-Plugin/money_format.js"></script>
    <script type="text/javascript">
        $('.money').simpleMoneyFormat();
    </script>
@endsection

