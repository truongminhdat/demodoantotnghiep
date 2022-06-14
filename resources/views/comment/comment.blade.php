
@if(\Illuminate\Support\Facades\Auth::user())
    <div class="col-md-12 col-xl-9">

        <div class="card">

            <div class="p-3">
                @if(session('thongbao'))
                    {{session('thongbao')}}
                @endif

                <h6>Bình luận</h6>

            </div>

            <form action={{route('comment',$dangtin->id)}} method="post" role="form">

                @csrf
                <div class="mt-3 d-flex flex-row align-items-center p-3 form-color">
                    <img src="upload/user/{{$user->Anhdaidien}}" width="50" class="rounded-circle mr-2">
                    <input type="text" class="form-control" id="comment-content" name="noidung" placeholder="Enter your comment...">
                    <input type="hidden" class="form-control" name="dangtin_id"  value="{{$dangtin->id}}">
                    <button id="btn-commnent"  style="margin-left: 20px" class="btn btn-primary" type="submit">Gửi</button>
                    <small id="comment-error" class="help-block"></small>
                </div>
            </form>
            @foreach($dangtin->comment as $data)
                <div class="mt-2">

                    <div class="d-flex flex-row p-3">

                        <img src="upload/user/{{$data->user->Anhdaidien}}" width="40" height="40" class="rounded-circle mr-3">

                        <div class="w-100">

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex flex-row align-items-center">
                                    <span class="mr-2"></span>
                                    <small class="c-badge" style="width:180px;font-size: 18px">{{$data->user->name}}</small>
                                </div>
                                <small>{{$data->created_at}}</small>
                            </div>

                            <p class="text-justify comment-text mb-0" style="color: #0a0e14;font-size: 16px">{{$data->noidung}}</p>

                            <div class="d-flex flex-row user-feed">

                                <span class="wish"><i class="fa fa-heartbeat mr-2"></i>{{$data->dangtin->Tieude}}</span>
                                @if(\Illuminate\Support\Facades\Auth::user())
                                    <span class="ml-3"><i class="fa fa-comments-o mr-2" id="btn-reply" data-id="{{$data->id}}"></i>Reply</span>
                                @endif


                            </div>

                        </div>


                    </div>






                </div>
            @endforeach

        </div>

    </div>
    </div>
    <hr>
@endif
@section('js')
 <script>
    $('#btn-reply-show-id').click(function (ev) {
        ev.preventDefault();


    })
 </script>
@endsection

