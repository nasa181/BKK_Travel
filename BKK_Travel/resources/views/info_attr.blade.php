@extends('master')
@section('center_page')
    <div class="container-fluid" style="margin: 70px 5px;background: none;">
    <div class="row" style="">
        <div class="col-md-6 col-xs-12" style="background: none">
            <div class="image-size" style=";border-radius:10px;background:url({{$photo->photo_url}}) center ; margin:0px 0px; background-size: cover;">
                <span class="head-title shadow-text title-name" style="position: absolute;bottom: 15px;left:50%;transform:translateX(-50%);">{{$item->title}}</span>
            </div>
        </div>
        <div class="col-md-6 col-xs-12" style="padding: 10px 10px;position: relative" >
            <div style="border-radius:10px; -webkit-filter: blur(9px) contrast(1.3) saturate(2)  grayscale(0.65);opacity:1;background-image:url({{$photo->photo_url}});background-attachment: fixed;background-repeat: no-repeat;background-size: cover">
                <div class="" style="height:380px;">
                </div>
            </div>
            <div class="shadow-text">
            <div style="position: absolute;top:50%;transform: translateY(-50%);" >
                <div class="row" style="margin: 20px 0px;" >
                    <div class="col-xs-12" style=""><span>" {{$item->description}} "</span></div>
                </div>
                <div class="row" style="margin: 20px 0px;">
                    <div class="col-xs-12"><span>Entrance Fee : {{$attr->entrance_fee}}</span></div>
                </div>
                <div class="row" style="margin: 20px 0px;">
                    <div class="col-xs-12"><span>{{$attr->oc_time}}</span></div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="row" style="">
        <div class="col-xs-12" style="">
            <div id="googleMap" class="image-size" style="width:auto;margin: 10px 0px"></div>
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
                        mapTypeId:google.maps.MapTypeId.ROADMAP
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
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <a href="/page_all/create_review/{{$item->item_id}}"><button class="btn btn-success">Review</button></a>
        </div>
    </div>
    @foreach($review as $rev)
            <div class="row">
                <div class="col-md-4 col-xs-12"></div>
                <div class="col-md-4 col-xs-12">
                    <img src="{{$rev->title_picture}}" class="img-rounded" width=96px height=96px style="float: left">
                    <div class="text-info" style="margin: 0 0 0 104px"><span>{{$rev->title}}</span></div>
                    <div class="text-info" style="margin: 0 0 0 104px"><span>{{$rev->content}}</span></div>
                </div>
                <div class="col-md-4 col-xs-12"></div>
            </div>
        @endforeach

        </div>
    @stop