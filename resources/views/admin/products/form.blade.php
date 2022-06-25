<div class="product-form-container">
    @php
        $editMode = isset($product);
    @endphp
    <fieldset>
        <label for="name">
            Name:
        </label>
        <input type="text" id="name" name="name" minlength="5" maxlength="100"
               value="{{ $editMode ? $product->name : "" }}"
               required/>
    </fieldset>

    <fieldset>
        <label for="description">
            Description:
        </label>
        <textarea id="description" name="description" cols="50" required>
            {{ $editMode ? $product->description : "" }}
        </textarea>
    </fieldset>

    <fieldset>
        <label for="number">Prix:</label>
        <input type="number" id="number" name="price"
               min="0" max="1000000" required value="{{ $editMode ? $product->price : "" }}">
    </fieldset>


    <fieldset>
        <label>Taille:</label>
        {{--        Retrieve sizes from collection--}}
        @php
            $productSizes = []
        @endphp
        @if($editMode)
            @foreach($product->sizes as $size)
                @php
                    $productSizes[] = $size->name
                @endphp
            @endforeach
        @endif

        <div class="sizes-wrapper">
            @foreach($sizes as $size)
                <label for="{{ "checkbox".$size->id }}">{{$size->name}}</label>
                <input id="{{ "checkbox".$size->id }}" class="size-checkbox" type="checkbox" name="sizes[]"
                       value="{{ $size->id }}"
                @if($editMode)
                    {{ in_array($size->name,$productSizes)  ? 'checked' : '' }}
                    @endif

                />
            @endforeach
        </div>
    </fieldset>

    <fieldset>
        <label for="status">Status:</label>
        <select id="status" name="status" required="required">
            <option value="">Choisir un status</option>
            <?php
            $status = ['Standard', 'Solded']
            ?>
            @foreach($status as $value)
                <option
                    value="{{ strtolower($value) }}" {{ $editMode && strtolower($value) == strtolower($product->status) ? 'selected' : '' }}>{{ $value }}</option>
            @endforeach
        </select>
    </fieldset>

    <fieldset>
        <label for="categorie">Catégorie:</label>
        <select name="category_id" required="required">
            <option value="">Choisir une catégorie</option>
            @foreach($categories as $category)
                <option
                    value="{{ $category->id}}" {{ $editMode && $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
    </fieldset>

    <fieldset>
        <label>Visibilité :</label>
        <div>
            <input type="radio" name="published" value="1" {{ $editMode && $product->published == 1 ? 'checked' : '' }}>
            Publié
        </div>

        <div>
            <input type="radio" name="published" value="0" {{ $editMode && $product->published == 0 ? 'checked' : '' }}>
            Non publié
        </div>
    </fieldset>

    <label class="picture-btn" for="picture">{{$editMode ? "Modifier l'image" : 'Choisir une image'}}</label>
    <input type="file"
           id="picture" name="image"
           accept="image/png, image/jpeg" {{ $editMode ? '' : 'required' }}>
</div>
<input type="submit" class="submit-btn cta" value="Enregistrer"/>
</form>
