<!DOCTYPE html>

<html>
    <head>
        <title>BKKTravel-Beta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
       {{-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">--}}
        <link rel="stylesheet" href="\bootstrap-3.3.6-dist\css\bootstrap.min.css">
        <!-- jQuery library -->
        {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>--}}
        <script src="\js\jquery-2.2.3.min.js"></script>
        <!-- Latest compiled JavaScript -->
        {{--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
        <script src="\bootstrap-3.3.6-dist\js\bootstrap.min.js"></script>
        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
        <!-- font -->
        <link href='https://fonts.googleapis.com/css?family=Kanit:500,700&subset=thai,latin' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <!-- toggle button-->
        {{--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>--}}
        <link href="\bootstrap-toggle-master\css\bootstrap-toggle.min.css" rel="stylesheet">
        <script src="\bootstrap-toggle-master\js\bootstrap-toggle.min.js"></script>
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
            /*-----------------Global-----------------*/
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
            @media only screen{
                .bottom_bar{
                    height:100px;
                }
                .hide{
                    visibility: hidden;
                }
            }
            @media only screen and (min-width : 992px) {
                .bottom_bar{
                    height:180px;
                }
                .hide{
                    visibility: visible;
                }
                .desktop-hidden{
                    display: none;
                }
            }
            /*-----------------Item_page-----------------*/
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
                    min-height: 230px;
                }
                .image-size-half{
                    min-height: 115px;
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
                .image-size-2{
                    min-height: 100px;
                }
                #address_box{
                     padding: 10px 5px;
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
                    min-height: 380px;
                }
                .image-size-half{
                    min-height: 190px;
                }
                .head-title{
                    font-size: 340%;
                    text-align: left;

                }
                .image-size-2{
                    min-height: 180px;
                }
                #address_box{
                    padding: 40px 20px;
                }
            }
            .info-background {
                -webkit-filter: blur(5px);
                -moz-filter: blur(5px);
                -o-filter: blur(5px);
                -ms-filter: blur(5px);
                filter: blur(5px);
            }
            /*-----------------register_page-----------------*/
            .datepicker.dropdown-menu {
                background-color:#5e5e5e;
            }
            /*-----------------item_description_box-----------------*/
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
            /*-----------------review_box-----------------*/
            #panel{
                display: none;
            }
            @media only screen{
                .left-right{
                    text-align: right;
                }
                .height-adjust{
                    height: auto;
                }
            }
            @media only screen and (min-width : 992px) {
                .left-right{
                    text-align: left;
                }
                .height-adjust{
                    height: 130px;
                }
            }
            /*-------------profile-page-------------*/
            tbody tr:hover {
                background-color: #2e3436;
            }
            /*----------------------------------*/
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
            .glyphicon:hover{
                cursor: pointer;
            }
            .navbar-brand,
            .navbar-nav li a {
                line-height: 60px;
                height: 60px;
                padding-top: 0;
            }

        </style>
    </head>

    <body>
    <div class="container-fluid outest-border" style="">
        <div style="margin-top: 70px">
            <div class="col-xs-12">
                <nav class="navbar navbar-inverse navbar-fixed-top ">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav" style="">
                                <li><a href="/"><img src="/BKKTravelLogo.png" style="height: 60px"></a></li>
                                <li><a href="/page_travel/list_of_travel/1">Attraction</a></li>
                                <li><a href="/page_restaurant/list_of_restaurant/1">Restaurant</a></li>
                                <li><a href="/page_event/list_of_event/1">Event</a></li>
                                <li><a href="/user/ranking">Ranking</a></li>
                            </ul>
                            <form class="navbar-form navbar-right" role="search" action="/search" method="post">
                                <div class="form-group input-group">
                                    <input type="text" class="form-control" name="in_search" placeholder="Search..">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                    </span>
                                </div>
                            </form>
                            <ul class="nav navbar-nav navbar-right">
                                <?php
                                    $user = Session::get('user');
                                    if(isset($user)){
                                        $admin='';
                                        if($user[4]=="Admin") $admin="(Admin) ";
                                        echo '<li><a href="/view_profile/'.$user[5].'"><span id="profile" style="color:#ff6666">Welcome  '.$admin.$user[1].'</span></a></li>';
                                        echo '<li><a href="/logout" ><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
                                    }
                                    else {
                                        echo '<li><a href="#loginModal" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
                                        echo '<li><a href="/register_page"><span class="glyphicon"></span> Sign Up</a></li>';
                                    }
                                ?>
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
                            <input id="email" type="text" class="form-control" name="in_email" placeholder="Email..">
                            <p>Password</p>
                            <input id="password" type="password" class="form-control" name="in_password" placeholder="Password..">
                            <div class="modal-footer">
                                <a href="#" ><div href="#forgetModal" data-toggle="modal" data-target="#forgetModal" data-dismiss="modal" class="btn btn-default">Forget Password</div></a>
                                <button id="login" type="submit" class="btn btn-default">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="forgetModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="background-color: cornflowerblue">
                        <button type="button" class="close" data-dismiss="modal" style="color: #ffffff">&times;</button>
                        <h2 class="modal-title" style="color: #ffffff">Forget Password</h2>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/forgetpassword">
                            <p style="color: #000;">Enter your E-mail</p>
                            <input id="email" type="text" class="form-control" name="in_email" placeholder="email@example.com">
                            
                            <div class="modal-footer">
                                <button id="login" type="submit" class="btn btn-default">Send me password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @yield('center_page')
    </div>
    <div class="container-fluid" style="">
        <div class="row hidden-xs" style="margin-top: 40px;background: #222222;">
            <div class="col-xs-4 text-center">
                <img src="/BKKTravelLogo.png"  class="bottom_bar" style="height:220px;">
            </div>
            <div class="col-xs-8 shadow-text " style="padding: 40px 40px;">
                   <div class="row">
                       <div class="col-xs-offset-4 col-xs-8 text-center">
                           <p style="font-size:16px">Created by</p>
                       </div>
                       <div style="margin-top: 40px">
                            <div class="col-xs-4" style="font-size:14px;">
                                <p style="font-size:19px">BKK-Travel Inc.</p>
                                <p>Pathumwan 10230 Thailand</p>
                                <p>Contact us : 02-919-1188</p>
                            </div>
                           <div class="text-center">
                                <div class="col-xs-4" style="font-size: 13px;">
                                    <p style="font-size: 16px">ณัฐนัย	 อมรเทวภัทร 5631031521</p>
                                    <p>ธนวัฒน์		เค้าฉลองเคียง 5631044721</p>
                                </div>
                               <div class="col-xs-4" style="font-size: 13px">
                                   <p>ชลกานต์		กิจศิริกุล 5630118321</p>
                                   <p>วิภวานี		วัชระเดชสกุล 5631082521</p>
                                   <p>ณภัทร		เผ่าพงษ์ไพบูลย์ 5631024121</p>
                               </div>
                           </div>
                       </div>
                   </div>
            </div>
        </div>
    </div>
    <div class="container-fluid desktop-hidden" style="height: 20px">
    </div>

    <script>
        $(function(){

        });
        function logout(){
            post('/logout',null,"get");
        };
        function post(path, params, method) {
            method = method || "post"; // Set method to post by default if not specified.
            // The rest of this code assumes you are not using a library.
            // It can be made less wordy if you use one.
            var form = document.createElement("form");
            form.setAttribute("method", method);
            form.setAttribute("action", path);
            for(var key in params) {
                if(params.hasOwnProperty(key)) {
                    var hiddenField = document.createElement("input");
                    hiddenField.setAttribute("type", "hidden");
                    hiddenField.setAttribute("name", key);
                    hiddenField.setAttribute("value", params[key]);
                    form.appendChild(hiddenField);
                }
            }
            document.body.appendChild(form);
            form.submit();
        };
    </script>

    </body>
</html>
