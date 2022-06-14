@section('title')
    Trang chủ
@endsection
@extends('welcome')
@section('content')
    @include('layout.slide')
    @include('pages.search')
    <section style="background-color: #eee;">
    @include('dangtin.trangdangtin')
        <div class="container mr-lg-1" style="text-align: center"
        {{$dangtin->links()}}
        </div>
    </section>
@endsection

@section('js')
@endsection

