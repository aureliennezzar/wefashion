@extends('layouts/layout')


@section('banner')
    <section class="category-banner">

        @php
            $randomFile = "";
            $allBackgrounds = \Illuminate\Support\Facades\Storage::disk('public')->allFiles("backgrounds/samples");
            $allImageOf = \Illuminate\Support\Facades\Storage::disk('public')->allFiles("backgrounds/".$category->name);
            if(count($allImageOf)>0){
                $randomFile = $allImageOf[rand(0, count($allImageOf) - 1)];
            } else {
                $randomFile = $allBackgrounds[rand(0, count($allBackgrounds) - 1)];
            }
        @endphp
        <div class="bg" style="background-image: url('/storage/{{$randomFile}}')">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12 category-banner__content">
                    <h1 class="title">{{ __('Découvrez notre collection  '.ucfirst($category->name)) }}</h1>
                    <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum distinctio dolor
                        dolore incidunt itaque nihil obcaecati possimus quis sapiente! Ea, omnis, velit? Accusantium ad,
                        ducimus fugiat hic reprehenderit rerum sit.</p>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('content')
    <section class="products category">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="title">{{ __('Collection '.$category->name) }}</h2>
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

