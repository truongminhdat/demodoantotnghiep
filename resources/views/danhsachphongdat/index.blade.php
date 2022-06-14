@section('title')
    Danh sách đặt phòng
@endsection
@extends('welcome')
@section('content')
<div class="container py-5">
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="row justify-content-left mb-3">
        <div class="col-md-10 col-xl-10">
            <h2 style="font-weight: bold">Danh sách phòng trọ đã đặt</h2>
            <div class="col-md-4 align-content-md-center"></div>
            @if(count($dangtins))
                @foreach($dangtins as $dangtin)
                        <div class="card shadow-0 border rounded-3 mt-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                        <a href="{{route('trangchitiet',$dangtin->id)}}"><img
                                                src="upload/dangtin/{{$dangtin->Hinhanh}}"
                                                class="w-100"></a>
                                        <a href="">
                                            <div class="hover-overlay">
                                                <div class="mask"
                                                     style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <h5>{{$dangtin->Tieude}}</h5>
                                    <div class="d-flex flex-row">
                                        <div class="text-danger mb-1 me-2">
                                            <span>{{$dangtin->Diachi}}</span>
                                        </div>
                                    </div>
                                    <div class="text-left">
                                            <span><p
                                                    style="color: #00c4ff">{{$dangtin->Dientich}}m<sup>2</sup></p></span>
                                    </div>
                                    <div class="text-left">
                                        <span>{{$dangtin->loaiphong->Tenloaiphong}}</span>
                                    </div>
                                    <div class="mb-2 text-muted small">
                                        <img class="anhdaidien"
                                             src="upload/user/{{$dangtin->user->Anhdaidien}}"/><span>{{$dangtin->user->name}}</span>
                                        <span class="text-primary"> • </span>
                                        <span>{{$dangtin->phuong->TenPhuong }}</span>
                                        <span class="text-primary"> • </span>
                                        <span>{{$dangtin->phuong->quan->Tenquan }}</span>
                                        <span class="text-primary"> • </span>
                                    </div>

                                </div>

                                <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                                    <div class="d-flex flex-row align-items-center mb-1">
                                        <span class="price-format">{{number_format($dangtin->Giaphong)}}vnđ</span>
                                    </div>
                                    <h6 class="text-success">{{$dangtin->Mota}}</h6>

                                    <div class="d-flex flex-column mt-4">
                                        <form method="post" action="{{ route('huyDatPhong') }}">
                                            @csrf
                                            <input type="hidden" name="dangtin_id" value="{{ $dangtin->id }}">
                                            <button class="btn btn-danger btn-sm">Hủy đặt phòng</button>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                    @endforeach
            @else
                <span style="display: block ;width: 100%; text-align: left; font-size: 22px; color: #f51903">Không có phòng được đặt</span>
            @endif
        </div>
    </div>

</div>
@endsection
