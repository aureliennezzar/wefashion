<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier les catégories') }}
        </h2>
        <a class="cta" href="{{ route('admin.categories.create') }}">Ajouter</a>
    </x-slot>
    <section class="admin-products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="admin-products__list">
                        @forelse($categories as $category)
                            <div class="single-product">
                                <div class="single-product__data">
                                    <h3>{{$category->name}}</h3>
                                </div>
                                <div class="single-product__actions">

                                    <a class="cta"
                                       href="{{ route('admin.categories.edit',$category->id) }}">Edit</a>

                                    <form method="POST" action="{{ route('admin.categories.destroy',$category->id) }}">
                                        {{--                        Define form method type--}}
                                        {{ method_field('DELETE') }}
                                        {{--                        Generate token field--}}
                                        @csrf
                                        <input class="cta" type="submit" value="Supprimer"
                                               onclick="return confirm('Êtes-vous sûr ?')">
                                    </form>
                                </div>
                            </div>
                        @empty
                            <span>Aucune catégorie !</span>
                        @endforelse
                    </div>

                    <div class="products__pagination">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
