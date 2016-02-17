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
                background-image: url("Los-Angeles-beach-at-night.jpg");
                background-attachment: fixed;
                background-position: 15% 10%;
                background-color: black;
                opacity: 0.5;
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

        </style>
    </head>
    <body>

        <div class="row">
            <div class="col-xs-3"></div>
            <div class="col-xs-4"></div>
            <div class="col-xs-5 btn-group center-block">
                <button type="button" class="btn btn-link btn-xs" style="font-size: 14px">Login</button>
                <button type="button" class="btn btn-link btn-xs" style="font-size: 14px">Register</button>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3"></div>
            <form method="post" action="/search">
            <div class="col-xs-6 inline-block">
                <input type="text" class="form-control center-block" style="opacity: 0.7" id="search" placeholder="Search">
                {{--<button type="submit" class="btn btn-default">Submit</button>--}}
            </div>
            </form>
            <div class="col-xs-3"></div>
        </div>
        @yield('center_page')



    </body>
</html>
