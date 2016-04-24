@extends('master')
@section('center_page')
@section('center_page')
    <?php
    /*        var_dump($item);
            var_dump($attraction);*/
    if(isset($item)) $path="/update_restaurant";
    else $path="/page_travel/add_new_restaurant";
    ?>
    <div class=" row col-md-offset-2 col-md-8 well " style="background: #337ab7;border-radius: 5px;border: dashed whitesmoke;">
        <form method="post" action="{{$path}}" enctype="multipart/form-data">
            @if (isset($item))
                <input type="hidden" name="item_id" value="{{$item->item_id}}">
            @endif
            <div class="row  col-md-offset-1 col-md-10  form-group text-center">
                @if (isset($item))
                    <div class="head-title">Edit restaurant : {{$res->restaurant_id}}</div>
                @else
                    <div class="head-title">Create your restaurant</div>
                @endif
            </div>
            <div class="row  col-md-offset-1 col-md-10  form-group">
                <label for="photo">Title picture</label>
                <input type="file" placeholder="Choose a photo to upload" name="profile_picture" id="photo" >
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Title</label><input type="text" class="form-control" name="in_new_title" placeholder="Title.." @if(isset($item)) value="{{$item->title}}" @endif></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Description</label><textarea rows="5" class="form-control" name="in_new_description" placeholder="Please description this place..">@if(isset($item)) {{$item->description}} @endif</textarea></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Tel</label><input type="text" class="form-control" name="in_new_tel" placeholder=" xx-xxx-xxxx" @if(isset($item)) value="{{$item->tel}}" @endif></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Price range</label><input type="text" class="form-control" name="in_new_price_range" placeholder="100 - 1,000 Baht" @if(isset($item)) value="{{$res->price_range}}" @endif></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Food Type</label><input type="text" class="form-control" name="in_new_food_type" placeholder="Thai food, Japanese food,..." @if(isset($item)) value="{{$res->food_type}}" @endif></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Open-close Time</label><textarea rows="5" class="form-control" name="in_new_oc_time" placeholder="Mon-Fri 8AM-6PM">@if(isset($item)){{$res->oc_time}} @endif</textarea></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Credit card</label><textarea rows="5" class="form-control" name="in_new_credit_card" placeholder="Accept or Not..">@if(isset($item)) {{$res->credit_card}} @endif</textarea></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Child Convenience</label><textarea rows="5" class="form-control" name="in_new_child_appropriate" placeholder="Yes or No..">@if(isset($item)) {{$res->child_appropriate}} @endif</textarea></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Reservable</label><textarea rows="5" class="form-control" name="in_new_reservable" placeholder="Yes or No..">@if(isset($item)) {{$res->reservable}} @endif</textarea></div>
            </div>
            <div class="row  col-md-offset-1 col-md-10 form-group">
                <div ><label>Parking available</label><input type="text" class="form-control" name="in_new_parking" placeholder="Yes or No.."@if(isset($item)) value="{{$res->parking}}" @endif></div>
            </div>
            <div class="row col-md-offset-1 col-md-10 form-group">
                <label>Hint</label>
                <input type="text" class="form-control" name="in_new_hint" placeholder="The trick to go to this place.." @if(isset($item)) value="{{$location->hint}}" @endif>
            </div>
            <div class="row col-md-offset-1 col-md-10 form-group">
                <label>Building name</label>
                <textarea rows="1" class="form-control" name="in_new_build" placeholder="Building name"> @if(isset($item)) {{$location->build}} @endif</textarea>
            </div>
            <div class="row col-md-offset-1 col-md-10 form-group">
                <label>Street Address</label>
                <input type="text" class="form-control" name="in_new_street_address" placeholder="Street Address.." @if(isset($item)) value="{{$location->street_address}}" @endif>
            </div>
            <div class="row col-md-offset-1 col-md-10 form-group">
                <label>District</label>
                <input type="text" class="form-control" name="in_new_district" placeholder="District.." @if(isset($item)) value="{{$location->district}}" @endif>
            </div>
            <div class="row col-md-offset-1 col-md-10 form-group">
                <label>Sub-district</label>
                <input type="text" class="form-control" name="in_new_sub_dis" placeholder="Sub-district.." @if(isset($item)) value="{{$location->sub_district}}" @endif>
            </div>
            <div class="row col-md-offset-1 col-md-10 form-group">
                <label>Province</label>
                <input type="text" class="form-control" name="in_new_province" placeholder="province.." @if(isset($item)) value="{{$location->province}}" @endif>
            </div>
            <div class="row col-md-offset-1 col-md-10 form-group">
                <label>Postal code</label>
                <input type="text" class="form-control" name="in_new_post_code" placeholder="post code.." @if(isset($item)) value="{{$location->postal_code}}" @endif>
            </div>

            <input type="hidden" class="form-control" name="in_new_lat" id="in_lat" @if(isset($item)) value="{{$location->lat}}" @endif>
            <input type="hidden" class="form-control" name="in_new_lng" id="in_lng" @if(isset($item)) value="{{$location->long}}" @endif>

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
@stop