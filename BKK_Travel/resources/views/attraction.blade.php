@extends('master')
@section('center_page')
    <div class="row">
        <div class="col-sm-12"><img src="/cooltext165456723410492.png" class="img-rounded center-block" id="img1" width=75%></div>
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
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBW2gRwu9MwYWcH0zE5py-PuxbQQJuOZQQ&callback=initMap">
    </script>
    <ul class="pager">
        <li class="previous"><a href="../page_travel/list_of_travel/($page-1)">Previous</a></li>
        <li class="next"><a href="../page_travel/list_of_travel/($page+1)">Next</a></li>
    </ul>
@stop