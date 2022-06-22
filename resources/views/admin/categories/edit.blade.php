<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editer une catégorie') }}
        </h2>
    </x-slot>

    <form class="category-form" method="POST" action="{{ route('admin.categories.update',$category->id) }}">
    {{--        Define form method type--}}
    {{ method_field('PUT') }}
    {{--        Generate token field--}}
    @csrf

    @include('admin/categories/form')
</x-app-layout>
