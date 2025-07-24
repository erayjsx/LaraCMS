@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-xl lg:text-2xl mb-6">{{ $category->name }}</h1>

        <div class="flex row gap-4 space-x-4 ">
            <div class="w-full max-w-60 max-lg:hidden">
                <n-collapse :default-expanded-names="['1', '2']" arrow-placement="right">
                    <n-collapse-item title="Marka" name="1">
                        <div>good</div>
                    </n-collapse-item>
                    <n-collapse-item title="Model" name="2">
                        <div>nice</div>
                    </n-collapse-item>
                    <n-collapse-item title="Beden" name="3">
                        <div>very good</div>
                    </n-collapse-item>
                </n-collapse>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($category->products as $product)
                    <product-card :product='@json($product)'></product-card>
                @endforeach
            </div>
        </div>

    </div>
@endsection
