@extends('master')
@section('center_page')
    <?php
    use Illuminate\Support\Facades\Auth;
        if (Auth::check()) {
            print_r($user);
        } else {
            echo "<h5>you're using as guest , please login.</h5>";
            echo '<div class="row"> <div class="col-xs-12"><hr></div></div>';
        }
    ?>
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

    <div class="row">
        <div class="col-xs-12"> <hr></div>
    </div>

    <div class="row">
        {{--attraction-section--}}
        <div class="col-md-4 col-xs-12" style="background: none">
            <div class="row">
                <div class=" col-md-12 col-xs-12">
                    <a class="head_item_description " href="/page_travel/list_of_travel/1"><h1>ATTRACTION</h1></a>
                </div>
            </div>

            @foreach($attraction as $attr)
            <div class="row item_description " style="margin:10px 0px;background: green;height: 120px;background: url({{$attr->title_picture}}) center ;background-size:cover ">
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
                    <a class="head_item_description " href="/page_restaurant/list_of_restaurant/1"><h1>RESTAURANT</h1></a>
                </div>
            </div>

            @foreach($restaurant as $res)
                <div  class="row item_description" style="margin:10px 0px;background: green;height: 120px;overflow:hidden;background: url({{$res->title_picture}}) center ;background-size:cover ">
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
                    <a class="head_item_description " href="#"><h1>EVENT</h1></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12"> <hr></div>
    </div>
    {{--review-section--}}
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <h1>LATEST REVIEW</h1>
                </div>
            </div>
            <?php
                $color = ['#F78181','#F5DA81','#F3F781','#9FF781','#8181F7','#BE81F7'];
                $op = 0.2;
                $colora = ['rgba(247,129,129,'.$op.')','rgba(245,218,129,'.$op.')','rgba(243,247,129,'.$op.')','rgba(159,247,129,'.$op.')','rgba(129,129,247,'.$op.')','rgba(190,129,247,'.$op.')'];
                $idx =0;
            ?>
            @for($i=sizeof($review)-1; $i>=0 ;$i--)
                <?php
                    $text1 = mb_substr($review[$i]->content,0,350);
                ?>
                <div class="" style="color: white;margin: 15px 0px;">
                    <div class="col-md-6 shadow-text padding" style="background:{{$colora[$idx]}};border: dashed {{$color[$idx]}};border-radius: 20px;">
                        <div class="col-md-12">
                            <a href="/item/info/{{$review[$i]->link_item_id}}" > <h3 class="" style="color:white;"><span>{{$review[$i]->title}}</span></h3> </a>
                        </div>
                        <div class="col-md-8">
                            <div>
                                <div>" {!!$text1!!} "</div>
                            </div>
                        </div>
                        <div class="col-md-4" style="margin: 30px 0px;">
                            <h4>คะแนนเฉลี่ย : 5/5</h4>
                        </div>
                        <div class="col-md-12 left-right" style="margin-top: 10px">
                            <span>Reviewed by : ท่านผู้นั้น</span>
                        </div>
                        <div class="col-md-12"> <hr> </div>
                        <div class="col-md-6 left-right" style="margin-top: 0px">
                            <span>Like : 50 </span><span>Dislike : 50 </span><br>
                        </div>
                        <div class="col-md-6 " style="height: 110px;text-align: right">
                            <?php
                            if ($review[$i]->title_picture!=null){
                                echo '<img src="'. $review[$i]->title_picture .'" style="height: 100px">';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                    $idx++;
                    if ($idx > 5) $idx=0;
                ?>
            @endfor
        </div>
    </div>

@stop
