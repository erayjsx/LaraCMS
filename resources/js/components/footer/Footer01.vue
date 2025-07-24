<script setup lang="ts">
import {
    PhInstagramLogo,
    PhXLogo,
    PhFacebookLogo,
    PhYoutubeLogo,
} from "@phosphor-icons/vue";
</script>

<template>
    <footer class="border-t border-gray-200 pt-10 0">
        <div
            class="container max-lg:flex-col min-h-66 mx-auto h-full px-4 flex justify-between gap-4 items-start"
        >
            <div
                class="lg:w-52 max-lg:mb-4 flex flex-col gap-2 items-start justify-start h-full"
            >
                <img
                    src="https://i.ibb.co/fYdTLd9x/image.png"
                    alt="Wavedijital Logo"
                    class="w-28 h-8 object-contain brightness-100 invert mx-auto"
                />
            </div>

            <div
                class="flex row gap-16 h-full max-md:gap-y-8 max-md:flex-col max-md:gap-4"
            >
                <div class="h-full">
                    <div class="mb-2 text-lg font-medium">Kategoriler</div>

                    <nav
                        class="flex flex-col space-y-4 md:space-y-3 md:space-x-8 text-left *:text-base *:hover:underline *:opacity-75 hover:opacity-100"
                    >
                        <a href="/">Anasayfa</a>
                        <a href="/urunler">Ürünler</a>
                        <a href="/hakkimizda">Hakkımızda</a>
                        <a href="/iletisim">İletişim</a>
                    </nav>
                </div>

                <div class="h-full">
                    <div class="mb-2 text-lg font-medium">Hakkımızda</div>

                    <nav
                        class="flex flex-col space-y-4 md:space-y-3 md:space-x-8 text-left *:text-base *:hover:underline *:opacity-75 hover:opacity-100"
                    >
                        <a href="/iletisim">İletişim</a>
                        <a href="/iletisim">Sıkça Sorulan Sorular</a>
                    </nav>
                </div>

                <div class="h-full">
                    <div class="mb-2 text-lg font-medium">Destek</div>

                    <nav
                        class="flex flex-col space-y-4 md:space-y-3 md:space-x-8 text-left *:text-base *:hover:underline *:opacity-75 hover:opacity-100"
                    >
                        <a href="/">Kullanıcı Sözleşmesi</a>
                        <a href="/urunler">Aydınlatma Metni</a>
                        <a href="/hakkimizda">Beden Tablosu</a>
                        <a href="/iletisim">Kargo ve İade</a>
                    </nav>
                </div>
            </div>

            <div
                class="w-52 flex flex-col gap-2 items-start justify-start h-full"
            ></div>
        </div>

        <div
            class="mx-auto h-20 pb-12 px-4 bg-zinc-950 text-white max-lg:h-44 max-lg:pt-8"
        >
            <div
                class="container mx-auto flex justify-between items-center h-20 max-lg:flex-col"
            >
                <div class="opacity-70">
                    2025 @ <a href="/" class="hover:underline">wavedijital</a>
                    tüm hakları saklıdır.
                </div>
                <div
                    class="flex gap-4 *:opacity-50 *:hover:opacity-100 *:transition-all *:duration-300"
                >
                    <a href="#">
                        <PhInstagramLogo :size="24" weight="fill" />
                    </a>
                    <a href="#">
                        <PhXLogo :size="24" weight="fill" />
                    </a>
                    <a href="#">
                        <PhFacebookLogo :size="24" weight="fill" />
                    </a>
                    <a href="#">
                        <PhYoutubeLogo :size="24" weight="fill" />
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>

<style scoped></style>
