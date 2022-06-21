<x-app-layout>
    <x-slot name="header">
        {{$product->name}}
    </x-slot>
    <div>
        <h3>
            {{$product->name}}
        </h3>
        <img src="{{$product->image}}" alt="">
        <p>
            {{$product->description}}
        </p>
    </div>
</x-app-layout>
