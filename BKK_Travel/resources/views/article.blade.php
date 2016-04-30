@extends('master')
@section('center_page')
    <?php $current_user = Session::get('user') ?>
    {{--{{var_dump($article)}};--}}
    <div class="row">
        <div class=" col-xs-12">
            <h1 class="head-title">Article List</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?php
                $article1 = array();
                $article2 = array();
                if(sizeof($article)%2==0) $mid = intval(sizeof($article)/2);
                else  $mid = intval(sizeof($article)/2)+1;
                for($i=0;$i< $mid;$i++){
                    array_push($article1,$article[$i]);
                }
                for($i=$mid;$i<sizeof($article);$i++){
                    array_push($article2,$article[$i]);
                }
            ?>
            @foreach($article1 as $art)
            <?php
                if ($art->title_picture == "" || $art->title_picture == null) $background = "green" ;
                else  $background = "url('" . url($art->title_picture) . "')";
            ?>
                <a href="/page_article/info/{{$art->article_id}}">
                <div class="row item_description " style="overflow:hidden;margin:10px 0px;height: 120px;background: {{$background}} center ;background-size:cover ">
                    <div class="col-xs-12" style=" text-shadow: 1px 1px black;">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="head item_description" style=""><span><h4>{{$art->title}}</h4></span></div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            @endforeach
        </div>
        <div class="col-md-6">
            @foreach($article2 as $art)
                    <?php
                    if ($art->title_picture == "" || $art->title_picture == null) $background = "green" ;
                    else  $background = "url('" . url($art->title_picture) . "')";
                ?>
                <a href="/page_article/info/{{$art->item_id}}">
                <div class="row item_description " style="margin:10px 0px;height: 120px;background: {{$background}} center ;background-size:cover ">
                    <div class="col-xs-12" style=" text-shadow: 1px 1px black;">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="head item_description" style=""><span><h4>{{$art->title}}</h4></span></div>
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
                <li class="previous"><a href="/page_article/list_of_article/{{($page-1)}}">Previous</a></li>
                    <span class="hidden-xs">
                    <li><a href="/page_article/list_of_article/1">First</a></li>
                        <?php
                        for($i=$page-5;$i<$page+5;$i++){
                            if($i<1 || $i>$last_page) continue;
                            if ($i==$page){
                                echo '<li><a style="background: #337ab7;color: white;" href="/page_article/list_of_article/';
                                echo $i ;
                                echo '"> ';
                                echo $i ;
                                echo '</a></li>';
                            }
                            else {
                                echo '<li><a href="/page_article/list_of_article/';
                                echo $i ;
                                echo '"> ';
                                echo $i ;
                                echo '</a></li>';
                            }
                        }
                        ?>
                        <li><a href="/page_article/list_of_article/{{$last_page}}">Last</a></li>
                    </span>
                <li class="next"><a href="/page_article/list_of_article/{{($page+1)}}">Next</a></li>
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
        <a href="/page_article/create_new_article"><button class="btn btn-success">Add new article</button></a>
    </div>
    @else
    <div class="row col-xs-12 ">
        <a href="#loginModal" data-toggle="modal" data-target="#loginModal"><button class="btn btn-success">Login to add new article</button></a>
    </div>
    @endif
@stop