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
            @if(isset($current_user)&&( $current_user[4]=="Admin"||$current_user[5]==$item->user_id ))
            <div class="row">
                <div class= "col-md-offset-10 col-md-2 col-xs-offset-8 col-xs-4"style="text-align: right">
                    <div><a href="/edit_attraction/{{$item->item_id}}"><button class="form-control btn-warning btn">edit</button></a></div>
                </div>
            </div>
            @endif
            @if(isset($current_user) && $current_user[4]=="Admin")
            <div class="row" style="margin-top: 10px">
                <div class= "col-md-offset-10 col-md-2 col-xs-offset-8 col-xs-4"style="text-align: right">
                    <div><button onclick=" post('/remove_item',{item_id : {{$item->item_id}} },'post')" class="form-control btn-danger btn">remove</button></div>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="head-title" style="margin-bottom: 20px">{{$item->title}}</h1>
                </div>
            </div>
            <?php
                $background = "green" ;
                if ($photo != null){
                    if($item->title_picture !=""){
                        $background = "url('" . url($item->title_picture) . "')";
                    }
                }
            ?>
            <div class="row">
                <div class="col-md-6" style="margin-bottom: 20px;">
                    <div class="image-size"  style="position:relative;/*box-shadow: 0 0px 15px 0 rgba(0, 0, 0, 0.45), 0 0px 30px 0 rgba(0, 0, 0, 0.15);*/border-radius:20px;background:{{$background}} center; background-size: cover;">
                    </div>
                </div>
                <div class="col-md-6"  style="margin-bottom: 20px;" >
                    <div class="" style="padding: 40px 20px;border: dashed #D4EF4C;border-radius: 20px;/*background: rgba(212,239,76,0.2)*/;">
                        <div class="shadow-text">
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>Attraction type :  {{$attr->attraction_type}} </span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style=""><span>Description : </span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>" {{$item->description}} " </span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>Entrance Fee : {{$attr->entrance_fee}}</span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>Activity : {{$attr->activity}} </span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>Business time : {{$attr->oc_time}}</span></div>
                            </div>
                            <div class="row" style="">
                                <div class="col-xs-12" style="margin-bottom: 5px"><span>Parking : {{$attr->parking}}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="review_idsection2" class="row" >
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 " style="์margin-bottom: 20px;"  >
                            <div id="address_box" class="image-size-2" style="border: dashed #FF6C6C;border-radius: 20px;/*background: rgba(205,108,108,0.2*/)">
                                <div class="shadow-text">
                                    <div class="row" style="margin-bottom: 5px">
                                        <div class="col-xs-12" ><span>Address : {{$location->build}}  {{$location->street_address}}  {{$location->district}}
                                                {{$location->sub_district}} {{$location->province}} {{$location->postal_code}}</span></div>
                                    </div>
                                    <div class="row" style="">
                                        <div class="col-xs-12" style="margin-bottom: 5px"><span>Tel : {{$item->tel}}</span></div>
                                    </div>
                                    <div class="row" style="">
                                        <div class="col-xs-12" style="margin-bottom: 5px"><span>Website : {{$attr->website_url}}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12  " style="margin-bottom: 20px;"  >
                            <div class="image-size-2 " style="border: none;padding:20px 20px;" >
                                <div style="font-size: 30px"> Avg Rating : {{round($avg_rating,1)}}/5 <span style="font-size: 16px;margin-left: 10px">({{$rating_count}})</span> </div>
                                <?php
                                    $rating=0;
                                    $style=['','','','',''];
                                    if(isset($current_user)){
                                        foreach($current_user[6] as $use){
                                            if($use->item_id == $item->item_id){
                                                $rating = $use->rating;
                                                break;
                                            }
                                        }
                                        for ($i=0;$i<$rating;$i++){
                                            $style[$i]='#FF3333';
                                        }
                                        $ratethis_text = "<span>Rate this : </span>";
                                        if ($rating>0)  $ratethis_text = "<span>Your rating : </span>";
                                        echo ('
                                       <div class="shadow-text" style="font-size: 20px">
                                        '.$ratethis_text.'
                                        <span onclick="updateRating(1)" id="star1" style="color:white" class="glyphicon-star glyphicon" ></span>
                                        <span onclick="updateRating(2)" id="star2" style="" class="glyphicon-star glyphicon" ></span>
                                        <span onclick="updateRating(3)" id="star3" style="" class="glyphicon-star glyphicon" ></span>
                                        <span onclick="updateRating(4)" id="star4" style="" class="glyphicon-star glyphicon" ></span>
                                        <span onclick="updateRating(5)" id="star5" style="" class="glyphicon-star glyphicon" ></span>
                                         </div>
                                        ');
                                    }
                                else {
                                    echo('
                                       <div class="row col-xs-12 " style="margin-top: 10px">
                                        <a href="#loginModal" data-toggle="modal" data-target="#loginModal"><button class="btn btn-success">Sign in to rate</button></a>
                                        </div>
                                    ');
                                }
                                ?>
                                @if ($item==null)
                                @elseif ( $item->isApproved == 1 )
                                <img src="/approved.png" style=";height:100px;" >
                                @else
                                <img src="/waitapprove.png" style=";height:100px;" >
                                @endif
                                @if(isset($current_user)&&$current_user[4]=="Admin")
                                    @if($item->isApproved)
                                        <span style="margin-left: 40px"><input id="isApproved" data-on-style="success" type="checkbox" checked data-toggle="toggle"  data-on="Approve"  data-off="Wait Approve"></span>
                                    @else
                                        <span style="margin-left: 40px"><input id="isApproved"  data-on-style="success" type="checkbox"  data-toggle="toggle"  data-on="Approve"  data-off="Wait Approve"></span>
                                    @endif
                                @endif
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
            <div id="review_id{{$rev->review_id}}" class="row" style="color: white;margin: 15px 0px;">
                <div class="col-md-12 shadow-text padding" style="background:{{$colora[$idx]}};border: dashed {{$color[$idx]}};border-radius: 20px;">
                    @if(isset($current_user))
                        @if($current_user[4]=="Admin")
                        <div class="col-md-12" style="text-align: right">
                            <form method="post" action="/remove_review">
                                <input type="hidden" value="{{$rev->review_id}}" name="review_id">
                                <button type="button" class="btn-danger btn" onclick="run(this)">remove</button>
                            </form>
                        </div>
                        @endif
                    @endif
                    <div class="col-md-12">
                        <h3 class="" style=""><span>{{$rev->title}}</span></h3>
                    </div>
                    <div class="col-md-9">
                        <div style="text-overflow: ellipsis; word-wrap: break-word;">
                            <div>{!!$text1!!}</div>
                            <div class="left-right"><a  id="flip" onclick="show(this)">{{$readmore}}</a></div>
                            <div id="panel">{!!$text2!!}</div>
                        </div>
                    </div>
                    <div class="col-md-3" style="margin: 10px 0px;">
                        <span>ความสวยงาม : X/5</span><br>
                        <span>ความสะอาด : X/5</span><br>
                        <span>ความคุ้มค่า : X/5</span><br>
                        <span>ความประทับใจ: X/5</span><br>
                        <h4>คะแนนเฉลี่ย : X/5</h4>
                    </div>
                    <div class="col-md-6 left-right" style="margin-top: 10px">
                        <span>Reviewed by : <a  href="/view_profile/{{$user[$k]->user_id}}"><span style="font-size: 18px;color: #ec971f">{{$user[$k]->Fname}}</span></a></span>
                    </div>
                    <?php
                        $like_count=0;$dislike_count=0;
                        foreach($likes as $like){
                            if($like->review_id==$rev->review_id) ($like->likeOrDislike==1) ? $like_count++ : $dislike_count++ ;
                        }
                    ?>
                    <div class="col-md-6" style="margin-top: 10px;text-align: right">
                        <span>Like : {{$like_count}} </span><span>Dislike : {{$dislike_count}} </span><br>
                    </div>
                    <div class="col-md-12" style="text-align: right;font-size: 30px;margin-top: 5px">
                        <?php
                            $colorLike = "color:white";
                            $colorDislike ="color:white";
                            if(isset($current_user[8])){
                                foreach($current_user[8] as $use){
                                    if($rev->review_id == $use->review_id){
                                        if($use->likeOrDislike==1){
                                            $colorLike="color:#4cae4c";
                                        }
                                        else $colorDislike="color:#d62728";
                                    }
                                }
                            }
                        ?>
                        <span id="like" onclick="addLike({{$rev->review_id}})" id="like" class="glyphicon glyphicon-thumbs-up" style="{{$colorLike}}"></span>
                        <span id="dislike" onclick="addDislike({{$rev->review_id}})" id="dislike" class="glyphicon glyphicon-thumbs-down" style="{{$colorDislike}}" ></span>
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
            if(isset($current_user)){
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
                    <a id="login_button" href="#loginModal" data-toggle="modal" data-target="#loginModal"><button class="btn btn-success">Sign in to Add Review</button></a>
                    </div>
                ');
            }
        ?>
        </div>
    </div>

    <script>
        <?php $color_star="#FF3333"?>
        $(document).ready(function(){
            repaintRating();
            $("#star1").hover(
                    function() {
                        $("#star1").css("color", "{{$color_star}}");
                        @for($i=2;$i<=5;$i++)
                            $("#star{{$i}}").css("color","white");
                        @endfor
                        console.log("in");
                    },
                    function(){
                        console.log("out");
                        repaintRating();
                    }
            );
            $("#star2").hover(
                    function(){
                        @for($i=1;$i<=2;$i++)
                        $("#star{{$i}}").css("color","{{$color_star}}");
                        @endfor
                        console.log("in");
                        @for($i=3   ;$i<=5;$i++)
                            $("#star{{$i}}").css("color","white");
                        @endfor
                    },
                    function(){
                        repaintRating();
                        console.log("out");
                    }
            );
            $("#star3").hover(
                    function(){
                        @for($i=1;$i<=3;$i++)
                        $("#star{{$i}}").css("color","{{$color_star}}");
                        @endfor
                        @for($i=4;$i<=5;$i++)
                            $("#star{{$i}}").css("color","white");
                        @endfor
                        console.log("in");
                    },
                    function(){
                        repaintRating();
                        console.log("out");
                    }
            );
            $("#star4").hover(
                    function(){
                        @for($i=1;$i<=4;$i++)
                        $("#star{{$i}}").css("color","{{$color_star}}");
                        @endfor
                        @for($i=5;$i<=5;$i++)
                            $("#star{{$i}}").css("color","white");
                        @endfor
                        console.log("in");
                    },
                    function(){
                        repaintRating();
                        console.log("out");

                    }
            );
            $("#star5").hover(
                    function(){
                        @for($i=1;$i<=5;$i++)
                        $("#star{{$i}}").css("color","{{$color_star}}");
                        @endfor
                        console.log("in");
                    },
                    function(){
                        repaintRating();
                        console.log("out");
                    }
            );
            $("#isApproved").change(function(){
                console.log($(this).prop('checked'));
                isApproved =  $(this).prop('checked') ? 1 : 0 ;
                console.log("sent"+isApproved);
                post('/approve',{isApproved : isApproved,item_id: "{{$item->item_id}}" });
            });
        });
            function repaintRating(){
                @for($i=1;$i<=5;$i++)
                    $("#star{{$i}}").css("color","{{$style[$i-1]}}");
                @endfor
            }
            function updateRating(e){
                console.log(e);
                sessionStorage.setItem('lastReview',"section2");
                post('/updateRating',{user_id:"{{$current_user[5]}}",item_id:"{{$item->item_id}}",rating:e},'post');
            };
            function show(e){
                $(e).parent().next().slideDown("fast");
                $(e).remove();
            };
            function run(e){
                if (confirm("Click OK to confirm deleted?")){
                    $(e).parent().submit();
                }
            };

            function addLike(e){
                @if( isset($current_user) )
                sessionStorage.setItem('lastReview',e);
                post('/setLikeDislike',{likeOrDislike:1,review_id:e},'post');
                @else
                $('#login_button').click();
                @endif
            }
            function addDislike(e){
                @if( isset($current_user) )
                sessionStorage.setItem('lastReview',e);
                post('/setLikeDislike',{likeOrDislike:0,review_id:e},'post');
                @else
                $('#login_button').click();
                @endif
            }
            if(sessionStorage.getItem('lastReview')!=null){
                scrollToID('#review_id' +sessionStorage.getItem('lastReview')+'');
                sessionStorage.setItem('lastReview',null);
            }
            function scrollToID(e){
                $('html, body').animate({
                    scrollTop: $(e).offset().top
                },0);
            }
            function post(path, params, method) {
                method = method || "post"; // Set method to post by default if not specified.

                // The rest of this code assumes you are not using a library.
                // It can be made less wordy if you use one.
                var form = document.createElement("form");
                form.setAttribute("method", method);
                form.setAttribute("action", path);

                for(var key in params){
                    if(params.hasOwnProperty(key)) {
                        var hiddenField = document.createElement("input");
                        hiddenField.setAttribute("type", "hidden");
                        hiddenField.setAttribute("name", key);
                        hiddenField.setAttribute("value", params[key]);

                        form.appendChild(hiddenField);
                    }
                }

                document.body.appendChild(form);
                form.submit();
            }

    </script>
@stop