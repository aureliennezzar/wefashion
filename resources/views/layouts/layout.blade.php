<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
<nav>
    <select class="categories" id="categories-select" onchange="this.options[this.selectedIndex].value && (window.location = '/categorie/' + this.options[this.selectedIndex].value);">
        <option value="">Choisir une catégorie</option>
        @foreach( \App\Models\Category::all() as $category)
            {{$category->name}}
            <option
                value="{{$category->id}}" {{ (request()->is('categorie/'.$category->id)) ? 'selected' : '' }}>{{$category->name}}</option>
        @endforeach
    </select>

    <a href="{{route('products.discount')}}">
        {{ __('Soldes') }}
    </a>
</nav>
@yield('content')
</body>
</html>
