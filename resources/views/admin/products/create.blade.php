<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editer un nouveau produit') }}
        </h2>
    </x-slot>
    <form class="product-form" method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
    {{--        Generate token field--}}
    @csrf
    @include('admin/products/form')

</x-app-layout>
