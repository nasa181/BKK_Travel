<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <!--  jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

        <!-- Isolated Version of Bootstrap, not needed if your site already used Bootstrap -->
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        




        <script type="text/javascript">
            $(document).ready(function() {
                $('.cross').hide();
                $('.menu').hide();
                $(".hamburger").click(function () {
                    $(".menu").slideToggle("slow", function () {
                        $(".hamburger").hide();
                        $(".cross").show();
                    });
                });

                $('.cross').click(function () {
                    $(".menu").slideToggle("slow", function () {
                        $(".cross").hide();
                        $(".hamburger").show();
                    });
                });
            });

        </script>

        <style>

            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }
            .content {
                text-align: center;
                display: inline-block;
            }

            .yellow_text{
                color: #ffff00;
                font-size: 36px;
            }

            .title {
                font-size: 96px;
            }
            /* Remove the navbar's default rounded borders and increase the bottom margin */
            .navbar {
                margin-bottom: 50px;
                border-radius: 0;
            }

            /* Remove the jumbotron's default bottom margin */
            .jumbotron {
                margin-bottom: 0;
            }

            /* Add a gray background color and some padding to the footer */
            footer {
                background-color: #f2f2f2;
                padding: 25px;
            }
            .carousel-inner > .item > img,
            .carousel-inner > .item > a > img {
                width: 50%;
                margin: auto;
            }
            #map {
                height: 30%;
                width: 30%;
            }


        </style>

    </head>
    <body>
    {{--<!-- jQuery -->--}}
    {{--<script src="js/jquery-1.10.2.min.js"></script>--}}

    {{--<!-- Bootstrap -->--}}
    {{--<script src="js/bootstrap.min.js"></script>--}}

    {{--<!-- Bootstrap Form Helpers -->--}}
    {{--<script src="js/bootstrap-formhelpers.min.js"></script>--}}



    {{--style="margin: 0 0 0 0;padding-top: 0;padding-bottom: 0"--}}
        <div class="jumbotron" >
            {{--<div class="container text-center">--}}
                {{--<a href="/"><img src="/BKKTravelLogo.png" width="70%" height="20%"></a>--}}
            {{--</div>--}}
            <div class="container" >
                <br>
                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 400px">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">

                        <div class="item active">
                            <img src="/BKKTravelLogo.png" alt="Chania" width="60" height="300px">
                            <div class="carousel-caption">
                                <h3>Chania</h3>
                                <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="/BKKTravelLogo.png" alt="Chania" width="60" height="300px">
                            <div class="carousel-caption">
                                <h3>Chania</h3>
                                <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="/BKKTravelLogo.png" alt="Flower" width="60" height="300px">
                            <div class="carousel-caption">
                                <h3>Flowers</h3>
                                <p>Beatiful flowers in Kolymbari, Crete.</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="/BKKTravelLogo.png" alt="Flower" width="60" height="300px">
                            <div class="carousel-caption">
                                <h3>Flowers</h3>
                                <p>Beatiful flowers in Kolymbari, Crete.</p>
                            </div>
                        </div>

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" width="50%">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <form class="navbar-form navbar-right" role="search" action="/search">
                        {!! csrf_field() !!}
                        <div class="form-group input-group">
                            <input type="text" class="form-control" name="in_search" placeholder="Search..">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/view_profile" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        <li><a href="/register_page"><span class="glyphicon"></span> Sign Up</a></li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="#">Products</a></li>
                        <li><a href="#">Deals</a></li>
                        <li><a href="#">Stores</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- Modal -->
        <div class="modal fade" id="loginModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: cornflowerblue">
                        <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                        <h2 class="modal-title" style="color: #ffffff">Login</h2>
                    </div>
                    <form method="post" action="/login">
                    <div class="modal-body">
                        <p>Email</p>
                        <input type="text" class="form-control" name="in_email" placeholder="Email..">
                        <p>Password</p>
                        <input type="password" class="form-control" name="in_password" placeholder="Password..">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Login</button>
                    </form>
                        <a href="/register_page"><button type="button" class="btn btn-default" data-dismiss="modal">Sign Up</button></a>
                    </div>
                </div>

            </div>
        </div>


        @yield('center_page')
        <script>
            $("input").keypress(function(event) {
                if (event.which == 13) {
                    event.preventDefault();
                    $("form").submit();
                }
            });

        </script>


    </body>
</html>
