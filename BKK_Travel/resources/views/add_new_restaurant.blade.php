@extends('master')
@section('center_page')
    <div class=" row col-md-offset-2 col-md-8 well " style="background: #337ab7;border-radius: 5px;border: dashed whitesmoke;">
        <form method="post" action="/page_travel/add_new_restaurant" enctype="multipart/form-data">
            <div class="row  col-md-offset-1 col-md-10  form-group text-center">
                <div class="head-title">Create your restaurant</div>
            </div>
            <div class="row  col-md-offset-1 col-md-10  form-group">
                <label for="photo">Title picture</label>
                <input type="file" placeholder="Choose a photo to upload" name="profile_picture" id="photo" >
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Title</label><input type="text" class="form-control" name="in_new_title" placeholder="Title.."></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Description</label><textarea rows="5" class="form-control" name="in_new_description" placeholder="Please description this place.."></textarea></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Tel</label><input type="text" class="form-control" name="in_new_tel" placeholder=" xx-xxx-xxxx"></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Price range</label><input type="text" class="form-control" name="in_new_price_range" placeholder="100 - 1,000 Baht"></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Food Type</label><input type="text" class="form-control" name="in_new_food_type" placeholder="Thai food, Japanese food,..."></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Open-close Time</label><textarea rows="5" class="form-control" name="in_new_oc_time" placeholder="Mon-Fri 8AM-6PM"></textarea></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Credit card</label><textarea rows="5" class="form-control" name="in_new_credit_card" placeholder="Accept or Not.."></textarea></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Child Convenience</label><textarea rows="5" class="form-control" name="in_new_child_appropriate" placeholder="Yes or No.."></textarea></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Reservable</label><textarea rows="5" class="form-control" name="in_new_reservable" placeholder="Yes or No.."></textarea></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Parking available</label><input type="text" class="form-control" name="in_new_parking" placeholder="Yes or No.."></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Hint</label><input type="text" class="form-control" name="in_new_hint" placeholder="The trick to go to this place.."></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Building name</label><textarea rows="5" class="form-control" name="in_new_build" placeholder="Build.."></textarea></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Street Address</label><input type="text" class="form-control" name="in_new_street_address" placeholder="Street Address.."></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>District</label><input type="text" class="form-control" name="in_new_district" placeholder="District.."></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Sub-district</label><input type="text" class="form-control" name="in_new_sub_dis" placeholder="Sub-district.."></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Province</label><textarea rows="5" class="form-control" name="in_new_province" placeholder="province.."></textarea></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Postal code</label><input type="text" class="form-control" name="in_new_post_code" placeholder="post code.."></div>
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