<!DOCTYPE html>
<html lang="tr" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ödeme</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <n-loading-bar-provider>
            <main class="mx-auto flex row h-screen">

                <div class="w-3/5 h-screen shadow-lg shadow-black flex items-end justify-end">
                    <div class="flex flex-col gap-4 p-8 max-w-screen-md w-full h-full">
                        <a href="/"
                            class="flex items-center gap-2 text-gray-500 hover:text-black transition-colors">
                            Siteye Dön
                        </a>

                        <h1 class="text-xl font-bold">İletişim</h1>
                        <div>
                            <n-input v-model:value="value" type="text" placeholder="E-posta" size="large" />
                        </div>

                        <h1 class="text-xl font-bold">Adres Bilgileri</h1>
                        <div>
                            <n-input v-model:value="value" type="text" placeholder="E-posta" size="large" />
                        </div>

                        <h1 class="text-xl font-bold">Ödeme</h1>
                        <div>
                            <n-input v-model:value="value" type="text" placeholder="E-posta" size="large" />
                        </div>

                        <a href="/checkout"
                            class="bg-black text-white p-2 h-12 font-semibold rounded-md text-center flex items-center justify-center">
                            Alışverişi Tamamla
                        </a>
                    </div>
                </div>

                <div class="w-2/5 bg-gray-100 flex items-start justify-start h-screen">
                    <div class="flex flex-col gap-4 p-8 max-w-md w-full h-full">
                        <div class="flex flex-col gap-2">
                            <h1 class="text-xl font-bold">Sipariş Özeti</h1>
                        </div>
                        <div class="flex flex-col gap-2">
                            <div class="flex justify-between">
                                <span>Toplam Fiyat</span>
                                <span>100 TL</span>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </main>
        </n-loading-bar-provider>
    </div>
</body>

</html>
