@extends('master')
@section('center_page')
    <div class=" row col-md-offset-2 col-md-8 well " style="background: #337ab7;border-radius: 5px;border: dashed whitesmoke;">
        <form method="post" action="/page_travel/add_new_attraction" >
                <div class="row  col-md-offset-1 col-md-10  form-group text-center">
                    <div class="head-title">Create your attraction</div>
                </div>
                <div class="row  col-md-offset-1 col-md-10  form-group">
                    <label for="photo">Title picture</label>
                    <input type="file" placeholder="Choose a photo to upload" name="profile_picture" id="photo" >
                </div>
                <div class="row col-md-offset-1 col-md-10  form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="in_new_title" placeholder="Title..">
                </div>
                <div class="row col-md-offset-1 col-md-10  form-group">
                    <label>Description</label>
                    <textarea  rows="5" class="form-control" name="in_new_description" placeholder="Please description this place.."></textarea>
                </div>
                <div class="row col-md-offset-1 col-md-10  form-group">
                    <label>Tel</label>
                    <input type="text" class="form-control" name="in_new_tel" placeholder="xx-xxx-xxxx">
                </div>
                <div class="row col-md-offset-1 col-md-10 form-group">
                    <label>Type</label>
                    <input type="text" class="form-control" name="in_new_type" placeholder="Temple, Zoo, Public park, Mall..">
                </div>
                <div class="row col-md-offset-1 col-md-10 form-group">
                    <label>Activity</label>
                    <input type="text" class="form-control" name="in_new_activity" placeholder="What should we do at this place..">
                </div>
                <div class="row col-md-offset-1 col-md-10 form-group">
                    <label>Entrance Fee</label>
                    <input type="text" class="form-control" name="in_new_entrancefee" placeholder="Fee..">
                </div>
                <div class="row col-md-offset-1 col-md-10 form-group">
                    <label>Open-close Time</label>
                    <textarea rows="1" class="form-control" name="in_new_oc_time" placeholder="Mon-Fri 8AM-6PM"></textarea>
                </div>
                <div class="row col-md-offset-1 col-md-10 form-group">
                    <label>Parking available</label>
                    <input type="text" class="form-control" name="in_new_parking" placeholder="Yes or No..">
                </div>
                <div class="row col-md-offset-1 col-md-10 form-group">
                    <label>Web site url</label>
                    <input type="text" class="form-control" name="in_new_web_url" placeholder="www.example.com">
                </div>
                <div class="row col-md-offset-1 col-md-10 form-group">
                    <label>Hint</label>
                    <input type="text" class="form-control" name="in_new_hint" placeholder="The trick to go to this place..">
                </div>
                <div class="row col-md-offset-1 col-md-10 form-group">
                    <label>Building name</label>
                    <textarea rows="1" class="form-control" name="in_new_build" placeholder="Building name"></textarea>
                </div>
                <div class="row col-md-offset-1 col-md-10 form-group">
                    <label>Street Address</label>
                        <input type="text" class="form-control" name="in_new_street_address" placeholder="Street Address..">
                </div>
                <div class="row col-md-offset-1 col-md-10 form-group">
                    <label>District</label>
                    <input type="text" class="form-control" name="in_new_district" placeholder="District..">
                </div>
                <div class="row col-md-offset-1 col-md-10 form-group">
                    <label>Sub-district</label>
                    <input type="text" class="form-control" name="in_new_sub_dis" placeholder="Sub-district..">
                </div>
                <div class="row col-md-offset-1 col-md-10 form-group">
                    <label>Province</label>
                    <input type="text" class="form-control" name="in_new_province" placeholder="province..">
                </div>
                <div class="row col-md-offset-1 col-md-10 form-group">
                    <label>Postal code</label>
                    <input type="text" class="form-control" name="in_new_post_code" placeholder="post code..">
                </div>

            <input type="hidden" class="form-control" name="in_new_lat" id="in_lat">
            <input type="hidden" class="form-control" name="in_new_lng" id="in_lng">

            <div id="googleMap" class="row col-md-offset-1 col-md-10 form-group" style="color:black;height: 380px;margin: 10px auto;float: none">
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
            </div>
            <div class="row col-md-offset-1 col-md-10 text-center" >
                <button class="btn btn-success center-block" type="submit" style="">Submit</button>
            </div>
        </form>
    </div>
@stop