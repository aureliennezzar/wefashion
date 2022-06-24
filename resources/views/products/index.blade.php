@extends('layouts/layout')


@section('banner')
    @php
        $allBackgrounds = \Illuminate\Support\Facades\Storage::disk('public')->allFiles("backgrounds/samples");
    @endphp
    <!-- Slider main container -->
    <div class="swiper banner-swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide discount">
                <div class="bg"
                     style="background-image: url('/storage/{{$allBackgrounds[rand(0, count($allBackgrounds) - 1)]}}')">
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 swiper-slide__content">
                            <h3>Les soldes d'été sont la !</h3>
                            <a href="/discount/" class="cta">Voir plus</a>
                        </div>
                    </div>
                </div>
            </div>
            @foreach( \App\Models\Category::all() as $category)

                @php
                    $randomFile = "";
                    $allImageOf = \Illuminate\Support\Facades\Storage::disk('public')->allFiles("backgrounds/".$category->name);
                    if(count($allImageOf)>0){
                        $randomFile = $allImageOf[rand(0, count($allImageOf) - 1)];
                    } else {
                        $randomFile = $allBackgrounds[rand(0, count($allBackgrounds) - 1)];
                    }
                @endphp

                <div class="swiper-slide collection">
                    <div class="bg" style="background-image: url('/storage/{{$randomFile}}')">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 swiper-slide__content">
                                <h3>Collection {{$category->name}}</h3>
                                <a class="cta" href={{'/categorie/' . $category->id}}>Voir</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection


@section('content')
    <section class="products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">{{ __('Nos derniers produits') }}</h2>
                    <div class="products__grid">
                        @forelse($products as $product)
                            @include('products/card',compact('product'))
                        @empty
                            <span class="empty-message">aucun produit encore !</span>
                        @endforelse
                    </div>
                    <div class="products__pagination">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

