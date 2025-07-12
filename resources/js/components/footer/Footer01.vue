<script setup lang="ts">
import {
    PhInstagramLogo,
    PhXLogo,
    PhFacebookLogo,
    PhYoutubeLogo,
} from "@phosphor-icons/vue";
</script>

<template>
    <footer class="h-80 border-t border-gray-200 pt-10 pb-20">
        <div class="container mx-auto h-full">
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
        <div class="container mx-auto flex justify-between items-center h-16">
            <div>@ 2025 Wavedijital. Tüm hakları saklıdır.</div>
            <div
                class="flex gap-4 *:opacity-50 *:hover:opacity-100 *:transition-all *:duration-300"
            >
                <a href="#">
                    <PhInstagramLogo :size="28" />
                </a>
                <a href="#">
                    <PhXLogo :size="28" />
                </a>
                <a href="#">
                    <PhFacebookLogo :size="28" />
                </a>
                <a href="#">
                    <PhYoutubeLogo :size="28" />
                </a>
            </div>
        </div>
    </footer>
</template>

<style scoped></style>
