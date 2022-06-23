<div class="product-form-container">
    @php
        $editMode = isset($product);
    @endphp
    Name:
    <input type="text" name="name" minlength="5" maxlength="100" value="{{ $editMode ? $product->name : "" }}"
           required/>

    Description:
    <textarea name="description" cols="50" required>
            {{ $editMode ? $product->description : "" }}
        </textarea>

    <label for="picture">Choose a profile picture:</label>


    Prix:
    <input type="number" name="price"
           min="0" max="1000000" required value="{{ $editMode ? $product->price : "" }}">

    Taille:
    <fieldset>
        Retrieve sizes from collection
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


        @foreach($sizes as $size)
            <label for="{{ "checkbox".$size->id }}">{{$size->name}}</label>
            <input id="{{ "checkbox".$size->id }}" class="size-checkbox" type="checkbox" name="sizes[]"
                   value="{{ $size->id }}"
            @if($editMode)
                {{ in_array($size->name,$productSizes)  ? 'checked' : '' }}
                @endif

            />
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
                value="{{ strtolower($value) }}" {{ $editMode && strtolower($value) == strtolower($product->status) ? 'selected' : '' }}>{{ $value }}</option>
        @endforeach
    </select>

    Categorie:
    <select name="category_id" required="required">
        <option value="">Choisir une catégorie</option>
        @foreach($categories as $category)
            <option
                value="{{ $category->id}}" {{ $editMode && $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>

    <fieldset>
        <legend>Visibilité :</legend>

        <div>
            <input type="radio" name="published" value="1" {{ $editMode && $product->published == 1 ? 'checked' : '' }}>
            Publié
        </div>

        <div>
            <input type="radio" name="published" value="0" {{ $editMode && $product->published == 0 ? 'checked' : '' }}>
            Non publié
        </div>
    </fieldset>


    <input type="file"
           id="picture" name="image"
           accept="image/png, image/jpeg" {{ $editMode ? '' : 'required' }}>
</div>
<input type="submit" class="submit-btn" value="Enregistrer"/>
</form>
