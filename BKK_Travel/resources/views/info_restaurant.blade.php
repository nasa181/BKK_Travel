@extends('master')
@section('center_page')
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" style="margin: auto"><span>{{$item->title}}</span></div>
        <div class="col-sm-4"></div>
    </div>
    <div class="row">
        <div class="col-sm-12"><img src="{{$photo->photo_url}}" class="img-rounded center-block"></div>
    </div>

    <div class="row well center-block">
        <div class="col-sm-12"><span>{{$res->price_range}}</span></div>
        <div class="col-sm-12"><span>{{$item->tel}}</span></div>
        <div class="col-sm-12"><span>{{$res->oc_time}}</span></div>
    </div>

    <div id="map"></div>
    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW2gRwu9MwYWcH0zE5py-PuxbQQJuOZQQ&callback=initMap"
            async defer></script>

    <a href="/page_all/create_review/{{$res->link_item_id}}"><button class="btn btn-success">Review</button></a>
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