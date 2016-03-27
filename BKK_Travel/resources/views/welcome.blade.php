@extends('master')
@section('center_page')
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><img src="/cooltext165456723410492.png" class="img-rounded center-block" onclick="page_travel()" id="img1" width=75%></div>
        <div class="col-sm-4"></div>
    </div>

    @foreach($attraction as $attr)
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="top well">
                    <img src="{{$attr->photo_url}}" class="img-rounded" width=96px height=96px style="float: left">
                    <div class="head" style="padding-right: 20px;margin: 0 0 0 104px;line-height: 20px"><a href="/page_travel/info/{{$attr->item_id}}"><span><h4>{{$attr->title}}</h4></span></a></div>
                    <div class="text-info" style="margin: 0 0 0 104px"><span>Cost:   {{$attr->entrance_fee}}</span></div>
                    <div class="text-info" style="margin: 0 0 0 104px"><span>{{$attr->street_address}}</span></div>
                    <div class="text-info" style="margin: 0 0 0 104px"><span>{{$attr->hint}}</span></div>
                    <div class="text-info" style="margin: 0 0 0 104px"><span>Duration:   {{$attr->oc_time}}</span></div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    @endforeach
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><img src="/cooltext165455489048438.png" class="img-rounded center-block" id="img2" width=75%></div>
        <div class="col-sm-4"></div>
    </div>

    @foreach($restaurant as $res)
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                    <div class="top well">
                        <img src="{{$res->photo_url}}" class="img-rounded" width=96px height=96px style="float: left">
                        <div class="head" style="padding-right: 20px;margin: 0 0 0 104px;line-height: 20px"><a href="/page_restaurant/info/{{$res->item_id}}"><span><h4>{{$res->title}}</h4></span></a></div>
                        <div class="text-info" style="margin: 0 0 0 104px"><span>{{$res->food_type}}</span></div>
                        <div class="text-info" style="margin: 0 0 0 104px"><span>{{$res->build}}</span></div>
                        <div class="text-info" style="margin: 0 0 0 104px"><span>{{$res->hint}}</span></div>
                    </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    @endforeach

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"><img src="/cooltext165462709275958.png" class="img-rounded center-block" id="img3" width=75%></div>
        <div class="col-sm-4"></div>
    </div>
    <script>
        function page_travel(){
            location.href='../page_travel/list_of_travel/0';
        }
    </script>
@stop