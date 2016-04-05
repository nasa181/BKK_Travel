@extends('master')
@section('center_page')
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <a href="/page_travel/list_of_travel/0"><h1 class="serif">TRAVEL</h1></a>
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
            <a href="/page_restaurant/list_of_restaurant/0"><h1 class="serif">RESTAURANT</h1></a>
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
            <h1 class="serif">EVENT</h1>
        </div>
    </div>


@stop