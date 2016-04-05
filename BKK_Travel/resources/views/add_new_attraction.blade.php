@extends('master')
@section('center_page')
    <form method="post" action="/page_travel/add_new_attraction">
        <div class="form-group">
            <label for="photo">Profile picture</label>
            <input type="file" placeholder="Choose a photo to upload" name="profile_picture" id="photo" >
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Title</label><input type="text" class="form-control" name="in_new_title" placeholder="Title.."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Description</label><textarea rows="5" class="form-control" name="in_new_description" placeholder="Please description this place.."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Tel</label><input type="text" class="form-control" name="in_new_tel" placeholder="Tel.."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Type</label><input type="text" class="form-control" name="in_new_type" placeholder="temple, zoo, amusement park, ..."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Activity</label><input type="text" class="form-control" name="in_new_activity" placeholder="What should we do at this place.."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Entrance Fee</label><input type="text" class="form-control" name="in_new_entranceFee" placeholder="Fee.."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Open-close Time</label><textarea rows="5" class="form-control" name="in_new_oc_time" placeholder="Open-close.."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Parking available</label><input type="text" class="form-control" name="in_new_parking" placeholder="Yes or No.."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Web site url</label><input type="text" class="form-control" name="in_new_web_url" placeholder="www.example.com"></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Hint</label><input type="text" class="form-control" name="in_new_hint" placeholder="The trick to go to this place.."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Build</label><textarea rows="5" class="form-control" name="in_new_build" placeholder="Build.."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Street Address</label><input type="text" class="form-control" name="in_new_street_address" placeholder="Street Address.."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Sub-district</label><input type="text" class="form-control" name="in_new_sub_dis" placeholder="Sub-district.."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>District</label><input type="text" class="form-control" name="in_new_district" placeholder="District.."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Province</label><textarea rows="5" class="form-control" name="in_new_province" placeholder="province.."></div>
        </div>
        <div class="row form-group">
            <div style="margin: 10px 20px 10px 20px"><label>Post code</label><input type="text" class="form-control" name="in_new_post_code" placeholder="post code.."></div>
        </div>
            <input type="hidden" class="form-control" name="in_new_lat" id="in_lat">
            <input type="hidden" class="form-control" name="in_new_lng" id="in_lng">

        <div id="googleMap" style="width:500px;height:380px;"></div>
        <script>
            var map;
            var myCenter=new google.maps.LatLng(51.508742,-0.120850);
            var marker;
            function initialize()
            {
                var mapProp = {
                    center:myCenter,
                    zoom:5,
                    mapTypeId:google.maps.MapTypeId.ROADMAP
                };

                map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

                google.maps.event.addListener(map, 'click', function(event) {
                    placeMarker(event.latLng);
                });
            }

            function placeMarker(location) {
                if(marker == null){
                    marker = new google.maps.Marker({
                        position: location,
                        map: map,
                    });
                }
                else{
                    marker.setPosition(location);
                }

                var infowindow = new google.maps.InfoWindow({
                    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
                });
                infowindow.open(map,marker);
                document.getElementById("in_lat").value = location.lat();
                document.getElementById("in_lng").value = location.lng();
            }

            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <button class="btn btn-default" type="submit">Submit</button>
    </form>
@stop