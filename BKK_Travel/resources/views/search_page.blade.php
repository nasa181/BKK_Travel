@extends('master')
@section('center_page')
        <div class="row well">
            @if($attraction != null)
                @foreach($attraction as $attr)
                    {{--<a href="/page_travel/info/{{$attr->item_id}}">{{$attr->title}}</a>--}}
                    <div class="row item_description " style="overflow:hidden;margin:10px 0px;background: green;height: 120px;background: url({{$attr->photo_url}}) center ;background-size:cover ">
                        <div class="col-xs-12" style=" text-shadow: 1px 1px black;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="head item_description" style=""><a href="/page_travel/info/{{$attr->item_id}}"><span><h4>{{$attr->title}}</h4></span></a></div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="text-info" style="margin: 0px"><span>Price:   {{$attr->entrance_fee}}</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="text-info " style="margin: 0px"><span>Duration:   {{$attr->oc_time}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @if($restaurant != null)
                @foreach($restaurant as $res)
                    {{--<a href="/page_restaurant/info/{{$res->item_id}}">{{$res->title}}</a>--}}
                        <div  class="row item_description" style="overflow:hidden;margin:10px 0px;background: green;height: 120px;overflow:hidden;background: url({{$res->title_picture}}) center ;background-size:cover ">
                            <div class="col-md-12 col-xs-12" style=" text-shadow: 1px 1px black;">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="head item_description" style=""><a href="/page_restaurant/info/{{$res->item_id}}"><span><h4>{{$res->title}}</h4></span></a></div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="text-info" style="margin: 0px"><span>{{$res->food_type}}</span></div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="text-info " style="margin: 0px"><span>{{$res->build}}</span></div>
                                    </div>
                                    <div class="col-xs-12" >
                                        <div class="text-info " style="margin: 0px"><span>{{$res->hint}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            @endif
                <div class="row col-xs-12 " style="color: #000000;">
                    @if($restaurant == null && $attraction == null)
                    <h1>Search not found</h1>
                    @endif
                        <p>How about adding new item for us?</p>

                </div>
            <div class="row col-xs-12 ">
                <a href="/page_attraction/create_new_attraction"><button class="btn btn-success">Add new attraction</button></a>
                <a href="/page_restaurant/create_new_restaurant"><button class="btn btn-success">Add new restaurant</button></a>
            </div>
        </div>
@stop