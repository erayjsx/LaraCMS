<!DOCTYPE html>
<html lang="tr" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ödeme</title>
    <link href="https://fonts.cdnfonts.com/css/br-shape" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/br-omny" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html,
        body {
            font-family: 'BR Omny', sans-serif !important;
        }
    </style>
</head>

<body>
    <div id="app">
        <config-provider>
            <main class="mx-auto flex row max-lg:flex-col lg:h-screen">
                <div class="lg:w-3/5 h-screen lg:shadow-xl z-10 flex items-end justify-end">
                    <div class="flex flex-col gap-4 max-lg:p-6 p-12 max-w-2xl w-full h-full overflow-y-auto">
                        <a href="/"
                            class="flex items-center gap-2 text-gray-500 hover:text-black transition-colors row justify-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000000"
                                viewBox="0 0 256 256">
                                <path
                                    d="M224,128a8,8,0,0,1-8,8H59.31l58.35,58.34a8,8,0,0,1-11.32,11.32l-72-72a8,8,0,0,1,0-11.32l72-72a8,8,0,0,1,11.32,11.32L59.31,120H216A8,8,0,0,1,224,128Z">
                                </path>
                            </svg>
                            <p>Siteye Dön</p>
                        </a>

                        <h1 class="text-xl font-medium opacity-75 mt-8">İletişim</h1>

                        <div class="relative mt-2">
                            <input type="email"
                                class="peer pointer-events-auto z-10 w-full placeholder:text-transparent p-3 rounded-lg border-zinc-200 border-2 focus:ring-3 ring-zinc-300 focus:border-black transition duration-300 outline-none focus:shadow-md"
                                placeholder="name" />
                            <label for="email"
                                class="absolute peer-placeholder-shown:max-lg:text-sm select-none peer-placeholder-shown:-z-10 peer-focus:z-0 z-0 left-2 ml-2 -translate-y-3 bg-white px-1 text-sm duration-100 ease-linear peer-placeholder-shown:translate-y-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:text-black peer-focus:ml-2 peer-focus:-translate-y-3 peer-focus:px-1 peer-focus:text-sm">
                                E-Posta
                            </label>
                        </div>


                        <h1 class="text-xl font-medium opacity-75 mt-8">Teslimat Bilgieri</h1>

                        <div class="flex row gap-4">
                            <div class="relative mt-2 w-full">
                                <input type="email"
                                    class="peer w-full placeholder:text-transparent p-3 rounded-lg border-zinc-200 border-2 focus:ring-3 ring-zinc-300 focus:border-black transition duration-300 outline-none focus:shadow-md"
                                    placeholder="name" />
                                <label for="email"
                                    class="absolute max-lg:text-sm select-none peer-placeholder-shown:-z-10 peer-focus:z-0 z-0 left-2 ml-2 -translate-y-3 bg-white px-1 text-sm duration-100 ease-linear peer-placeholder-shown:translate-y-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:text-black peer-focus:ml-2 peer-focus:-translate-y-3 peer-focus:px-1 peer-focus:text-sm">
                                    Ad
                                </label>
                            </div>
                            <div class="relative mt-2 w-full">
                                <input type="email"
                                    class="peer w-full placeholder:text-transparent p-3 rounded-lg border-zinc-200 border-2 focus:ring-3 ring-zinc-300 focus:border-black transition duration-300 outline-none focus:shadow-md"
                                    placeholder="name" />
                                <label for="email"
                                    class="absolute max-lg:text-sm select-none peer-placeholder-shown:-z-10 peer-focus:z-0 z-0 left-2 ml-2 -translate-y-3 bg-white px-1 text-sm duration-100 ease-linear peer-placeholder-shown:translate-y-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:text-black peer-focus:ml-2 peer-focus:-translate-y-3 peer-focus:px-1 peer-focus:text-sm">
                                    Soyad
                                </label>
                            </div>
                        </div>

                        <div class="relative mt-2">
                            <textarea type="email"
                                class="peer w-full placeholder:text-transparent p-3 max-h-44 rounded-lg border-zinc-200 border-2 focus:ring-3 ring-zinc-300 focus:border-black transition duration-300 outline-none focus:shadow-md"
                                placeholder="name"></textarea>
                            <label for="email"
                                class="absolute max-lg:text-sm select-none left-2 ml-2 -translate-y-3 bg-white px-1 text-sm overflow-hidden duration-100 ease-linear peer-placeholder-shown:translate-y-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:text-black peer-focus:ml-2 peer-focus:-translate-y-3 peer-focus:px-1 peer-focus:text-sm">
                                Adresiniz
                            </label>
                        </div>

                        <div class="flex row gap-4">
                            <div class="relative mt-2 w-full">
                                <input type="email"
                                    class="peer w-full placeholder:text-transparent p-3 rounded-lg border-zinc-200 border-2 focus:ring-3 ring-zinc-300 focus:border-black transition duration-300 outline-none focus:shadow-md"
                                    placeholder="name" />
                                <label for="email"
                                    class="absolute max-lg:text-sm select-none peer-placeholder-shown:-z-10 peer-focus:z-0 z-0 left-2 ml-2 -translate-y-3 bg-white px-1 text-sm duration-100 ease-linear peer-placeholder-shown:translate-y-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:text-black peer-focus:ml-2 peer-focus:-translate-y-3 peer-focus:px-1 peer-focus:text-sm">
                                    Apartman, Daire No
                                </label>
                            </div>
                            <div class="relative mt-2 w-full">
                                <input type="email"
                                    class="peer w-full placeholder:text-transparent p-3 rounded-lg border-zinc-200 border-2 focus:ring-3 ring-zinc-300 focus:border-black transition duration-300 outline-none focus:shadow-md"
                                    placeholder="name" />
                                <label for="email"
                                    class="absolute max-lg:text-sm select-none peer-placeholder-shown:-z-10 peer-focus:z-0 z-0 left-2 ml-2 -translate-y-3 bg-white px-1 text-sm duration-100 ease-linear peer-placeholder-shown:translate-y-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:text-black peer-focus:ml-2 peer-focus:-translate-y-3 peer-focus:px-1 peer-focus:text-sm">
                                    Posta Kodu
                                </label>
                            </div>
                        </div>

                        <div class="flex row gap-4">
                            <div class="relative mt-2 w-full">
                                <select type="email"
                                    class="peer w-full pr-4 placeholder:text-transparent p-3 rounded-lg border-zinc-200 border-2 focus:ring-3 ring-zinc-300 focus:border-black transition duration-300 outline-none focus:shadow-md"
                                    placeholder="name">
                                    <option value="">istanbıl</option>
                                </select>

                            </div>
                            <div class="relative mt-2 w-full">
                                <select type="email"
                                    class="peer w-full placeholder:text-transparent p-3 rounded-lg border-zinc-200 border-2 focus:ring-3 ring-zinc-300 focus:border-black transition duration-300 outline-none focus:shadow-md"
                                    placeholder="name">
                                    <option value="">istanbıl</option>

                                </select>

                            </div>
                        </div>


                        <h1 class="text-xl font-medium opacity-75 mt-8">Ödeme</h1>

                        <div class="relative mt-2 w-full">
                            <input type="email"
                                class="peer w-full placeholder:text-transparent p-3 rounded-lg border-zinc-200 border-2 focus:ring-3 ring-zinc-300 focus:border-black transition duration-300 outline-none focus:shadow-md"
                                placeholder="name" />
                            <label for="email"
                                class="absolute max-lg:text-sm select-none peer-placeholder-shown:-z-10 peer-focus:z-0 z-0 left-2 ml-2 -translate-y-3 bg-white px-1 text-sm duration-100 ease-linear peer-placeholder-shown:translate-y-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:text-black peer-focus:ml-2 peer-focus:-translate-y-3 peer-focus:px-1 peer-focus:text-sm">
                                Kart Üzerindeki Ad Soyad
                            </label>
                        </div>

                        <div class="relative mt-2 w-full">
                            <input type="email"
                                class="peer w-full placeholder:text-transparent p-3 rounded-lg border-zinc-200 border-2 focus:ring-3 ring-zinc-300 focus:border-black transition duration-300 outline-none focus:shadow-md"
                                placeholder="name" />
                            <label for="email"
                                class="absolute max-lg:text-sm select-none peer-placeholder-shown:-z-10 peer-focus:z-0 z-0 left-2 ml-2 -translate-y-3 bg-white px-1 text-sm duration-100 ease-linear peer-placeholder-shown:translate-y-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:text-black peer-focus:ml-2 peer-focus:-translate-y-3 peer-focus:px-1 peer-focus:text-sm">
                                Kart Numarası
                            </label>
                        </div>

                        <div class="flex row gap-4">
                            <div class="relative mt-2 w-full">
                                <input type="email"
                                    class="peer w-full placeholder:text-transparent p-3 rounded-lg border-zinc-200 border-2 focus:ring-3 ring-zinc-300 focus:border-black transition duration-300 outline-none focus:shadow-md"
                                    placeholder="name" />
                                <label for="email"
                                    class="absolute max-lg:text-sm select-none peer-placeholder-shown:-z-10 peer-focus:z-0 z-0 left-2 ml-2 -translate-y-3 bg-white px-1 text-sm duration-100 ease-linear peer-placeholder-shown:translate-y-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:text-black peer-focus:ml-2 peer-focus:-translate-y-3 peer-focus:px-1 peer-focus:text-sm">
                                    Son Kullanım Tarihi
                                </label>
                            </div>
                            <div class="relative mt-2 w-full">
                                <input type="email"
                                    class="peer w-full placeholder:text-transparent p-3 rounded-lg border-zinc-200 border-2 focus:ring-3 ring-zinc-300 focus:border-black transition duration-300 outline-none focus:shadow-md"
                                    placeholder="name" />
                                <label for="email"
                                    class="absolute max-lg:text-sm select-none peer-placeholder-shown:-z-10 peer-focus:z-0 z-0 left-2 ml-2 -translate-y-3 bg-white px-1 text-sm duration-100 ease-linear peer-placeholder-shown:translate-y-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:text-black peer-focus:ml-2 peer-focus:-translate-y-3 peer-focus:px-1 peer-focus:text-sm">
                                    CVV Kodu
                                </label>
                            </div>
                        </div>


                        <a href="/checkout"
                            class="bg-black mt-4 text-white p-2 h-14 font-medium rounded-lg text-center flex items-center justify-center">
                            Alışverişi Tamamla
                        </a>
                    </div>
                </div>

                <div class="lg:w-2/5 bg-gray-100 flex items-start justify-start lg:h-screen">
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
        </config-provider>
    </div>
</body>

</html>
