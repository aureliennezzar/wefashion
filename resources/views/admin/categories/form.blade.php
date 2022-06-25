<div class="category-form-container">
    @php
        $editMode = isset($category);
    @endphp
    <fieldset>
        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" minlength="3" maxlength="100"
               value="{{ $editMode ? $category->name : "" }}"
               required/>
    </fieldset>
    <input type="submit" class="submit-btn cta" value="Enregistrer"/>
    </form>
