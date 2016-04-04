@extends('master')
@section('center_page')
    <div class="row">
        <div class="col-sm-12"><img src="/cooltext165456723410492.png" class="img-rounded center-block" id="img1" width=75%></div>
    </div>

    <ul class="pager">
        <li class="previous"><a href="../page_travel/list_of_travel/($page-1)">Previous</a></li>
        <li class="next"><a href="../page_travel/list_of_travel/($page+1)">Next</a></li>
    </ul>
@stop