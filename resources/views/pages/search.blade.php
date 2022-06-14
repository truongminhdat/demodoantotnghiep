<div class="container py-5 ">
    <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-search">
                <input type="hidden" name="s" value="">
                <input type="hidden" name="post_type" value="bat-dong-san">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                        <select name="loai_phong" id="loai-phong" class="form-control">
                            <option value="0" {{  $loaiPhong == 0 ? 'selected' : '' }}>Loại tin</option>
                            @foreach($loaiphong as $data)
                            <option value="{{ $data->id }}" {{  $loaiPhong == $data->id ? 'selected' : '' }}>{{$data->Tenloaiphong}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                        <select name="khu-vuc" id="quan" class="form-control">
                            <option value="0" {{  $quan == 0 ? 'selected' : '' }}>Chọn quận</option>
                            @foreach($loaiquan as $data)
                            <option value="{{ $data->id }}" {{  $quan == $data->id ? 'selected' : '' }}>{{$data->Tenquan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                        <select name="dien-tich" id="dien-tich" class="form-control">
                            <option value="0" {{  $dienTich == 0 ? 'selected' : '' }}>Diện tích</option>
                            <option value="20" {{  $dienTich == 20 ? 'selected' : '' }}>Dưới 20m2</option>
                            <option value="30" {{  $dienTich == 30 ? 'selected' : '' }}>20m2 - 30m2</option>
                            <option value="40" {{  $dienTich == 40 ? 'selected' : '' }}>30m2 - 40m2</option>
                            <option value="50" {{  $dienTich == 50 ? 'selected' : '' }}>40m2 - 50m2</option>
                            <option value="60" {{  $dienTich == 60 ? 'selected' : '' }}>50m2 - 60m2</option>
                            <option value="70" {{  $dienTich == 70 ? 'selected' : '' }}>60m2 - 70m2</option>
                            <option value="80" {{  $dienTich == 80 ? 'selected' : '' }}>70m2 - 80m2</option>
                            <option value="90" {{  $dienTich == 90 ? 'selected' : '' }}>80m2 - 90m2</option>
                            <option value="100" {{  $dienTich == 100 ? 'selected' : '' }}>90m2 - 100m2</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                        <select name="khoang-gia" id="gia-phong" class="form-control">
                            <option value="0" {{  $giaPhong == 0 ? 'selected' : '' }}>Khoảng giá</option>
                            <option value="1" {{  $giaPhong == 1 ? 'selected' : '' }}>&lt; 500K</option>
                            <option value="2" {{  $giaPhong == 2 ? 'selected' : '' }}>500K - 1 triệu</option>
                            <option value="3" {{  $giaPhong == 3 ? 'selected' : '' }}>1 triệu - 1 triệu 5</option>
                            <option value="4" {{  $giaPhong == 4 ? 'selected' : '' }}>1 triệu 5 - 2 triệu</option>
                            <option value="5" {{  $giaPhong == 5 ? 'selected' : '' }}>2 triệu - 3 triệu</option>
                            <option value="6" {{  $giaPhong == 6 ? 'selected' : '' }}>3 triệu - 4 triệu</option>
                            <option value="7" {{  $giaPhong == 7 ? 'selected' : '' }}>4 triệu - 5 triệu</option>
                            <option value="8" {{  $giaPhong == 8 ? 'selected' : '' }}>&gt; 5 triệu</option>
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                        <button class="btn btn-primary" id="btn-submit">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script>
    $(function() {
        $("#btn-submit").click(function (){
            $.LoadingOverlay('show');
            let loaiTin = $('#loai-phong').val();
            let quan = $('#quan').val();
            let dienTich = $('#dien-tich').val();
            let giaPhong = $('#gia-phong').val();
            let currentURL = location.protocol + '//' + location.host + location.pathname;
            let url = currentURL + "?loaiTin=" + loaiTin + "&quan=" + quan + "&dienTich=" + dienTich + "&giaPhong=" + giaPhong;
            window.location.href = url;
        });
    });
</script>
@endsection
