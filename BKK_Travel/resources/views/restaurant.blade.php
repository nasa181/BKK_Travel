@extends('master')
@section('center_page')

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
    <ul class="pager">
        <li class="previous"><a href="../page_restaurant/list_of_restaurant/($page-1)">Previous</a></li>
        <li class="next"><a href="../page_restaurant/list_of_restaurant/($page+1)">Next</a></li>
    </ul>
    <a href="/page_restaurant/create_new_restaurant"><<button class="btn btn-success">>Add new restaurant</button></a>
@stop