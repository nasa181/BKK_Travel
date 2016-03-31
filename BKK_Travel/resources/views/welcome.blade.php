@extends('master')
@section('center_page')
    <div class="col-md-4 col-xs-12">
        <img src="/cooltext165456723410492.png" class="img-rounded center-block" onclick="page_travel()" id="img1" width=75%>
        @foreach($attraction as $attr)
            <div class="row">
                <div class="top">
                    <img src="{{$attr->photo_url}}" class="img-rounded" width=96px height=96px style="float: left">
                    <div class="head" style="padding-right: 20px;margin: 0 0 0 104px;line-height: 20px"><a href="/page_travel/info/{{$attr->item_id}}"><span><h4>{{$attr->title}}</h4></span></a></div>
                    <div class="text-info" style="margin: 0 0 0 104px"><span>Cost:   {{$attr->entrance_fee}}</span></div>
                    <div class="text-info" style="margin: 0 0 0 104px"><span>Duration:   {{$attr->oc_time}}</span></div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="col-md-4 col-xs-12">
        <img src="/cooltext165455489048438.png" class="img-rounded center-block" onclick="page_restaurant()" id="img2" width=75%>
        @foreach($restaurant as $res)
            <div class="row">
                <img src="{{$res->photo_url}}" class="img-rounded" width=96px height=96px style="float: left">
                <div class="head" style="padding-right: 20px;margin: 0 0 0 104px;line-height: 20px"><a href="/page_restaurant/info/{{$res->item_id}}"><span><h4>{{$res->title}}</h4></span></a></div>
                <div class="text-info" style="margin: 0 0 0 104px"><span>{{$res->food_type}}</span></div>
                <div class="text-info" style="margin: 0 0 0 104px"><span>{{$res->build}}</span></div>
                <div class="text-info" style="margin: 0 0 0 104px"><span>{{$res->hint}}</span></div>
            </div>
        @endforeach
    </div>

    <div class="col-md-4 col-xs-12">
        <img src="/cooltext165462709275958.png" class="img-rounded center-block" id="img3" width=75%>
    </div>

    <script>
        function page_travel(){
            location.href='../page_travel/list_of_travel/0';
        }
        function page_restaurant(){
            location.href='../page_restaurant/list_of_restaurant/0';
        }
    </script>
@stop