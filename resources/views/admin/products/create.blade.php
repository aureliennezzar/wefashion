<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un nouveau produit') }}
        </h2>
    </x-slot>

    <form class="product-form" method="POST" action="{{ route('admin.products.store') }}">
        {{--        Generate token field--}}
        @csrf

        Name:
        <input type="text" name="name" minlength="5" maxlength="100" required/>

        Description:
        <textarea name="description" rows="4" cols="50" required>
        </textarea>

        {{--        @TODO:Image upload--}}

        Prix:
        <input type="number" name="price"
               min="0" max="1000000" required>

        Taille:
        <fieldset>
            @foreach($sizes as $size)
                <label for="{{ "checkbox".$size->id }}">{{$size->name}}</label>
                <input id="{{ "checkbox".$size->id }}" type="checkbox"  class="size-checkbox" name="sizes[]" value="{{ $size->id }}"/>
            @endforeach
        </fieldset>

        Status:
        <select name="status" required="required">

            <option value="">Choisir un status</option>
            <?php
            $status = ['Standard', 'Solded']
            ?>
            <option value="">Choisir un status</option>
            @foreach($status as $value)
                <option value="{{ strtolower($value) }}">{{ $value }}</option>
            @endforeach
        </select>

        Categorie:
        <select name="category_id" required="required">
            <option value="">Choisir une catégorie</option>
            @foreach($categories as $category)
                <option value="{{ $category->id}}">{{ $category->name }}</option>
            @endforeach
        </select>

        <fieldset>
            <legend>Visibilité :</legend>

            <div>
                <input type="radio" name="published" value="1"
                       checked>
                Publié
            </div>

            <div>
                <input type="radio" name="published" value="0">
                Non publié
            </div>
        </fieldset>

        <input type="submit" class="submit-btn" value="Enregistrer"/>
    </form>
</x-app-layout>
