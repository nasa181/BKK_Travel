@extends('master')
@section('center_page')
    <div class="col-md-4 col-xs-12">
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
    <ul class="pager">
        <li class="previous"><a href="../page_travel/list_of_travel/($page-1)">Previous</a></li>
        <li class="next"><a href="../page_travel/list_of_travel/($page+1)">Next</a></li>
    </ul>
    <a href="/page_restaurant/create_new_attraction"><<button class="btn btn-success">>Add new attraction</button></a>
@stop