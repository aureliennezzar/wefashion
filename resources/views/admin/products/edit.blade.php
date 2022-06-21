<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un nouveau produit') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('admin.products.update',$product->id) }}">
        {{--        Define form method type--}}
        {{ method_field('PUT') }}
        {{--        Generate token field--}}
        @csrf

        Name:
        <input type="text" name="name" minlength="5" maxlength="100" value="{{ $product->name }}" required/>

        Description:
        <textarea name="description" cols="50" required>
            {{ $product->description }}
        </textarea>

        {{--        @TODO:Image upload--}}

        Prix:
        <input type="number" name="price"
               min="0" max="1000000" required value="{{ $product->price }}">

{{--        Taille:--}}
{{--        <select name="size" required>--}}
{{--            <?php--}}
{{--            $sizes = ['XS', 'S', 'M', 'L', 'XL']--}}
{{--            ?>--}}
{{--            @foreach($sizes as $size)--}}
{{--                <option--}}
{{--                    value="{{ strtolower($size) }}" {{ strtolower($size) == strtolower($product->size) ? 'selected' : '' }}>{{ $size }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}

        Status:
        <select name="status" required>
            <?php
            $status = ['Standard', 'Solded']
            ?>
            @foreach($status as $value)
                <option
                    value="{{ strtolower($value) }}" {{ strtolower($value) == strtolower($product->status) ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>

{{--        Genre:--}}
{{--        <select name="gender" required>--}}
{{--            <?php--}}
{{--            $genders = ['Homme', 'Femme']--}}
{{--            ?>--}}
{{--            @foreach($genders as $gender)--}}
{{--                <option--}}
{{--                    value="{{ strtolower($gender) }}" {{ strtolower($gender) == strtolower($product->gender) ? 'selected' : '' }}>{{ $gender }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}

        <fieldset>
            <legend>Visibilité :</legend>

            <div>
                <input type="radio" name="published" value="1" {{ $product->published == 1 ? 'checked' : '' }}>
                Publié
            </div>

            <div>
                <input type="radio" name="published" value="0" {{ $product->published == 0 ? 'checked' : '' }}>
                Non publié
            </div>
        </fieldset>

        <input style="cursor: pointer;color: blue;text-decoration: underline" type="submit" value="Enregistrer">
    </form>
</x-app-layout>
