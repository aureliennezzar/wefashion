<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<header class="header">
    <nav class="nav">
        <div class="container">
            <div class="row">
                <div class="col-12 nav__wrapper">
                    <div class="brand-link">
                        <h1>
                            <a href="/">WeFashion</a>
                        </h1>
                    </div>
                    <ul class="nav-links">
                        @foreach( \App\Models\Category::all() as $category)

                            <li class="link {{ (request()->is('categorie/'.$category->id)) ? 'active' : '' }}">
                                <a href={{'/categorie/' . $category->id}}>{{$category->name}}</a>
                            </li>
                        @endforeach

                            <li class="link discount">
                                <a href="{{route('products.discount')}}">
                                    {{ __('Soldes') }}
                                </a>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
@yield('banner')
@yield('content')
</body>
</html>
