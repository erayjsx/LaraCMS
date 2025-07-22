@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1>{{ $category->name }}</h1>

        @foreach ($category->products as $product)
            <div>{{ $product->name }}</div>
        @endforeach

    </div>
@endsection
