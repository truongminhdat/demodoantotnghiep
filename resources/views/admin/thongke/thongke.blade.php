@extends('admin.main')
@section( 'content')

        <section class="content">
            <div class="container">
                <!-- Small boxes (Stat box) -->
                <div class="row mt-5">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$user_count}}</h3>

                                <p>Người dùng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$product_count}}</h3>

                                <p>Bài đăng</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$comment_count}}</h3>

                                <p>Số lượt bình luận</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Unique Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                    <div class="col-md-2">
                        <select class="dashboard-filter form-control">
                        <option>--Chọn--</option>
                        <option value="7ngay">--7 ngày--</option>
                        <option value="thangtruoc">--Tháng trước--</option>
                        <option value="thangnay">--Tháng này--</option>
                        <option value="365 ngày qua">--365 ngày qua--</option>
                        </select>
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

         </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.dashboard-filter').change(function () {
                var dashboard_value = $(this).val();
                var _token = $('input[name="_token"]').val();
                alert(dashboard_value);
            })

        })

    </script>
@endsection

