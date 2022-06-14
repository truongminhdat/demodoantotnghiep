@extends('admin.main')
@section( 'content')
    <div class="panel-default ">
        <p>Thống kê các danh sách đã duyệt</p>
        <div class="panel-body">
            <form action="" method="GET" class="form-inline" role="from">
                <div class="form-group mr-2">
                    <input type="date" class="form-control" name="date_from">
                </div>
                <div class="form-group mr-2">
                    <input type="date" class="form-control" name="date_to">
                </div>
                <button type="submit" class="btn btn-primary">Button</button>
            </form>
        </div>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>STT</th>
            <th>Bài đăng</th>
            <th>Người đăng</th>
            <th>Tình trạng</th>
            <th>Ngày đăng</th>
        </tr>
        </thead>
        <tbody>
        @foreach($dangtin as $data)
            <tr>
                <td>
                    {{$data->id}}
                </td>
                <td>
                    {{$data->Tieude}}
                </td>

                <td>
                    {{$data->user->name}}
                </td>
                <td>
                    {{$data->status = 0 ? 'Chưa duyệt':'Đã duyệt'}}
                </td>
                <td>
                    {{$data->created_at}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="panel-default">
        <p>Thống kê các tất cả người dùng</p>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>STT</th>
            <th>Người dùng</th>
            <th>Email</th>
            <th>Giới tính</th>
            <th>Ngày đăng</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user as $data)
            <tr>
                <td>
                    {{$data->id}}
                </td>
                <td>
                    {{$data->name}}
                </td>

                <td>
                    {{$data->ngaysinh}}
                </td>
                <td>
                    {{$data->status = 0 ? 'Chưa duyệt':'Đã duyệt'}}
                </td>
                <td>
                    {{$data->created_at}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
