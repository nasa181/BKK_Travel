@extends('master')
@section('center_page')
    <div class="row">
        <div class=" col-xs-12">
            <h1 class="head-title">Restaurant List</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php
                $restaurant1 = array();
                $restaurant2 = array();
                if(sizeof($restaurant)%2==0) $mid = intval(sizeof($restaurant)/2);
                else  $mid = intval(sizeof($restaurant)/2)+1;
                for($i=0;$i<$mid;$i++){
                    array_push($restaurant1,$restaurant[$i]);
                }
                for($i=$mid;$i<sizeof($restaurant);$i++){
                    array_push($restaurant2,$restaurant[$i]);
                }
            ?>
            @foreach($restaurant1 as $res)
            <?php
            if ($res->title_picture == "" || $res->title_picture == null) $background = "green" ;
            else  $background = "url('" . url($res->title_picture) . "')";
            ?>
                <a href="/page_restaurant/info/{{$res->item_id}}">
                <div  class="row item_description" style="overflow:hidden;margin:10px 0px;height: 120px;overflow:hidden;background: {{$background}}  center ;background-size:cover; ">
                    <div class="col-md-12 col-xs-12" style=" text-shadow: 1px 1px black;">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="head item_description" style=""><span><h4>{{$res->title}}</h4></span></div>
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
                </a>
            @endforeach
        </div>
        <div class="col-md-6">
            @foreach($restaurant2 as $res)
                <?php
                    if ($res->title_picture == "" || $res->title_picture == null) $background = "green" ;
                    else  $background = "url('" . url($res->title_picture) . "')";
                ?>
                <div  class="row item_description" style="margin:10px 0px;height: 120px;overflow:hidden;background: {{$background}} center ;background-size:cover;">
                    <div class="col-md-12 col-xs-12" style=" text-shadow: 1px 1px black;">
                        <div class="row">
                            <div class="col-xs-12" >
                                <div class="head_item_description" style=""><a href="/page_restaurant/info/{{$res->item_id}}"><span><h4>{{$res->title}}</h4></span></a></div>
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
    </div>
    <div class="row " >
        <div class="col-xs-12">
            <ul class="pager" style="margin: 0px">
                    <li class="previous"><a href="/page_restaurant/list_of_restaurant/{{($page-1)}}">Previous</a></li>
                    <span class="hidden-xs">
                    <li><a href="/page_restaurant/list_of_restaurant/1">First</a></li>
                    <?php
                        for($i=$page-5;$i<$page+5;$i++){
                            if($i<1 || $i>$last_page) continue;
                            if ($i==$page){
                                echo '<li><a style="background: #337ab7;color: white;" href="/page_restaurant/list_of_restaurant/';
                                echo $i ;
                                echo '"> ';
                                echo $i ;
                                echo '</a></li>';
                            }
                            else {
                                echo '<li><a href="/page_restaurant/list_of_restaurant/';
                                echo $i ;
                                echo '"> ';
                                echo $i ;
                                echo '</a></li>';
                            }
                        }
                    ?>
                    <li><a href="/page_restaurant/list_of_restaurant/{{$last_page}}">Last</a></li>
                    </span>
                    <li class="next"><a href="/page_restaurant/list_of_restaurant/{{($page+1)}}">Next</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <hr>
        </div>
    </div>

    <div class="row col-xs-12 ">
        <a href="/page_restaurant/create_new_restaurant"><button class="btn btn-success">Add new restaurant</button></a>
    </div>
@stop