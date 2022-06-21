@extends('layouts/layout')
@section('content')
    <div>
        <h3>
            {{$product->name}}
        </h3>
        <img src="{{$product->image}}" alt="">
        <p>
            {{$product->description}}
        </p>
    </div>
@stop
