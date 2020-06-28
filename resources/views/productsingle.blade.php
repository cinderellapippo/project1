<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/app.css">
    <script src="../../public/js/app.js"></script>

    <!-- Styles -->
    <style>
        .breadcrumb > li + li:before {
            color: #CCCCCC;
            content: "/ ";
            padding: 0 5px;
        }

        #myCarousel .list-inline {
            white-space:nowrap;
            overflow-x:auto;
        }

        #myCarousel .carousel-indicators {
            position: static;
            left: initial;
            width: initial;
            margin-left: initial;
        }

        #myCarousel .carousel-indicators > li {
            width: initial;
            height: initial;
            text-indent: initial;
        }

        #myCarousel .carousel-indicators > li.active img {
            opacity: 0.7;
        }
    </style>

    <script>
        function insc() {
            var count=document.getElementById("count").innerHTML;
            document.getElementById("count").innerHTML=parseInt(count)+1;
        }
        function dec() {
            var count=document.getElementById("count").innerHTML;
            if(parseInt(count)>0){
                document.getElementById("count").innerHTML=parseInt(count)-1;
            };
        }
        function change(price) {
            var count=document.getElementById("count").innerHTML;
            var car_num=document.getElementById("car_num").innerHTML;
            var car_price=document.getElementById("car_price").innerHTML;
            if(parseInt(count)!=0){
                document.getElementById("car_num").innerHTML=parseInt(car_num)+parseInt(count);
                document.getElementById("car_price").innerHTML=parseInt(car_price)+parseInt(count)*parseInt(price);
            };
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="row">

            <div class="col-lg-2">
                <img src="../../resources/image/googlelogo.png" class="img-rounded">
            </div>

            <div class="col-lg-8">
            </div>

            <div class="col-lg-2">
                <span id="car_num">{{$data['user_num']}}</span> articiel(s), <span id="car_price">{{$data['user_price']}}</span> €
            </div>
        </div>
    </div>

    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Accueil</a></li>
            <li><a href="#">{{$data['category1']}}</a></li>
            <li><a href="#">{{$data['category2']}}</a></li>
            <li class="active">{{$data['name']}}</li>
        </ul>
    </div>

    <div class="container">
        <div class="row" style="width:100%">
            <div class="col-lg-5">
                <div id="myCarousel" class="carousel slide shadow">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        <div class="active carousel-item" data-slide-number="0">
                            <img src="../../resources/image/{{$data['image'][0]}}" class="img-fluid">
                        </div>

                        @if (count($data['image']) > 1)
                            @for ($i = 1; $i < count($data['image']); $i++)
                                <div class="carousel-item" data-slide-number="{{$i}}">
                                    <img src="../../resources/image/{{$data['image'][$i]}}" class="img-fluid">
                                </div>
                            @endfor
                        @endif

                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>
                    <!-- main slider carousel nav controls -->

                    <ul class="carousel-indicators list-inline mx-auto border px-2">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                                <img src="../../resources/image/{{$data['image'][0]}}" class="img-fluid">
                            </a>
                        </li>

                        @if (count($data['image']) > 1)
                            @for ($i = 1; $i < count($data['image']); $i++)
                                <li class="list-inline-item">
                                    <a id="carousel-selector-1" data-slide-to="{{$i}}" data-target="#myCarousel">
                                        <img src="../../resources/image/{{$data['image'][$i]}}" class="img-fluid">
                                    </a>
                                </li>
                            @endfor
                        @endif
                    </ul>

                <!--/main slider carousel-->
                </div>
            </div>

            <div class="col-lg-1"></div>

            <div class="col-lg-6">
                <div class="row" style="margin-bottom: 20px">
                    <table style="width:100%">
                        <tr>
                            <td width="30%"><h3>{{ $data['name'] }} </h3></td>
                            <td width="30%" style="padding-right: 40px">
                            <td></td>
                        </tr>
                        <tr>
                            <td width="30%"><h5>{{ $data['mark'] }}</h5></td>
                            <td width="30%" style="padding-right: 40px">
                            <td>
                                @if ($data['price'] == $data['pricepromotion'])
                                    <h4>{{$data['price']}} €</h4>
                                @else
                                    <h4><del style="padding-right: 10px">{{$data['price']}} €</del> {{$data['pricepromotion']}} €</h4>
                                @endif
                            </td>
                        </tr>
                    </table>

                </div>

                <div class="row" style="margin-bottom: 50px">
                    <nav class="nav nav-tabs" style="width:100%">
                        <a class="nav-item nav-link active" href="#p1" data-toggle="tab">Description</a>
                        <a class="nav-item nav-link" href="#p2" data-toggle="tab">Livraison</a>
                        <a class="nav-item nav-link" href="#p3" data-toggle="tab">Garanties</a>
                    </nav>
                    <div class="tab-content">
                        <div class="tab-pane active" id="p1">{{$data['description']}}</div>
                        <div class="tab-pane" id="p2">{{$data['livrasion']}}</div>
                        <div class="tab-pane" id="p3">{{$data['garanties']}}</div>
                    </div>
                </div>

                <div class="row">
                    <table style="width:100%">
                        <tr>
                            <td style="width:20%">Quantité</td>
                            <td style="width:40%">
                                <button type="button" class="btn btn-primary btn-sm"
                                        onclick="dec()">-</button>
                                <button type="button" class="btn btn-sm"
                                        id="count">1</button>
                                <button type="button" class="btn btn-primary btn-sm"
                                        onclick="insc()">+</button></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm"
                                        onclick="change({{ $data['price'] }})">Ajouter au panier</button>
                            </td>
                    </table>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
