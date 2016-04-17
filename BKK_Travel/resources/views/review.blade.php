@extends('master')
@section('center_page')
    <div class="row">
        <div class="col-md-offset-2 col-md-8 well" style="background: #337ab7;border-radius: 5px;border: dashed whitesmoke;">
            <div class=" text-center"><h2>Create review on {{$title}}</h2></div>
            <form action="/page_travel/post_review" method="post" enctype="multipart/form-data">
                <input type="hidden" value = "{{$item_id}}" id="hidden_value" name="hidden_value">
                <div class="row  col-md-offset-1 col-md-10  form-group" style="margin-bottom: 0px;text-align: right;margin-top: 15px">
                    <p>Review id : {{$review_id}}</p>
                </div>
                <div class="row  col-md-offset-1 col-md-10  form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="บริการเยี่ยม อาหารอร่อย ราคาเหมาะสม...">
                </div>
                <div class="row  col-md-offset-1 col-md-10  form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" rows="5" name="description" id="description" placeholder="description..."></textarea>
                </div>
                <div class="row  col-md-offset-1 col-md-10  form-group">
                    <label for="photo ">Photo</label>
                    <input type="file" placeholder="Choose a photo to upload" name="profile_picture" id="photo" >
                </div>
                <div class="row col-md-offset-1 col-md-10  text-center form-group">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>

@stop