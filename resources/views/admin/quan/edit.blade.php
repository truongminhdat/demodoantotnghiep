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
            <form action="{{route('admin.quan.update',$quan->id)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Tên quận</strong>-
                            <input class="form-control" type="text" value="{{$quan->Tenquan }}" placeholder="Nhập tên quận" name="Tenquan" >


                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success mt-2">Lưu</button>


            </form>

        </div>
    </div>
    </div>
    </body>
    </html>
@endsection
