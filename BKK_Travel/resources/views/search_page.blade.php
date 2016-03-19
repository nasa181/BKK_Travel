@extends('master')
@section('center_page')
    @foreach($item as $it)
        <h1>{{$it->item_id}}</h1>
    @endforeach
@stop