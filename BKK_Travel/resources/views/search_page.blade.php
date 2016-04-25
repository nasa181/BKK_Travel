@extends('master')
@section('center_page')
    <?php $current_user = Session::get('user') ?>
    {{--{{var_dump($attraction)}};--}}
    <div class="row">
        <div class=" col-xs-12">
            <h1 class="head-title">Search List</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        @foreach($attraction as $attr)
            <?php
            if ($attr->title_picture == "" || $attr->title_picture == null) $background = "green" ;
            else  $background = "url('" . url($attr->title_picture) . "')";
            ?>
            <div class="col-md-6" style="padding: 0px 20px">
                <div class="item_description " style="padding:10px;overflow:hidden;margin:10px 0px;height: 120px;background: {{$background}} center ;background-size:cover ">
                    <div class="row" style=" text-shadow: 1px 1px black;">
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
        @foreach($restaurant as $res)
        <?php
        if ($res->title_picture == "" || $res->title_picture == null) $background = "green" ;
        else  $background = "url('" . url($res->title_picture) . "')";
        ?>
            <div class="col-md-6" style="padding: 0px 20px">
                <div  class=" item_description" style="padding:10px;overflow:hidden;margin:10px 0px;background: green;height: 120px;overflow:hidden;background: {{$background}}  center ;background-size:cover ">
                    <div class="row" style=" text-shadow: 1px 1px black;">
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
    @if($restaurant == null && $attraction == null)
        <h2 style="color: red;">Search not found</h2>

    @endif
    <div class="row">
        <div class="col-xs-12">
            <hr>
        </div>
    </div>
    <span>How about sharing your new experience?</span><h3 style="color: blue">Let's add new item</h3>
    @if(isset($current_user))
            <div class="row col-xs-12 ">
                <a href="/page_attraction/create_new_attraction"><button class="btn btn-success">Add new attraction</button></a>
            </div>
            <div class="row col-xs-12 " style="margin-top: 15px">
                <a href="/page_restaurant/create_new_restaurant"><button class="btn btn-success">Add new restaurant</button></a>
            </div>
    @else
        <div class="row col-xs-12 ">
            <a href="#loginModal" data-toggle="modal" data-target="#loginModal"><button class="btn btn-success">Login to add new item</button></a>
        </div>
    @endif
@stop