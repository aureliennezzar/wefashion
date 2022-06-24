<div class="product-card">
    {!! $product->status == "solded" ? '<span class="discount-message"> En solde</span>' : '' !!}
    <div class="product-image">
        <img src="{{\Illuminate\Support\Facades\Storage::url($product->picture->image)}}" alt="">
    </div>
    <a class="product-title" href="{{route('products.show', ['id'=>$product->id])}}">
        <h3>
            {{$product->name}}
        </h3>
    </a>
    <span class="product-category">Collection {{ $product->category->name }}</span>
    <p class="product-price">
        €{{$product->price}}
    </p>
</div>

