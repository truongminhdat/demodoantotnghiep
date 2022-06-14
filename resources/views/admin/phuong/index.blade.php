@extends('admin.main')
@section( 'content')
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right" style="margin-top: 20px;">
                    <a class="btn btn-success" href="{{route('admin.phuong.create')}}">Thêm mới
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
                <th>ID</th>
                <th>Tên quận</th>
                <th width="280px">Hành động</th>
            </tr>
            @foreach ($phuong as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->TenPhuong }}</td>
                    <td>
                        <a class="btn btn-primary" href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                        @csrf
                        <a href="#" class="btn btn-danger action_delete">
                            <i class="fas fa-trash"></i>
                        </a>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>



    </div>
    <div class="footer">
        {{$phuong->links()}}
    </div>

@endsection
