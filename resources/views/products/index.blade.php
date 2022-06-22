@extends('layouts/layout')
@section('content')
    @forelse($products as $product)
        @include('products/card',compact('product'))

    @empty
        <span>aucun produit encore !</span>
    @endforelse
    {{ $products->links() }}
@stop
