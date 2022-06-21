<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier les produits') }}
        </h2>
    </x-slot>
    <a style="color: blue;text-decoration: underline"  href="{{ route('admin.products.create') }}">Ajouter un produit</a>
    @forelse($products as $product)
        <div>

        <h3>{{$product->name}}</h3>
        <a style="color: blue;text-decoration: underline" href="{{ route('admin.products.edit',$product->id) }}">Edit</a>
{{--        <a style="color: blue;text-decoration: underline" href="{{ route('admin.products.delete',$product->id) }}">Supprimer</a>--}}
        <br>
        <br>
        </div>
    @empty
        <span>Aucun produit !</span>
    @endforelse
</x-app-layout>
