@extends('master')
@section('center_page')
        <div class="row well">
            @if($attraction != null)
                @foreach($attraction as $attr)
                    <a href="/page_travel/info/{{$attr->item_id}}">{{$attr->title}}</a>
                @endforeach
            @endif
            @if($restaurant != null)
                @foreach($restaurant as $res)
                    <a href="/page_restaurant/info/{{$res->item_id}}">{{$res->title}}</a>
                @endforeach
            @endif
                <div class="row col-xs-12 " style="color: #000000;">
                    <h1>Search not found</h1>
                    <p>How about adding new item for us?</p>
                </div>
            <div class="row col-xs-12 ">
                <a href="/page_attraction/create_new_attraction"><button class="btn btn-success">Add new attraction</button></a>
                <a href="/page_restaurant/create_new_restaurant"><button class="btn btn-success">Add new restaurant</button></a>
            </div>
        </div>
@stop