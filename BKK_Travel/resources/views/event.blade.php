@extends('master')
@section('center_page')
    <?php $current_user = Session::get('user') ?>
    {{--{{var_dump($event)}};--}}
    <div class="row">
        <div class=" col-xs-12">
            <h1 class="head-title">Event List</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            @if($event!=null)
                <?php
                $event1 = array();
                $event2 = array();
                for($i=0;$i<intval(sizeof($event)/2);$i++){
                    array_push($event1,$event[$i]);
                }
                for($i=intval(sizeof($event)/2);$i<sizeof($event);$i++){
                    array_push($event2,$event[$i]);
                }
                ?>
                @foreach($event1 as $eve)
                    <?php
                    if ($eve->title_picture == "" || $eve->title_picture == null) $background = "green" ;
                    else  $background = "url('" . url($eve->title_picture) . "')";
                    ?>
                    <div class="row item_description " style="overflow:hidden;margin:10px 0px;height: 120px;background: {{$background}} center ;background-size:cover ">
                        <div class="col-xs-12" style=" text-shadow: 1px 1px black;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="head item_description" style=""><a href="/page_event/info/{{$eve->item_id}}"><span><h4>{{$eve->title}}</h4></span></a></div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="text-info" style="margin: 0px"><span>{{$eve->start_date}} to {{$eve->end_date}}</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="text-info " style="margin: 0px"><span>{{$eve->build}}</span></div>
                                </div>
                                <div class="col-xs-12" >
                                    <div class="text-info " style="margin: 0px"><span>{{$eve->hint}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="col-md-6">
            @if($event!=null)
                @foreach($event2 as $eve)
                    <?php
                    if ($eve->title_picture == "" || $eve->title_picture == null) $background = "green" ;
                    else  $background = "url('" . url($eve->title_picture) . "')";
                    ?>
                    <div class="row item_description " style="margin:10px 0px;height: 120px;background: {{$background}} center ;background-size:cover ">
                        <div class="col-xs-12" style=" text-shadow: 1px 1px black;">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="head item_description" style=""><a href="/page_event/info/{{$eve->item_id}}"><span><h4>{{$eve->title}}</h4></span></a></div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="text-info" style="margin: 0px"><span>{{$eve->start_date}} to {{$eve->end_date}}</span></div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="text-info " style="margin: 0px"><span>{{$eve->build}}</span></div>
                                </div>
                                <div class="col-xs-12" >
                                    <div class="text-info " style="margin: 0px"><span>{{$eve->hint}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="row" >
        <div class="col-xs-12">
            <ul class="pager" style="margin: 0px">
                <li class="previous"><a href="/page_event/list_of_event/{{($page-1)}}">Previous</a></li>
                    <span class="hidden-xs">
                    <li><a href="/page_event/list_of_event/1">First</a></li>
                        <?php
                        for($i=$page-5;$i<$page+5;$i++){
                            if($i<1 || $i>$last_page) continue;
                            if ($i==$page){
                                echo '<li><a style="background: #337ab7;color: white;" href="/page_event/list_of_event/';
                                echo $i ;
                                echo '"> ';
                                echo $i ;
                                echo '</a></li>';
                            }
                            else {
                                echo '<li><a href="/page_event/list_of_event/';
                                echo $i ;
                                echo '"> ';
                                echo $i ;
                                echo '</a></li>';
                            }
                        }
                        ?>
                        <li><a href="/page_event/list_of_event/{{$last_page}}">Last</a></li>
                    </span>
                <li class="next"><a href="/page_event/list_of_event/{{($page+1)}}">Next</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <hr>
        </div>
    </div>
    @if(isset($current_user) && $current_user[4]=="Admin")
        <div class="row col-xs-12 ">
            <a href="/page_event/create_new_event"><button class="btn btn-success">Add new event</button></a>
        </div>
    @else
        <div class="row col-xs-12 ">
            <a href="#loginModal" data-toggle="modal" data-target="#loginModal"><button class="btn btn-success">Login as Admin to add new event</button></a>
        </div>
    @endif
@stop