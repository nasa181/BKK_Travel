@extends('master')
@section('center_page')
    <div class="row padding solidborder" style="background: none;border-radius: 10px;">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="head-title" style="margin-bottom: 20px">{{$item->title}}</h1>
                </div>
            </div>
            <?php
                $background = "green" ;
                if ($photo != null){

                        $background = "url('" . url($photo->photo_url) . "')";

                }
            ?>
            <div class="row">
                <div class="col-md-6" style="margin-bottom: 20px;">
                    <div class="image-size"  style="border-radius:20px;background:{{$background}} center; background-size: cover;">
                    </div>
                </div>
                <div class="col-md-6"  style="margin-bottom: 20px;" >
                    <div class="" style="padding: 40px 20px;border: dashed #D4EF4C;border-radius: 20px;/*background: rgba(212,239,76,0.3)*/">
                        <div class="shadow-text">
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>Food type :  {{$res->food_type}} </span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style=""><span>Description : </span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>" {{$item->description}} " </span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>Price Range : {{$res->price_range}}</span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>Business time : {{$res->oc_time}} </span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>Credit Card : {{$res->credit_card}}</span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>Parking : {{$res->parking}}</span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>Child convenience : {{$res->child_appropriate}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row " >
                <div class="col-md-6" style="margin-bottom: 20px;"  >
                    <div class="" style="padding: 40px 20px;border: dashed #FF6C6C;border-radius: 20px;/*background: rgba(205,108,108,0.3)*/">
                        <div class="shadow-text">
                            <div class="row" style="margin-bottom: 5px">
                                <div class="col-xs-12" ><span>Address : {{$location->build}}  {{$location->street_address}}  {{$location->district}}
                                        {{$location->sub_district}} {{$location->province}} {{$location->postal_code}}</span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>Tel : {{$item->tel}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="margin-bottom: 20px;">
                    <div id="googleMap" class="image-size" style="border-radius:20px;width:auto;"></div>
                    <script>
                        var map;
                        var myCenter;
                        if({{$location->lat}}){
                            myCenter=new google.maps.LatLng({{$location->lat}},{{$location->long}});
                        }
                        else
                            myCenter = new google.maps.LatLng(13.746291,100.535004);

                        function initialize()
                        {
                            var mapProp = {
                                center:myCenter,
                                zoom:15,
                                mapTypeId:google.maps.MapTypeId.ROADMAP,
                                draggable: false,
                                scrollwheel: false,
                                mapTypeControl: false,
                                scaleControl: false,
                            };

                            map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                            if({{$location->lat}}) {
                                var marker = new google.maps.Marker({
                                    position: myCenter,
                                    map: map,
                                });
                            }

                        }

                        google.maps.event.addDomListener(window, 'load', initialize);
                    </script>
                    <div class="text-center"> GPS location : {{$location->lat}}  {{$location->long}} </div>
                </div>
            </div>
            <div class="row">
                <div class="" style="border: solid 1px;border-radius: 20px;margin: 20px 0"></div>
            </div>
            <div class="row col-md-12">
                <h1 style="margin-bottom: 15px">Review</h1>
            </div>
            <?php
            $color = ['#F78181','#F5DA81','#F3F781','#9FF781','#8181F7','#BE81F7'];
            $op = 0.2;
            $colora = ['rgba(247,129,129,'.$op.')','rgba(245,218,129,'.$op.')','rgba(243,247,129,'.$op.')','rgba(159,247,129,'.$op.')','rgba(129,129,247,'.$op.')','rgba(190,129,247,'.$op.')'];
            $idx =0;
            $k=0;
            ?>
            @foreach($review as $rev)
                <?php
                if (strlen($rev->content)< 350){
                    $text1 =$rev->content;
                    $text2 ="";
                    $readmore ="";
                }
                else if (mb_strpos($rev->content,"<br>") && mb_strpos($rev->content,"<br>")<350){
                    $text1 = mb_substr($rev->content,0,mb_strpos($rev->content,"<br>"));
                    $text2 = mb_substr($rev->content,mb_strpos($rev->content,"<br>")+4,10000);
                    $readmore ="Read more..";
                }
                else {
                    $space_pos = mb_strpos(mb_substr($rev->content,350,10000)," ");
                    $text1 = mb_substr($rev->content,0,$space_pos+350);
                    $text2 = mb_substr($rev->content,$space_pos+350,10000);
                    $readmore ="Read more..";
                }
                ?>
                <div class="row" style="color: white;margin: 15px 0px;">
                    <div class="col-md-12 shadow-text padding" style="background:{{$colora[$idx]}};border: dashed {{$color[$idx]}};border-radius: 20px;">
                        <div class="col-md-12" style="text-align: right">
                            <form method="post" action="/remove_review">
                                <input type="hidden" value="{{$rev->review_id}}" name="review_id">
                                <button type="button" class="btn-danger btn" onclick="run(this)">remove</button>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <h3 class="" style=""><span>{{$rev->title}}</span></h3>
                        </div>
                        <div class="col-md-9">
                            <div>
                                <div>{!!$text1!!}</div>
                                <div class="left-right"><a  id="flip" onclick="show(this)">{{$readmore}}</a></div>
                                <div id="panel">{!!$text2!!}</div>
                            </div>
                        </div>
                        <div class="col-md-3" style="margin: 10px 0px;">
                            <span>ความสวยงาม : 5/5</span><br>
                            <span>ความสะอาด : 5/5</span><br>
                            <span>ความคุ้มค่า : 5/5</span><br>
                            <span>ความประทับใจ: 5/5</span><br>
                            <h4>คะแนนเฉลี่ย : 5/5</h4>
                        </div>
                        <div class="col-md-6 left-right" style="margin-top: 10px">
                            <span>Reviewed by : <span style="font-size: 18px">{{$user[$k]->Fname}}</span></span>
                        </div>
                        <div class="col-md-6" style="margin-top: 10px;text-align: right">
                            <span>Like : 50 </span><span>Dislike : 50 </span><br>
                        </div>
                        <div class="col-md-12"> <hr> </div>
                        <div class="col-md-12">
                            <?php
                            if ($rev->title_picture!=null){
                                echo '<img src="'. $rev->title_picture .'" style="height: 120px;">';
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
                $idx++;
                $k++;
                if ($idx > 5) $idx=0;
                ?>
            @endforeach
            <?php
            $user = Session::get('user');
            if(isset($user)){
                echo('
                    <div class="row col-xs-12 ">
                    <a href="/page_all/create_review/'.$item->item_id.'"><button class="btn btn-success">Add new review</button></a>
                    </div>
                    ')
                ;
            }
            else {
                echo('
                   <div class="row col-xs-12 ">
                    <a href="#loginModal" data-toggle="modal" data-target="#loginModal"><button class="btn btn-success">Sign in to Add Review</button></a>
                    </div>
                ');
            }
            ?>
        </div>
    </div>
    <script>
        $(document).ready(function(){
        });
        function show(e){
            $(e).parent().next().slideDown("fast");
            $(e).remove();
        };
        function run(e){
            if (confirm("Click OK to confirm deleted?")){
                $(e).parent().submit();
            }
        };
    </script>
@stop