<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>
    <base href="{{ asset('') }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

{{--    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="website/fonts/icomoon/style.css">
    <link rel="stylesheet" href="website/css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">

    <link rel="stylesheet" href="website/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="website/css/bootstrap.min.css">
    <link rel="stylesheet" href="website/fontawesome/css/fontawesome.css">
    <!-- Style -->
    <link rel="stylesheet" href="website/css/style.css">
    <link rel="stylesheet" href="website/css/product.css">
    <link rel="stylesheet" href="website/css/comment.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="website/css/category.css">
    <link rel="stylesheet" href="website/css/chitiet.css">


    <script src="website/js/jquery-3.3.1.min.js"></script>
    <script src="website/js/popper.min.js"></script>
    <script src="website/js/bootstrap.min.js"></script>
    <script src="website/js/jquery.sticky.js"></script>
    <script src="website/js/main.js"></script>
    <script src="website/js/simple.money.format.js"></script>
{{--    <script src="public/website/js/jquery-3.2.1.js"></script>--}}
{{--    <script src="public/website/js/jquery-3.2.1.min.js"></script>--}}
       <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
    <script>
            $(function () {

            $("#rateYo").rateYo({
                rating: 0,
                normalFill:'#A0A0A0',
                ratedFill:'#ffff00',

            }).on("rateyo.set",function (e,data){
                $('#rating-start').val(data.rating)
                $('#formRating').submit();
                alert("Cảm ơn bạn đã đánh giá "+data.rating+ "sao");
            });
            $("#rateYo1").rateYo({
            rating:0,
            normalFill:'#A0A0A0',
            ratedFill:'#ffff00',

        }).on("rateyo.set",function (e,data){
            alert("Bạn chưa đăng nhập,vui lòng đăng nhập để đánh giá")
        });




        });

    </script>
    @yield('js')
       <style type="text/css">
        #map {
            height: 100%;
        }

        /*
         * Optional: Makes the sample page fill the window.
         */
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            background-color: #fff;
            border: 0;
            border-radius: 2px;
            box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
            margin: 10px;
            padding: 0 0.5em;
            font: 400 18px Roboto, Arial, sans-serif;
            overflow: hidden;
            font-family: Roboto;
            padding: 0;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }

        #target {
            width: 345px;
        }
    </style>

</head>

<body>

@include('layout.header')

@yield('content')

@include('layout.footer')

<div style="text-align: left;" id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-login">

        <!-- Modal content-->
        <div class="panel panel-default">
            <div class="panel-heading"><h4>Đăng nhập</h4></div>
            <div class="panel-body">

                <form action="dangnhap" method="POST">
                    {{ csrf_field() }}
                    <div>
                        <label>Email</label>
                        <input type="email" class="form-control input" placeholder="Địa Chỉ Email" name="email"
                        >
                    </div>
                    <br>
                    <div>
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" placeholder="Mật Khẩu" name="password">
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Đăng nhập
                        </button>
                    </div>
                    <div class="form-group" style="margin-bottom: 3em;">
                        <a href="">Quên Mật Khẩu?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>


