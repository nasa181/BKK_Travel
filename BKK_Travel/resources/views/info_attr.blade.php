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
    <div id="map"></div>
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: {{$attr->lat}}, lng: {{$attr->long}}},
                zoom: 8
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
            async defer></script>


@stop