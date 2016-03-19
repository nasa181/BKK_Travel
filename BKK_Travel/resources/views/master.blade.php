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
                /*background-image: url("Los-Angeles-beach-at-night.jpg");*/
                /*background-attachment: fixed;*/
                /*background-position: 15% 10%;*/
                background-color: #000000;
                /*opacity: 0.5;*/
            }

            /*.container {*/
                /*text-align: center;*/
                /*display: table-cell;*/
                /*vertical-align: middle;*/
            /*}*/

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
            .floating-box {
                float: left;
                width: 150px;
                height: 75px;
                margin: 10px;
                word-break: keep-all;
                display: block;
                background-color: white;
                position: relative;
                padding: 10px;
                /*border: 3px solid #73AD21;*/
            }

            .blackbox {
                background-color: black;
                opacity: 0.7;
                background-size: 100%;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }
            header {
                width: 100%;
                background: #1d1f20;
                height: 50px;
                line-height: 50px;
            }

            .hamburger {
                background: none;
                position: absolute;
                top: 0;
                /*right: 0;*/
                line-height: 45px;
                padding: 0px 15px 0px 15px;
                color: #fff;
                border: 0;
                font-size: 1.4em;
                font-weight: bold;
                cursor: pointer;
                outline: none;
                z-index: 10000000000000;
            }

            .cross {
                background: none;
                position: absolute;
                top: 0px;
                /*right: 0;*/
                padding: 0px 15px 0px 15px;
                color: #fff;
                border: 0;
                font-size: 3em;
                line-height: 65px;
                font-weight: bold;
                cursor: pointer;
                outline: none;
                z-index: 10000000000000;
            }


        </style>

    </head>
    <body>
        <header>
            <img src="989385_1003072359738303_974269120_o.jpg" class="img-rounded" id="img2" width=150px height=50px>
            <button class="hamburger">&#9776;</button>
            <button class="cross">&#735;</button>
        </header>
        <div class="menu">
            <ul>
                <a href="/page_travel"><li>Attraction</li></a>
                <a href="#"><li>Restaurant</li></a>
                <a href="#"><li>Event</li></a>
                <a href="#"><li>LINK FOUR</li></a>
                <a href="#"><li>LINK FIVE</li></a>
            </ul>
        </div>
        <div class="row">
            <div class="col-xs-3"></div>
            <div class="col-xs-4"></div>
            <div class="col-xs-5 btn-group center-block">
                <button type="button" class="btn btn-link btn-xs" style="font-size: 14px; right: 0;">Login</button>
                <button type="button" class="btn btn-link btn-xs" style="font-size: 14px; right: 0;">Register</button>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3"></div>
            <form method="post" action="/search">
                {!! csrf_field() !!}
                <div class="col-xs-6 inline-block">
                    <input type="text" class="form-control center-block" style="opacity: 0.7" id="search" placeholder="Search" onkeydown="search()">

                </div>
            </form>
            <div class="col-xs-3"></div>
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
