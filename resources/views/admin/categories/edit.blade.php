<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editer une catégorie') }}
        </h2>
    </x-slot>
    <section class="admin-form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form class="category-form" method="POST"
                          action="{{ route('admin.categories.update',$category->id) }}">
                    {{--        Define form method type--}}
                    {{ method_field('PUT') }}
                    {{--        Generate token field--}}
                    @csrf

                    @include('admin/categories/form')
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
