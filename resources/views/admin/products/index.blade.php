<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier les produits') }}
        </h2>
        <a class="cta" href="{{ route('admin.products.create') }}">Ajouter un produit</a>
    </x-slot>
    <section class="admin-products">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="admin-products__list">
                        @forelse($products as $product)
                            <div class="single-product">
                                <div class="single-product__data">
                                    <img class="product-image" src="{{ asset('/storage/'.$product->picture->image) }}"
                                         alt="">
                                    <h3>{{$product->name}}</h3>
                                </div>
                                <div class="single-product__actions">
                                    <a class="cta"
                                       href="{{ route('admin.products.edit',$product->id) }}">Edit</a>
                                    {{--        <a style="color: blue;text-decoration: underline" href="{{ route('admin.products.delete',$product->id) }}">Supprimer</a>--}}
                                    <form method="POST" action="{{ route('admin.products.destroy',$product->id) }}">

                                        {{--        Define form method type--}}
                                        {{ method_field('DELETE') }}

                                        {{--        Generate token field--}}
                                        @csrf
                                        <input class="cta" type="submit" value="Supprimer" onclick="return confirm('Êtes-vous sûr ?')">
                                    </form>
                                </div>
                            </div>
                        @empty
                            <span>Aucun produit !</span>
                        @endforelse
                    </div>

                    <div class="products__pagination">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
