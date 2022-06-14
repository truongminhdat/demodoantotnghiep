@extends('admin.main')
@section( 'content')
<div class="container">
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Quận</h3>
            </div>
            <div class="pull-right" style="margin-top: 20px;">
                <a class="btn btn-success" href="{{route('admin.quan.create')}}">Thêm mới
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


    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif


    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Tên quận</th>
            <th width="280px">Hành động</th>
        </tr>
        @foreach ($quan as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->Tenquan }}</td>
                <td>
                        <a class="btn btn-primary" href="{{route('admin.quan.edit',$data->id)}}">
                            <i class="fas fa-edit"></i>
                        </a>
                    @csrf
                    <a href="{{route('admin.quan.destroy',$data->id)}}" class="btn btn-danger action_delete">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>

            </tr>
        @endforeach
</table>

    <nav aria-label="Page navigation ">
        <nav aria-label="Page navigation example">

                {!! $quan->links()!!}
                </li>
            </ul>

        </nav></nav>
</div>

@endsection
