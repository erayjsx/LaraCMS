<script setup lang="ts">
import {
    PhInstagramLogo,
    PhXLogo,
    PhFacebookLogo,
    PhYoutubeLogo,
} from "@phosphor-icons/vue";
</script>

<template>
    <footer class="h-80 border-t border-gray-200 pt-10 0">
        <div class="container mx-auto h-full px-4">
            <div class="footer-content">
                <div class="footer-content-left">
                    <img
                        src="https://www.wavedijital.com/logo.png"
                        alt="logo"
                        class="w-32 h-24 object-contain"
                    />
                </div>
            </div>
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
                        <PhInstagramLogo :size="28" weight="fill" />
                    </a>
                    <a href="#">
                        <PhXLogo :size="28" weight="fill" />
                    </a>
                    <a href="#">
                        <PhFacebookLogo :size="28" weight="fill" />
                    </a>
                    <a href="#">
                        <PhYoutubeLogo :size="28" weight="fill" />
                    </a>
                </div>
            </div>
        </div>
    </footer>
</template>

<style scoped></style>
