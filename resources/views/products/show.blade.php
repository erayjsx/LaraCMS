@extends('layouts.app')

@section('meta')
    <meta name="description" content="{{ Str::limit($product->description, 150) }}">
    <meta property="og:title" content="{{ $product->name }}" />
    <meta property="og:description" content="{{ Str::limit($product->description, 150) }}" />
@endsection

@section('title', $product->name)

@php
    $breadcrumbItems = [
        ['name' => 'Ana Sayfa', 'link' => '/'],
        ['name' => 'Ürünler', 'link' => '/products'],
        ['name' => $product->name, 'link' => route('products.show', $product->id)],
    ];

    $images = [
        'https://cdn.myikas.com/images/0b03644a-1913-45a8-805d-79ffa5a00641/cd39a931-962f-41cc-8348-13f6768bac4c/1080/siyahsalamanderarka.webp',
        'https://cdn.myikas.com/images/0b03644a-1913-45a8-805d-79ffa5a00641/cd39a931-962f-41cc-8348-13f6768bac4c/1080/siyahsalamanderarka.webp',
    ];

@endphp

@section('content')

    <div class="container mx-auto w-full px-4">
        <n-breadcrumb class="text-sm *:text-sm mt-3">
            <n-breadcrumb-item>Ana Sayfa</n-breadcrumb-item>
            @if ($product->category)
                <n-breadcrumb-item href="/{{ $product->category->slug }}">{{ $product->category->name }}</n-breadcrumb-item>
            @endif
            <n-breadcrumb-item>{{ $product->name }}</n-breadcrumb-item>
        </n-breadcrumb>
        <div class="flex max-lg:flex-col gap-6 lg:p-6 max-lg:py-6">
            <div class="space-y-4 mx-auto">
                <product-gallery :images='@json($images)'></product-gallery>
            </div>

            <div class="space-y-6 w-full max-w-lg">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900 mb-6">{{ $product->name }}</h1>
                    <p class="text-2xl font-semibold text-black mb-4">
                        ₺{{ number_format($product->price, 2, ',', '.') }}
                    </p>
                </div>

                <div class="flex items-center gap-2 mb-4">
                    <h3 class="font-semibold text-gray-900">Stok:</h3>
                    @if ($product->stock > 0)
                        <p class="text-green-600 font-medium">{{ $product->stock }} adet</p>
                    @else
                        <p class="text-red-600 font-medium">Stokta yok</p>
                    @endif
                </div>

                <div class="space-y-4">
                    <div class="flex gap-4">
                        <button onclick="addToCart()"
                            class="flex-1 bg-black cursor-pointer text-white font-medium h-14 px-6 transition-colors duration-200 {{ $product->stock <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                            {{ $product->stock <= 0 ? 'disabled' : '' }}>
                            @if ($product->stock <= 0)
                                Stokta Yok
                            @else
                                Sepete Ekle
                            @endif
                        </button>
                    </div>

                    @if ($product->description)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Ürün Açıklaması</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        const product = @json($product);

        function addToCart() {
            const quantity = document.getElementById('quantity')?.value || 1;
            window.dispatchEvent(new CustomEvent('add-to-cart', {
                detail: {
                    product: {
                        ...product,
                        quantity: 1
                    }
                }
            }));
        }
    </script>
@endpush
