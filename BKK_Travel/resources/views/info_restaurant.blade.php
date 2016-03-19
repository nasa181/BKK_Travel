@extends('master')
@section('center_page')
    <div class="row">
        <div class="col-sm-12"><span>{{$item->title}}</span></div>
        <div class="col-sm-12"><img src="{{$photo->photo_url}}" class="img-rounded center-block"></div>
    </div>
    <div class="row well center-block">
        <div class="col-sm-12"><span>{{$res->price_range}}</span></div>
        <div class="col-sm-12"><span>{{$item->tel}}</span></div>
        <div class="col-sm-12"><span>{{$res->oc_time}}</span></div>
    </div>


@stop