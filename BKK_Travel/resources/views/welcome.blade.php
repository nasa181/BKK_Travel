@extends('master')
@section('center_page')
    <?php $current_user=Session::get('user'); ?>
    {{--article-section--}}
    <div class="row" >
        <div class="col-xs-12" style="background: none">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <a class="head_item_description " href="/page_article/list_of_article/1"><h1>ARTICLE</h1></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                {{--left-article--}}
                <div class="col-md-6 col-xs-12">
                    @for($i=0;$i<1;$i++)
                    <a href="#">
                    <div class="row item_description " style="margin:10px 0px;height: 120px;background: url('/ร้านอาหารเลอสยาม-เอ็มเคโกลด์-011.jpg')  center ;background-size:cover;background-attachment: local ">
                        <div class="col-xs-12" style=" text-shadow: 1px 1px black;">
                            <a href="/page_article/list_of_article/1">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="head item_description" style=""><span><h4>พาชิมอาหารรอบกรุง</h4></span></div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="text-info" style="text-align: right;margin: 55px 0px 0px 0px"><span>บทความร้านอาหาร</span></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    </a>
                    <a href="#">
                        <div class="row item_description " style="margin:10px 0px;height: 120px;background: url('http://202.129.59.73/free/cal12/c0412p04x.jpg')  center;background-size:cover;background-attachment: local ">
                            <div class="col-xs-12" style=" text-shadow: 1px 1px black;">
                                <a href="/page_article/list_of_article/1">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="head item_description" style=""><span><h4>สถานที่เล่นน้ำสงกรานต์ 2559</h4></span></div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="text-info" style="text-align: right;margin: 55px 0px 0px 0px"><span>บทความท่องเที่ยว</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </a>
                    @endfor
                </div>
                {{--right-article--}}
                <div class="col-md-6 col-xs-12">
                    @for($i=0;$i<1;$i++)
                    <a href="#">
                    <div class="row item_description " style="margin:10px 0px;background: green;height: 120px;background: url('https://images5.alphacoders.com/407/407909.jpg') center;background-size:cover;background-attachment: fixed ">
                        <div class="col-xs-12" style=" text-shadow: 1px 1px black;">
                            <a href="/page_article/list_of_article/1">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="head item_description" style=""><span><h4>รีวิวโรงแรม ไอคอนสยาม</h4></span></div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="text-info" style="text-align: right;margin: 55px 0px 0px 0px"><span>สปอนเซอร์</span></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row item_description " style="margin:10px 0px;background: green;height: 120px;background: url('http://thailanddrone.com/wp-content/uploads/wppa/44/5.jpg?ver=10') bottom ;background-size:cover;background-attachment: local ">
                        <div class="col-xs-12" style=" text-shadow: 1px 1px black;">
                            <a href="/page_article/list_of_article/1">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="head item_description" style=""><span><h4>เส้นทางไหว้พระ 9 วัดรอบกรุง</h4></span></div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="text-info" style="text-align: right;margin: 55px 0px 0px 0px"><span>บทความท่องเที่ยว</span></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    </a>
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
            <a href="/page_travel/info/{{$attr->item_id}}">
                <div class="row item_description " style="overflow:hidden;margin:10px 0px;background: green;height: 120px;background: url({{$attr->title_picture}}) center ;background-size:cover ">
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

        {{--restaurant-section--}}
        <div class="col-md-4 col-xs-12" style="background: none">
            <div class="row">
                <div class=" col-md-12 col-xs-12 ">
                    <a class="head_item_description " href="/page_restaurant/list_of_restaurant/1"><h1>RESTAURANT</h1></a>
                </div>
            </div>

            @foreach($restaurant as $res)
                <a href="/page_restaurant/info/{{$res->item_id}}">
                <div  class="row item_description" style="overflow:hidden;margin:10px 0px;background: green;height: 120px;overflow:hidden;background: url({{$res->title_picture}}) center ;background-size:cover ">
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

        {{--event-section--}}
        <div class="col-md-4 col-xs-12" style="background: none">
            <div class="row">
                <div class=" col-md-12 col-xs-12 ">
                    <a class="head_item_description " href="/page_event/list_of_event/1"><h1>EVENT</h1></a>
                </div>
            </div>
        @foreach($event as $eve)
            <?php
                if($eve->title_picture == null){
                    $background = ";background : green;";
                }
                else $background=";background : url(". $eve->title_picture .") center;"
            ?>
            <a href="/page_event/info/{{$eve->item_id}}">
            <div  class="row item_description" style="overflow:hidden;margin:10px 0px;background: green;height: 120px;overflow:hidden;{{$background}};background-size:cover ">
                <div class="col-md-12 col-xs-12" style=" text-shadow: 1px 1px black;">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="head item_description" style=""><span><h4>{{$eve->title}}</h4></span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="text-info" style="margin: 0px"><span>{{$eve->start_date}} to {{$eve->end_date}}</span></div>
                        </div>
                        <div class="col-xs-12">
                            <div class="text-info " style="margin: 0px"><span>{{$eve->entrance_fee}}</span></div>
                        </div>
                        <div class="col-xs-12" >
                            <div class="text-info " style="margin: 0px"><span>{{$eve->type}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        @endforeach
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
                $k=0;
            ?>
            @for($i=sizeof($review)-1; $i>=0 ;$i--)
                <?php
                    $text1 = mb_substr($review[$i]->content,0,250);
                ?>
                <div id="review_id{{$review[$i]->review_id}}" class="" style="color: white;margin: 15px 0px;">
                    <div class="col-md-6 shadow-text padding" style="background:{{$colora[$idx]}};border: dashed {{$color[$idx]}};border-radius: 20px;">
                        @if(isset($current_user))
                            @if($current_user[4]=="Admin")
                            <div class="col-md-12" style="text-align: right;margin-top: 5px">
                                <form id="delete_form" method="post" action="/remove_review">
                                    <input type="hidden" value="{{$review[$i]->review_id}}" name="review_id">
                                    <button type="button" class="btn-danger btn" onclick="run(this)">remove</button>
                                </form>
                            </div>
                            @endif
                        @endif
                        <div class="col-md-12" style="">
                            <a href="/item/info/{{$review[$i]->link_item_id}}" > <h3 class="" style="color:white;"><span>{{mb_substr($review[$i]->title,0,45)}}</span></h3> </a>
                        </div>
                        <div class="col-md-8 height-adjust" style="text-overflow: ellipsis; word-wrap: break-word;">
                                <p>"{!!$text1!!}..."</p>
                        </div>
                        <div class="col-md-12 left-right" style="margin-top: 10px">
                            <span>Reviewed by : <a href="/view_profile/{{$user[$i]->user_id}}"><span style="color:white;font-size: 18px">{{$user[$i]->Fname}}</span></a></span>
                        </div>
                        <div class="col-md-12"> <hr> </div>
                        <?php
                        $like_count=0;$dislike_count=0;
                        foreach($likes as $like){
                            if($like->review_id==$review[$i]->review_id) ($like->likeOrDislike==1) ? $like_count++ : $dislike_count++ ;
                        }
                        ?>
                        <div class="col-md-6 left-right" style="margin-top: 0px">
                            <span>Like : {{$like_count}} </span><span>Dislike : {{$dislike_count}} </span>
                        </div>
                        <div class="col-md-6" style="text-align: right;font-size: 30px">
                            <?php
                            $colorLike = "color:white";
                            $colorDislike ="color:white";
                            if(isset($current_user[8])){
                                foreach($current_user[8] as $use){
                                    if($review[$i]->review_id == $use->review_id){
                                        if($use->likeOrDislike==1){
                                            $colorLike="color:#4cae4c";
                                        }
                                        else $colorDislike="color:#d62728";
                                    }
                                }
                            }
                            ?>
                            <span id="like_button" onclick="addLike({{$review[$i]->review_id}})" id="like" class="glyphicon glyphicon-thumbs-up" style="{{$colorLike}}"></span>
                            <span id="dislike_button" onclick="addDislike({{$review[$i]->review_id}})" id="dislike" class="glyphicon glyphicon-thumbs-down" style="{{$colorDislike}}" ></span>
                        </div>
                        <div class="col-md-12 " style="height: 110px;text-align: left">
                        <?php
                            if ($review[$i]->title_picture!=null){
                                echo ('

                                            <img src="'. $review[$i]->title_picture .'" style="height: 100px">

                                    ');
                            }
                        ?>
                        </div>
                    </div>
                </div>
                <?php
                    $k++;
                    $idx++;
                    if ($idx > 5) $idx=0;
                ?>
            @endfor
        </div>
    </div>
    <input type="hidden" id="login_button" href="#loginModal" data-toggle="modal" data-target="#loginModal">
    <script>
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
