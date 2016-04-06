@extends('master')
@section('center_page')
    <div class="container-fluid" style="margin:40px 10px">
    {{--article-section--}}
    <div class="row" >
        <div class="col-xs-12" style="background: none">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <a class="head_item_description " href="#"><h1>ARTICLE</h1></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                {{--left-article--}}
                <div class="col-md-6 col-xs-12">
                    @for($i=0;$i<2;$i++)
                    <div class="row item_description " style="margin:10px 0px;height: 120px;background: url('http://thailanddrone.com/wp-content/uploads/wppa/44/5.jpg?ver=10')  bottom ;background-size:cover;background-attachment: fixed ">
                        <div class="col-xs-12" style=" text-shadow: 1px 1px black;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="head item_description" style=""><a href="#"><span><h4>เส้นทางไหว้พระ 9 วัดรอบกรุง</h4></span></a></div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="text-info" style="text-align: right;margin: 55px 0px 0px 0px"><span>บทความท่องเที่ยว</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
                {{--right-article--}}
                <div class="col-md-6 col-xs-12">
                    @for($i=0;$i<2;$i++)
                    <div class="row item_description " style="margin:10px 0px;background: green;height: 120px;background: url('http://thailanddrone.com/wp-content/uploads/wppa/44/5.jpg?ver=10') bottom ;background-size:cover;background-attachment: fixed ">
                        <div class="col-xs-12" style=" text-shadow: 1px 1px black;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="head item_description" style=""><a href="#"><span><h4>เส้นทางไหว้พระ 9 วัดรอบกรุง</h4></span></a></div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="text-info" style="text-align: right;margin: 55px 0px 0px 0px"><span>บทความท่องเที่ยว</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="">
        {{--attraction-section--}}
        <div class="col-md-4 col-xs-12" style="background: none">
            <div class="row">
                <div class=" col-md-12 col-xs-12">
                    <a class="head_item_description " href="/page_travel/list_of_travel/0"><h1>ATTRACTION</h1></a>
                </div>
            </div>
            @foreach($attraction as $attr)
            <div class="row item_description " style="margin:10px 0px;background: green;height: 120px;background: url({{$attr->photo_url}}) center ;background-size:cover ">
                {{--<div class="col-md-4 col-xs-4 " style="">
                    <div></div>
                    <img src="{{$attr->photo_url}}" class="img-rounded" style=" width:auto;height: auto">
                </div>--}}
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
        </div>

        {{--restaurant-section--}}
        <div class="col-md-4 col-xs-12" style="background: none">
            <div class="row">
                <div class=" col-md-12 col-xs-12 ">
                    <a class="head_item_description " href="/page_restaurant/list_of_restaurant/0"><h1>RESTAURANT</h1></a>
                </div>
            </div>

            @foreach($restaurant as $res)
                <div  class="row item_description" style="margin:10px 0px;background: green;height: 120px;overflow:hidden;background: url({{$res->photo_url}}) center ;background-size:cover ">
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
        </div>

        {{--event-section--}}
        <div class="col-md-4 col-xs-12" style="background: none">
            <div class="row">
                <div class=" col-md-12 col-xs-12 ">
                    <a class="head_item_description " href=""><h1>EVENT</h1></a>
                </div>
            </div>

        </div>

    </div>

    </div>
@stop