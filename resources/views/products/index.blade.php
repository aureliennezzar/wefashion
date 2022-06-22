@extends('layouts/layout')
@section('content')
    @forelse($products as $product)
        <span>
{{--            @php--}}
            {{--                $availableSizes = array_keys(array_column($sizes, 'product_id'), $product->id);--}}
            {{--                var_dump($availableSizes);--}}
            {{--            @endphp--}}
            {{--            @foreach($availableSizes as $size)--}}
            {{--                 {{ $sizes[$size] }}--}}
            {{--            @endforeach--}}
            <pre>
            @foreach($product->sizes as $size)
                    {{ $size->name }}
                @endforeach
            </pre>
            </span>
        <div>
            <a href="{{route('products.show', ['id'=>$product->id])}}">
                <h3>
                    {{$product->name}}
                </h3>
            </a>
{{--            <img src="{{$product->picture->image}}" alt="">--}}
            <span>{{ $product->category->name }}</span>
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
