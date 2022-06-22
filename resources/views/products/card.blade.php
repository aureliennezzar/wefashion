<span>
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
    <img src="{{\Illuminate\Support\Facades\Storage::url($product->picture->image)}}" alt="">
    <span>{{ $product->category->name }}</span>
    <p>
        {{$product->description}}
    </p>
</div>
<br><br>
