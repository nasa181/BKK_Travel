@extends('master')
@section('center_page')
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="/page_travel/post_review" method="post" enctype="multipart/form-data">
            <input type="hidden" value="{{$id}}" id="hidden_value" name="hidden_value">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" rows="5" name="description" id="description"></textarea>
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" placeholder="Choose a photo to upload" name="photo" id="photo" >
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <div class="col-md-4"></div>

@stop