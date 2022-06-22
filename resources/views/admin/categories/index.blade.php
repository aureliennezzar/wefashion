<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier les catégories') }}
        </h2>
    </x-slot>
    <a style="color: blue;text-decoration: underline" href="{{ route('admin.categories.create') }}">Ajouter une catégorie</a>
    @forelse($categories as $categorie)
        <div>

            <h3>{{$categorie->name}}</h3>
            <a style="color: blue;text-decoration: underline" href="{{ route('admin.categories.edit',$categorie->id) }}">Edit</a>

            <form method="POST" action="{{ route('admin.categories.destroy',$categorie->id) }}">
{{--                        Define form method type--}}
                {{ method_field('DELETE') }}
{{--                        Generate token field--}}
                @csrf
                <input type="submit" value="Supprimer" onclick="return confirm('Êtes-vous sûr ?')">
            </form>
            <br>
            <br>
        </div>
    @empty
        <span>Aucune catégorie !</span>
    @endforelse
</x-app-layout>
