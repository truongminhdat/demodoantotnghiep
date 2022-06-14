@extends('admin.main')
@section( 'content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Danh sách các loại phòng</h3>
                </div>
                <div class="pull-right" style="margin-top: 20px;">
                    <a class="btn btn-success" href="{{route('admin.loaiphong.create')}}">Thêm mới
                    </a>
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
                <th>Tên Loại Phòng</th>
                <th width="280px">Hành động</th>
            </tr>
            @foreach ($loaiphong as $data)
                <tr id="sid{{$data->id}}">
                    <td>{{ $data->Tenloaiphong }}</td>
                    <td>
                        <a class="btn btn-edit" href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                        @csrf
                        <a href="javascript:void(0)" onclick="deleteLoaiphong({{$data->id}})" class="btn btn-delete">
                            <i class="fas fa-trash"></i>
                        </a>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>



    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                {{$loaiphong->links()}}

            </li>

        </ul>
    </nav>
@endsection
@section('js')
    <script>
       function deleteLoaiphong(id){
           if (confirm('Bạn chắc chắn muốn xóa không?'))
           {
               $.ajax({
                   url: 'admin/loaiphong'+id,
                   type: 'DELETE',
                   data:{
                       _token : $("input[name=_token]").val()
                   },
                   success:function(){
                       $("#sid"+id).remove();
                   }

               })
           }

       }
    </script>
@endsection
