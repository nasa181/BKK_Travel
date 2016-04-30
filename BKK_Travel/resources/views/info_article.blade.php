@extends('master')
@section('center_page')
    <?php
        $current_user=Session::get('user');
        if(!isset($avg_rating)) $avg_rating=0.0;
        if(!isset($rating_count)) $rating_count=0;
    ?>
    <?php
      /*if(isset($current_user)) echo var_dump($current_user);*/
    ?>
    <div class="row padding solidborder" style="background: none;border-radius: 10px;">

        <div class="col-xs-12">
            @if(isset($current_user)&&( $current_user[4]=="Admin"))
            <div class="row">
                <div class= "col-md-offset-10 col-md-2 col-xs-offset-8 col-xs-4"style="text-align: right">
                    <div><a href="/edit_attraction/{{$item->item_id}}"><button class="form-control btn-warning btn">edit</button></a></div>
                </div>
            </div>
            @endif
            @if(isset($current_user) && $current_user[4]=="Admin")
            <div class="row" style="margin-top: 10px">
                <div class= "col-md-offset-10 col-md-2 col-xs-offset-8 col-xs-4"style="text-align: right">
                    <div><button onclick="remove_item()" class="form-control btn-danger btn">remove</button></div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="head-title" style="margin-bottom: 20px">{{$art->title}}</h1>
                </div>
            </div>
            <?php
                $background = "green" ;
                if($art->title_picture !=""){
                    $background = "url('" . url($art->title_picture) . "')";
                }
            ?>
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 20px;">
                    <div class="image-size"  style="position:relative;/*box-shadow: 0 0px 15px 0 rgba(0, 0, 0, 0.45), 0 0px 30px 0 rgba(0, 0, 0, 0.15);*/border-radius:20px;background:{{$background}} center; background-size: cover;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12"  style="margin-bottom: 20px;" >
                    <div class="" style="padding: 40px 20px;border: dashed #D4EF4C;border-radius: 20px;/*background: rgba(212,239,76,0.2)*/;">
                        <div class="text-right" style="float:right"><button onclick="" class="btn btn-warning">Report</button></div>
                        <div class="shadow-text">
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>{!!$art->content!!} </span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop