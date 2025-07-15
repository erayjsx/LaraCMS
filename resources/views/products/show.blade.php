@extends('layouts.app')

@section('title', $product->name)

@php
    $breadcrumbItems = [
        ['name' => 'Ana Sayfa', 'link' => '/'],
        ['name' => 'Ürünler', 'link' => '/products'],
        ['name' => $product->name, 'link' => route('products.show', $product->id)],
    ];
    $product->images = $product->images ?: [
        'https://cdn.myikas.com/images/0b03644a-1913-45a8-805d-79ffa5a00641/cd39a931-962f-41cc-8348-13f6768bac4c/1080/siyahsalamanderarka.webp',
        'https://cdn.myikas.com/images/0b03644a-1913-45a8-805d-79ffa5a00641/cd39a931-962f-41cc-8348-13f6768bac4c/1080/siyahsalamanderarka.webp',
    ];

@endphp

@section('content')

    <div class="container mx-auto w-full px-4">
        <n-breadcrumb class="text-sm *:text-sm">
            <n-breadcrumb-item>Ana Sayfa</n-breadcrumb-item>
            <n-breadcrumb-item>{{ $product->name }}</n-breadcrumb-item>
        </n-breadcrumb>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 p-6">
            <div class="space-y-4 lg:col-span-2 lg:aspect-3/4">
                <product-gallery :images='@json($product->images)'></product-gallery>
            </div>

            <div class="space-y-6 col-span-1">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                    <p class="text-4xl font-bold text-blue-600 mb-4">
                        {{ number_format($product->price, 2, ',', '.') }} ₺
                    </p>
                </div>

                @if ($product->description)
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Açıklama</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                    </div>
                @endif

                <div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Stok Durumu</h3>
                    @if ($product->stock > 0)
                        <p class="text-green-600 font-medium">{{ $product->stock }} adet stokta</p>
                    @else
                        <p class="text-red-600 font-medium">Stokta yok</p>
                    @endif
                </div>

                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <label class="text-sm font-medium text-gray-700">Adet:</label>
                        <input type="number" min="1" max="{{ $product->stock }}" value="1"
                            class="w-20 px-3 py-2 border border-gray-300 rounded-md" id="quantity">
                    </div>

                    <div class="flex gap-4">
                        <button onclick="addToCart()"
                            class="flex-1 bg-blue-600 hover:bg-blue-700 cursor-pointer text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200 {{ $product->stock <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                            {{ $product->stock <= 0 ? 'disabled' : '' }}>
                            @if ($product->stock <= 0)
                                Stokta Yok
                            @else
                                Sepete Ekle
                            @endif
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


<script>
    const product = @json($product);

    function addToCart() {
        const quantity = document.getElementById('quantity').value;

        window.dispatchEvent(new CustomEvent('add-to-cart', {
            detail: {
                product: product,
                quantity: parseInt(quantity)
            }
        }));
    }
</script>
