<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editer un nouveau produit') }}
        </h2>
    </x-slot>

    <form class="product-form" method="POST" action="{{ route('admin.products.update',$product->id) }}">
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

        Taille:
        <fieldset>
{{--            Retrieve sizes from collection --}}
            @php
                $productSizes = []
            @endphp
            @foreach($product->sizes as $size)
                @php
                    $productSizes[] = $size->name
                @endphp
            @endforeach


            @foreach($sizes as $size)
                <label for="{{ "checkbox".$size->id }}">{{$size->name}}</label>
                <input id="{{ "checkbox".$size->id }}" class="size-checkbox" type="checkbox" name="sizes[]"
                       value="{{ $size->id }}" {{ in_array($size->name,$productSizes) ? 'checked' : '' }}/>
            @endforeach
        </fieldset>

        Status:
        <select name="status" required="required">
            <option value="">Choisir un status</option>
            <?php
            $status = ['Standard', 'Solded']
            ?>
            @foreach($status as $value)
                <option
                    value="{{ strtolower($value) }}" {{ strtolower($value) == strtolower($product->status) ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>

        Categorie:
        <select name="category_id" required="required">
            <option value="">Choisir une catégorie</option>
            @foreach($categories as $category)
                <option
                    value="{{ $category->id}}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
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

        <input type="submit" class="submit-btn" value="Enregistrer"/>
    </form>
</x-app-layout>
