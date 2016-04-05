@extends('master')
@section('center_page')
    <div class="col-md-4 col-xs-12"></div>
    <div class="col-md-4 col-xs-12">
        <div class="row">
            @if($user->image == null)
                <img src="/blank-profile-picture-973460_960_720.png" class="img-rounded center-block">
            @else
                <img src="{{$user->image}}" class="img-rounded center-block img-circle" alt="Cinque Terre" width="30%" height="30%">
            @endif
        </div>
        <div class="row">
            <span>{{$user->Fname}} {{$user->Lname}}</span>
        </div>
    </div>
    <div class="col-md-4 col-xs-12"></div>

@stop