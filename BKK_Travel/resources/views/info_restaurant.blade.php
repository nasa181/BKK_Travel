@extends('master')
@section('center_page')
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="margin: auto"><span>{{$item->title}}</span></div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-12"><img src="{{$photo->photo_url}}" class="img-rounded center-block"></div>
    </div>

    <div class="row well center-block">
        <div class="col-sm-12"><span>{{$res->price_range}}</span></div>
        <div class="col-sm-12"><span>{{$item->tel}}</span></div>
        <div class="col-sm-12"><span>{{$res->oc_time}}</span></div>
    </div>
    <a href="/page_all/create_review/{{$res->link_item_id}}"><button class="btn btn-success">Review</button></a>
    @foreach($review as $rev)
        <div class="row">
            <img src="{{$rev->photo_url}}" class="img-rounded" width=96px height=96px style="float: left">
            <div class="head" style="padding-right: 20px;margin: 0 0 0 104px;line-height: 20px"><a href="/page_restaurant/info/{{$res->item_id}}"><span><h4>{{$res->title}}</h4></span></a></div>
            <div class="text-info" style="margin: 0 0 0 104px"><span>{{$res->food_type}}</span></div>
            <div class="text-info" style="margin: 0 0 0 104px"><span>{{$res->build}}</span></div>
            <div class="text-info" style="margin: 0 0 0 104px"><span>{{$res->hint}}</span></div>
        </div>
    @endforeach


@stop