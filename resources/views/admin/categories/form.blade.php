<div class="category-form-container">
    @php
        $editMode = isset($category);
    @endphp
    Name:
    <input type="text" name="name" minlength="3" maxlength="100" value="{{ $editMode ? $category->name : "" }}"
           required/>
<input type="submit" class="submit-btn" value="Enregistrer"/>
</form>
