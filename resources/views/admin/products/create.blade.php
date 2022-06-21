<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un nouveau produit') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('admin.products.store') }}">
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
        <select name="size" required>
            <?php
            $sizes = ['XS', 'S', 'M', 'L', 'XL']
            ?>
            <option value="">Choisir une taille</option>
            @foreach($sizes as $size)
                    <option value="{{ strtolower($size) }}">{{ $size }}</option>

            @endforeach
        </select>

        Status:
        <select name="status" required>
            <?php
            $status = ['Standard', 'Solded']
            ?>
            <option value="">Choisir une taille</option>
            @foreach($status as $value)
                <option value="{{ strtolower($value) }}">{{ $value }}</option>
            @endforeach
        </select>

        Genre:
        <select name="gender" required>
            <?php
            $genders = ['Homme', 'Femme']
            ?>
            <option value="">Choisir une taille</option>
            @foreach($genders as $gender)
                <option value="{{ strtolower($gender) }}">{{ $gender }}</option>
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

        <input style="cursor: pointer;color: blue;text-decoration: underline" type="submit" value="Enregistrer">
    </form>
</x-app-layout>
