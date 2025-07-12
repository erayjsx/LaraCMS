<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8" />
    <title>{{ $product->name }} - Vue E-Ticaret</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
    <div id="app">
        <header01 :title="'E-Ticaret'"></header01>
        
        <main class="container mx-auto px-4 py-8">
            <div class="max-w-6xl mx-auto">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 p-6">
                        <!-- Ürün Görseli -->
                        <div class="space-y-4">
                            <img 
                                src="{{ $product->image ?: 'https://via.placeholder.com/500x400?text=No+Image' }}"
                                alt="{{ $product->name }}"
                                class="w-full h-96 object-cover rounded-lg"
                            >
                        </div>
                        
                        <!-- Ürün Detayları -->
                        <div class="space-y-6">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                                <p class="text-4xl font-bold text-blue-600 mb-4">
                                    {{ number_format($product->price, 2, ',', '.') }} ₺
                                </p>
                            </div>
                            
                            @if($product->description)
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Açıklama</h3>
                                <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
                            </div>
                            @endif
                            
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Stok Durumu</h3>
                                @if($product->stock > 0)
                                    <p class="text-green-600 font-medium">{{ $product->stock }} adet stokta</p>
                                @else
                                    <p class="text-red-600 font-medium">Stokta yok</p>
                                @endif
                            </div>
                            
                            <div class="space-y-4">
                                <div class="flex items-center gap-4">
                                    <label class="text-sm font-medium text-gray-700">Adet:</label>
                                    <input 
                                        type="number" 
                                        min="1" 
                                        max="{{ $product->stock }}"
                                        value="1"
                                        class="w-20 px-3 py-2 border border-gray-300 rounded-md"
                                        id="quantity"
                                    >
                                </div>
                                
                                <div class="flex gap-4">
                                    <button 
                                        onclick="addToCart()"
                                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-200 {{ $product->stock <= 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                        {{ $product->stock <= 0 ? 'disabled' : '' }}
                                    >
                                        @if($product->stock <= 0)
                                            Stokta Yok
                                        @else
                                            Sepete Ekle
                                        @endif
                                    </button>
                                    
                                    <a 
                                        href="/"
                                        class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-3 px-6 rounded-lg transition-colors duration-200 text-center"
                                    >
                                        Ürünlere Dön
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script>
        // Ürün verilerini JavaScript'e aktar
        const product = @json($product);
        
        function addToCart() {
            const quantity = document.getElementById('quantity').value;
            
            // Vue store'a erişim için window event kullan
            window.dispatchEvent(new CustomEvent('add-to-cart', {
                detail: {
                    product: product,
                    quantity: parseInt(quantity)
                }
            }));
        }
    </script>
</body>

</html> 