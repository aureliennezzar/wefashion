<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier les produits') }}
        </h2>
    </x-slot>
    <a style="color: blue;text-decoration: underline" href="{{ route('admin.products.create') }}">Ajouter un produit</a>
    @forelse($products as $product)
        <div>

            <h3>{{$product->name}}</h3>
            <a style="color: blue;text-decoration: underline" href="{{ route('admin.products.edit',$product->id) }}">Edit</a>
            {{--        <a style="color: blue;text-decoration: underline" href="{{ route('admin.products.delete',$product->id) }}">Supprimer</a>--}}
            <form method="POST" action="{{ route('admin.products.destroy',$product->id) }}">

                {{--        Define form method type--}}
                {{ method_field('DELETE') }}

                {{--        Generate token field--}}
                @csrf
                <input type="submit" value="Supprimer" onclick="return confirm('Êtes-vous sûr ?')">
            </form>
            <br>
            <br>
        </div>
    @empty
        <span>Aucun produit !</span>
    @endforelse
</x-app-layout>
