@extends('master')
@section('center_page')
@section('center_page')
    <?php
    /*        var_dump($item);
            var_dump($attraction);*/
    ?>
    <div class=" row col-md-offset-2 col-md-8 well " style="background: #337ab7;border-radius: 5px;border: dashed whitesmoke;">
        <form method="post" action="/page_travel/add_new_event" enctype="multipart/form-data">
            <div class="row  col-md-offset-1 col-md-10  form-group text-center">
                    <div class="head-title">Create your event</div>
            </div>
            <div class="row  col-md-offset-1 col-md-10  form-group">
                <label for="photo">Title picture</label>
                <input type="file" placeholder="Choose a photo to upload" name="profile_picture" id="photo" >
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Title</label><input type="text" class="form-control" name="in_new_title" placeholder="Title.." ></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Description</label><textarea rows="5" class="form-control" name="in_new_description" placeholder="Please description this place.."></textarea></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Tel</label><input type="text" class="form-control" name="in_new_tel" placeholder=" xx-xxx-xxxx" ></div>
            </div>
            <div class="row col-md-offset-1 col-md-10 form-group ">
                <label>Start date</label><br>
                <input id="date" class="datepicker" style="border-radius: 5px;color:#2e3436" id="date" name="in_new_start_date" placeholder="DD/MM/YYYY" type="text">
            </div>
            <div class="row col-md-offset-1 col-md-10 form-group ">
                <label>End date</label><br>
                <input id="date2" class="datepicker" style="border-radius: 5px;color:#2e3436" id="date" name="in_new_end_date" placeholder="DD/MM/YYYY" type="text">
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Entrance fee</label><input type="text" class="form-control" name="in_new_entrance_fee"placeholder="100-200 Baht" ></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Event Type</label><input type="text" class="form-control" name="in_new_type" placeholder="Concert, Charity, Exhibition,.."></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Parking</label>
                    <label class="radio-inline"><input type="radio" name="in_new_parking" value="Yes">Yes</label>
                    <label class="radio-inline"><input type="radio" name="in_new_parking" value="No">No</label>
                </div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Website url</label><input type="text" class="form-control" name="in_new_website_url" placeholder="www.example.com"></div>
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
                <input type="text" class="form-control" name="in_new_street_address" placeholder="Street Address.." >
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
                <input type="text" class="form-control" name="in_new_province" placeholder="province.." >
            </div>
            <div class="row col-md-offset-1 col-md-10 form-group">
                <label>Postal code</label>
                <input type="text" class="form-control" name="in_new_post_code" placeholder="post code.." >
            </div>

            <input type="hidden" class="form-control" name="in_new_lat" id="in_lat" >
            <input type="hidden" class="form-control" name="in_new_lng" id="in_lng" >

            <div id="googleMap" class="row col-md-offset-1 col-md-10 form-group" style="color:black;height: 380px;margin: 10px auto;float: none">
                <script>
                    var map;
                            @if(isset($item))
                    var myCenter=new google.maps.LatLng( {{$location->lat}} ,{{$location->long}});
                            @else
                    var myCenter=new google.maps.LatLng( 13.743521264976438 ,100.54059982209014);
                            @endif
                    var marker;
                    function initialize()
                    {
                        var mapProp = {
                            center:myCenter,
                            zoom:15,
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
    <script>
        var date_input=$('#date'); //our date input has the name "date"
        var container=$('.bootstrap-iso').length>0 ? $('.bootstrap-iso').parent() : "body";
        var options={
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true
        };
        function jsonpCallback(data) {
            $("select[name='country']").val(data.address.country);
        }
        $('#date').datepicker(options); //initial 10/26/2015 8:20:59 PM ze plugin
        $('#date2').datepicker(options); //initial 10/26/2015 8:20:59 PM ze plugin
    </script>
@stop