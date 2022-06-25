@extends('layouts/layout')
@section('content')
    <section class="single-product">
        <div class="container">
            <div class="row top-content">
                <div class="col-6 single-product__left">
                    <img src="{{ asset('/storage/'.$product->picture->image) }}" alt="">
                </div>
                <div class="col-6 single-product__right">
                    <h1 class="title">
                        {{$product->name}}
                    </h1>
                    <div class="under-title">
                        <p class="price">€{{$product->price}}</p>
                        <a href="/categorie/{{$product->category->id }}">Collection {{ucfirst($product->category->name)}}</a>

                    </div>
                    <form action="" class="buy-form">
                        <div class="size-wrapper">
                            <label for="sizes">Taille : </label>
                            <select name="sizes" id="sizes">
                                @foreach($product->sizes as $size)
                                    <option value="{{$size->id}}">{{$size->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="submit" class="cta" value="Acheter">


                    </form>
                </div>
            </div>
            <div class="row bottom-content">
                <div class="col-12">
                    <h2 class="section_title">{{__("Description")}}</h2>
                    <p class=desc>
                        {{$product->description}}
                    </p>
                </div>
            </div>
        </div>
    </section>
@stop
