

    <div class="container py-5">
        <div class="row justify-content-left mb-3">
            <div class="col-md-9 col-xl-9">
                <h5>Tất cả các phòng trọ</h5>
                <div class="col-md-4 align-content-md-center">
                </div>
                @if(count($dangtin))
                    @foreach($dangtin as $dangtin )
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
                                        <div>
                                            <span
                                                style="color: #ef0101">Số lượng phòng: {{ $dangtin->soluongphong }}</span>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-1">
                                            <span class="money-giaphong">{{number_format($dangtin->Giaphong)}}vnđ</span>
                                        </div>
                                        <h6 class="text-success">{{$dangtin->Mota}}</h6>
                                        {{--                                @if($dangtin->soluongphong > 0)--}}
                                        {{--                                    <div class="d-flex flex-column mt-4">--}}
                                        {{--                                        <button class="btn btn-primary btn-sm" type="button">Còn phòng</button>--}}
                                        {{--                                    </div>--}}
                                        {{--                                @else--}}
                                        {{--                                    <div class="d-flex flex-column mt-4">--}}
                                        {{--                                        <button class="btn btn-outline-danger" type="button">Đã cho thuê</button>--}}
                                        {{--                                    </div>--}}
                                        {{--                                @endif--}}

                                        <div class="d-flex flex-column mt-4">
                                            <a href="{{ route('trangchitiet',$dangtin->id) }}"
                                               class="btn btn-primary btn-sm" style="color: #fff">Chi tiết</a>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>
                    @endforeach
                @else
                    <span style="display: block ;width: 100%; text-align: center; font-size: 18px">Không tìm thấy phòng trọ nào phù hợp.</span>
                @endif
            </div>

            <div class="col-md-3 co-xl-3">
                <ul class="list-group">
                    <li class="list-group-item active" aria-current="true">Danh sách các loại phòng</li>
                    @foreach($loaiphong as $data)
                        <li class="list-group-item"><a href="">{{$data->Tenloaiphong}}</a></li>
                    @endforeach
                </ul>
                <ul class="list-group mt-5">
                    <li class="list-group-item active" aria-current="true">Phòng Trọ</li>
                    @foreach($loaiquan as $data)
                        <li class="list-group-item"><a
                                href="{{route('trangchu.trochothue',$data->id)}}">{{$data->Tenquan}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>


