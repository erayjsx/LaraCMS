@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-xl lg:text-2xl mb-4">{{ $category->name }}</h1>

        <div class="flex row">
            <div class="w-full max-w-xs">
                asd
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($category->products as $product)
                    <product-card :product='@json($product)'></product-card>
                @endforeach
            </div>
        </div>

    </div>
@endsection
