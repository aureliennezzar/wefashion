<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un nouveau produit') }}
        </h2>
    </x-slot>

    <section class="admin-form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form class="product-form" method="POST" action="{{ route('admin.products.store') }}"
                          enctype="multipart/form-data">
                    {{--        Define form method type--}}
                    {{ method_field('POST') }}
                    {{--        Generate token field--}}
                    @csrf
                    @include('admin/products/form')
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
