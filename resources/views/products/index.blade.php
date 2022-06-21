@extends('layouts/layout')
@section('content')
@forelse($products as $product)
    <div>
        <a href="{{route('products.show', ['id'=>$product->id])}}">
            <h3>
                {{$product->name}}
            </h3>
        </a>
        <img src="{{$product->image}}" alt="">
        <p>
            {{$product->description}}
        </p>
    </div>
    <br><br>
@empty
    <span>aucun produit encore !</span>
@endforelse
    {{ $products->links() }}
@stop
