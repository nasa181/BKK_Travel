@extends('master')
@section('center_page')
    <div class="row">
        <div class="col-sm-12"><span>{{$item->title}}</span></div>
        <div class="col-sm-12"><img src="{{$photo->photo_url}}" class="img-rounded center-block"></div>
    </div>
    <div class="row well center-block">
        <div class="col-sm-12"><span>{{$item->description}}</span></div>
        <div class="col-sm-12"><span>{{$attr->entrance_fee}}</span></div>
        <div class="col-sm-12"><span>{{$attr->oc_time}}</span></div>
    </div>
    <div id="googleMap" style="width:500px;height:380px;"></div>
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


    <a href="/page_all/create_review/{{$item->item_id}}"><button class="btn btn-success">Review</button></a>

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


@stop