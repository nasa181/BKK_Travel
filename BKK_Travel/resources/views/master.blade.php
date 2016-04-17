<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">


        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <!--  jQuery -->
        {{--<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>--}}

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <!-- font -->
        <link href='https://fonts.googleapis.com/css?family=Kanit:500,700&subset=thai,latin' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

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
            /*-----------------Global-setting----------*/
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                /*display: table;*/
                font-weight: 100;
                font-family: 'Kanit', sans-serif;
                color: white;
                background-color: #796c6c;
            }
            a{
                color: #2e6da4;
            }
            a:hover{
                color: #5bc0de;
            }
            textarea{
                resize: vertical;
            }
            /*---------------item_page----------*/
            .shadow-text{
                text-shadow: 1px 1px black ;
            }
            .title-name{
                font-family: 'Kanit',sans-serif;
                color: white;
                white-space: nowrap;
            }
            @media only screen  {
            .image-size{
                height: 230px;
            }
            .image-size-half{
                height: 115px;
            }
            .head-title{
                font-size: 180%;
                text-align: center;
            }
            .solidborder{

            }
            .padding{
                padding: 5px;
            }

            }
            @media only screen and (min-width : 992px) {
            .solidborder{
                border: solid white 3px;
            }
            .padding{
                padding: 40px 20px;
            }
            .outest-border{
                margin: 10px 30px;
            }
            .image-size{
                height: 380px;
            }
            .image-size-half{
                height: 190px;
            }
            .head-title{
                font-size: 340%;
                text-align: left;

            }
            }
            .info-background {
                -webkit-filter: blur(5px);
                -moz-filter: blur(5px);
                -o-filter: blur(5px);
                -ms-filter: blur(5px);
                filter: blur(5px);
            }
            /*--------------register_page-------------*/
            .datepicker.dropdown-menu {
                background-color:#5e5e5e;
            }
            /*----------item_description-box----------*/
            .head_item_description {
                font-family: 'Kanit', sans-serif;
                color: white;
            }
            .item_description span,.item_description a{
                font-family: 'Kanit', sans-serif;
                color: white;

            }
            .item_description-box {
                margin: 10px;
                background: black;
            }
            /*-----------review-box-------------------*/
            #panel{
                display: none;
            }
            @media only screen{
                .left-right{
                    text-align: right;
                }
            }
            @media only screen and (min-width : 992px) {
                .left-right{
                    text-align: left;
                }
            }
            /*----------------------------------------*/

            html, body {
                height: 100%;
            }


            .content {
                text-align: center;
                display: inline-block;
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
            .serif {
                font-family: "Times New Roman", Times, serif;
                color: white;

            }





        </style>

    </head>
    <body>
    <div class="container-fluid outest-border">
        <div style="margin-top: 70px">
        <div class="col-xs-12">
        <nav class="navbar navbar-inverse navbar-fixed-top" style="">
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
                        {{--{!! csrf_field() !!}--}}
                        <div class="form-group input-group">
                            <input type="text" class="form-control" name="in_search" placeholder="Search..">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
<<<<<<< HEAD
{{--                        @if($user)
=======
                        @if(!is_null($user))
>>>>>>> c12d6ab3445979786123110103479dcb4d7da9a6
                            <li><a href="/view_profile" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-user"></span> Account</a></li>
                            <li><a href="/logout"><span class="glyphicon"></span> Logout</a></li>
                        @else
                            <li><a href="#loginModal" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <li><a href="/register_page"><span class="glyphicon"></span> Sign Up</a></li>
                        @endif--}}
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home</a></li>
                        <li><a href="/page_travel/list_of_travel/1">Attraction</a></li>
                        <li><a href="/page_restaurant/list_of_restaurant/1">Restaurant</a></li>
                        <li><a href="#">Event</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="loginModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: cornflowerblue">
                        <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                        <h2 class="modal-title" style="color: #ffffff">Login</h2>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/login">
                            <p>Email</p>
                            <input type="text" class="form-control" name="in_email" placeholder="Email..">
                            <p>Password</p>
                            <input type="password" class="form-control" name="in_password" placeholder="Password..">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default">Login</button>
                            </div>
                        </form>
                        {{--<a href="/register_page"><button type="button" class="btn btn-default" data-dismiss="modal">Sign Up</button></a>--}}
                    </div>
                </div>

            </div>
        </div>


        @yield('center_page')
        <div class="row col-xs-12" style="margin-top:15px"></div>
    </div>
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
