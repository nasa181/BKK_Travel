@extends('master')
@section('center_page')
    @if(isset($users))
        @foreach($users as $user)
            <div class="col-md-12 col-xs-12 item_description text-center" style=" text-shadow: 1px 1px black;height: 200px;margin:20px 0;">
                <div class="row" style="display: inline-block">
                    <div class="col-xs-12">
                        <div class="head item_description" style="margin: 0px 0px 0px 20px">
                            <a href="/view_profile/{{$user[0]->user_id}}"><span><h3>Name: {{$user[0]->Fname}}</h3></span></a>
                            @if(is_null($user[0]->image))
                                <img src="/blank-profile-picture-973460_960_720.png" class="img-circle" alt="Cinque Terre" width="150" height="150">
                            @else
                                <img src="{{$user[0]->image}}" class="img-circle" alt="Cinque Terre" width="150" height="150">
                            @endif
                        </div>
                        <div class="text-info" style="text-align: center;margin: 0px 0px 0px 20px"><span>{{$user[1]}} Review</span></div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif


@stop