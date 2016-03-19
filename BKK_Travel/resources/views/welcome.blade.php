@extends('master')
@section('center_page')
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><img src="cooltext165456723410492.png" class="img-rounded center-block" onclick="page_travel()" id="img1" width=75%></div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><img src="cooltext165455489048438.png" class="img-rounded center-block" id="img2" width=75%></div>
        <div class="col-sm-4"></div>
    </div>

    @foreach($item as $it)
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <a href="/page_restaurant/info/{{$it->item_id}}">
                <div class="well"><img src="{{$it->photo_url}}" class="img-rounded"><span><h2>{{$it->title}}</h2></span></div>
                </a>
            </div>
            <div class="col-sm-4"></div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><img src="cooltext165462709275958.png" class="img-rounded center-block" id="img3" width=75%></div>
        <div class="col-sm-4"></div>
    </div>
    <script>
        function page_travel(){
            location.href='../page_travel';
        }
    </script>
@stop