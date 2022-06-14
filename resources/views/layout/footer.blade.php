
<footer>
    <div class="container pt-5 border-bottom">
        <div class="row">
            <div class="col-md-3 col-sm-12 mb-3 text-center">
                <div class="site-logo">
                    <a href="{{route('trangchu')}}" class="mb-4 font-weight-bold text-uppercase"><span class="text-primary">Home</span></a>
                </div>

            </div>
            <div class="col-md-9 col-sm-12 ">

                <div class="col-md-3 col-sm-6 col-6 p-0 float-left mb-3">
                    <h5 class="mb-4 font-weight-bold text-uppercase">Loại Phòng</h5>
                    <ul class="list-group">
                        @foreach($loaiphong as $data)
                        <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="{{route('trangchu.trochothue',$data->id)}}">{{$data->Tenloaiphong}}</a></li>
                        @endforeach

                    </ul>
                </div>

                <div class="col-md-3 col-sm-6 col-6 p-0 mb-3 float-left">
                    <h5 class="mb-4 font-weight-bold text-uppercase">Khu vực</h5>
                    <ul class="list-group">
                        @foreach($loaiquan as $data)
                        <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#">{{$data->Tenquan}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-3 col-sm-6 col-6 mb-3 p-0 float-left">
                    <h5 class="mb-4 font-weight-bold text-uppercase">Liên hệ</h5>
                    <ul class="list-group">
                        <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="#"></i>Thông tin tài khoản</a></li>
                        <li class="list-group-item bg-transparent border-0 p-0 mb-2"><a href="https://blog.naologic.com"></i> Blog</a></li>
                    </ul>
                </div>

{{--                <div class="col-md-3 col-sm-6 col-6 mb-3 p-0 float-left">--}}
{{--                    <h5 class="mb-4 font-weight-bold text-uppercase">Connect</h5>--}}
{{--                    <ul class="list-group">--}}
{{--                        <li class="list-group-item bg-transparent border-0 p-0 mb-2">--}}
{{--                            <a href="https://www.linkedin.com/company/naologic"><i class="fa fa-linkedin mr-1"></i> LinkedIn</a>--}}
{{--                        </li>--}}
{{--                        <li class="list-group-item bg-transparent border-0 p-0 mb-2">--}}
{{--                            <a href="https://twitter.com/naologicerp"><i class="fa fa-twitter mr-1"></i> Twitter</a>--}}
{{--                        </li class="list-group-item bg-transparent border-0 p-0 mb-2">--}}
{{--                        <li class="list-group-item bg-transparent border-0 p-0 mb-2">--}}
{{--                            <a href="https://www.reddit.com/r/naologic/"><i class="fa fa-reddit mr-1"></i> Reddit</a>--}}
{{--                        </li>--}}
{{--                        <li class="list-group-item bg-transparent border-0 p-0 mb-2">--}}
{{--                            <a href="https://plus.google.com/109511516185666043480" target="_blank"><i class="fa fa-google-plus mr-1"></i> Google+</a>--}}

{{--                        </li>--}}
{{--                        <li class="list-group-item bg-transparent border-0 p-0 mb-2">--}}
{{--                            <a href="https://github.com/naologic" target="_blank"><i class="fa fa-github mr-1"></i> Github</a>--}}
{{--                        </li>--}}
{{--                        <li class="list-group-item bg-transparent border-0 p-0 mb-2">--}}
{{--                            <a href="https://blog.naologic.com" target="_blank"><i class="fa fa-medium mr-1"></i> Medium</a>--}}
{{--                        </li>--}}
{{--                        <li class="list-group-item bg-transparent border-0 p-0 mb-2">--}}
{{--                            <a href="https://www.facebook.com/naologic/" target="_blank"><i class="fa fa-facebook mr-1"></i> Facebook</a>--}}
{{--                        </li>--}}
{{--                        <li class="list-group-item bg-transparent border-0 p-0 mb-2">--}}
{{--                            <a href="https://www.youtube.com/channel/UCtHmuf2oQLnksokfz8GIbKA" target="_blank"><i class="fa fa-youtube mr-1"></i> YouTube</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}

            </div>
            <div class="col-md-12">
                <div class="py-4 d-flex justify-content-center align-items-center">
                    <a class="mr-4" href="#">Trương Minh Đạt</a>
                    <a href="../sitemap.xml">18T1</a>
                </div>
            </div>
        </div>
    </div>
</footer>
