@extends('master')
@section('center_page')
    <?php $current_user = Session::get('user') ?>
    {{--{{var_dump($attraction)}};--}}
    <div class="row">
        <div class=" col-xs-12">
            <h1 class="head-title">Attraction List</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php
                $attraction1 = array();
                $attraction2 = array();
                for($i=0;$i< intval(sizeof($attraction)/2);$i++){
                    array_push($attraction1,$attraction[$i]);
                }
                for($i=intval(sizeof($attraction)/2);$i<sizeof($attraction);$i++){
                    array_push($attraction2,$attraction[$i]);
                }
            ?>
            @foreach($attraction1 as $attr)
            <?php
                if ($attr->title_picture == "" || $attr->title_picture == null) $background = "green" ;
                else  $background = "url('" . url($attr->title_picture) . "')";
            ?>
                <a href="/page_travel/info/{{$attr->item_id}}">
                <div class="row item_description " style="overflow:hidden;margin:10px 0px;height: 120px;background: {{$background}} center ;background-size:cover ">
                    <div class="col-xs-12" style=" text-shadow: 1px 1px black;">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="head item_description" style=""><span><h4>{{$attr->title}}</h4></span></div>
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
                </a>
            @endforeach
        </div>
        <div class="col-md-6">
            @foreach($attraction2 as $attr)
                    <?php
                    if ($attr->title_picture == "" || $attr->title_picture == null) $background = "green" ;
                    else  $background = "url('" . url($attr->title_picture) . "')";
                ?>
                <a href="/page_travel/info/{{$attr->item_id}}">
                <div class="row item_description " style="margin:10px 0px;height: 120px;background: {{$background}} center ;background-size:cover ">
                    <div class="col-xs-12" style=" text-shadow: 1px 1px black;">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="head item_description" style=""><span><h4>{{$attr->title}}</h4></span></div>
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
                </a>
            @endforeach
        </div>
    </div>

    <div class="row" >
        <div class="col-xs-12">
            <ul class="pager" style="margin: 0px">
                <li class="previous"><a href="/page_travel/list_of_travel/{{($page-1)}}">Previous</a></li>
                    <span class="hidden-xs">
                    <li><a href="/page_travel/list_of_travel/1">First</a></li>
                        <?php
                        for($i=$page-5;$i<$page+5;$i++){
                            if($i<1 || $i>$last_page) continue;
                            if ($i==$page){
                                echo '<li><a style="background: #337ab7;color: white;" href="/page_travel/list_of_travel/';
                                echo $i ;
                                echo '"> ';
                                echo $i ;
                                echo '</a></li>';
                            }
                            else {
                                echo '<li><a href="/page_travel/list_of_travel/';
                                echo $i ;
                                echo '"> ';
                                echo $i ;
                                echo '</a></li>';
                            }
                        }
                        ?>
                        <li><a href="/page_travel/list_of_travel/{{$last_page}}">Last</a></li>
                    </span>
                <li class="next"><a href="/page_travel/list_of_travel/{{($page+1)}}">Next</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <hr>
        </div>
    </div>
    @if(isset($current_user))
    <div class="row col-xs-12 ">
        <a href="/page_attraction/create_new_attraction"><button class="btn btn-success">Add new attraction</button></a>
    </div>
    @else
    <div class="row col-xs-12 ">
        <a href="#loginModal" data-toggle="modal" data-target="#loginModal"><button class="btn btn-success">Login to add new attraction</button></a>
    </div>
    @endif
@stop