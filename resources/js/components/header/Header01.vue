<script setup lang="ts">
import { ref, watch, computed } from "vue";
import { useCartStore } from "../../stores/cart";
import { themeOverrides } from "../../libs/theme";
import { NConfigProvider } from "naive-ui";
import { PhUser } from "@phosphor-icons/vue";
import Search01 from "../search/Search01.vue";
import Basket01 from "../basket/Basket01.vue";
import MobileMenu from "../mobile/mobile-menu.vue";

const props = defineProps<{
    title: string;
    login: boolean;
    headerAlign?: string;
    headerBgColor?: string;
    headerForegroundColor?: string;
}>();

const headerAlign = computed(() => props.headerAlign || "left");
const headerBgColor = computed(() => props.headerBgColor || "#fff");
const headerForegroundColor = computed(
    () => props.headerForegroundColor || "#000"
);

const cartStore = useCartStore();
const active = ref(false);
const menuVisible = ref(false);

const showMenu = () => {
    menuVisible.value = true;
};
const hideMenu = () => {
    menuVisible.value = false;
};

watch(
    () => cartStore.justAdded,
    (newValue) => {
        if (newValue) {
            active.value = true;
            window.scrollTo({ top: 0, behavior: "smooth" });
        }
    }
);

const mainMenuLinks = [
    { name: "Ana Sayfa", href: "/" },
    { name: "İndirim", href: "/indirim" },
    {
        name: "Bileklik",
        submenuTitle: "Bileklik",
        submenu: [
            { name: "Çelik Bileklik", href: "/celik-bileklik" },
            { name: "Deri Bileklik", href: "/deri-bileklik" },
            { name: "Örgü Bileklik", href: "/orgu-bileklik" },
            { name: "Taşlı Bileklik", href: "/tasli-bileklik" },
        ],
    },
    { name: "Kampanyalar", href: "/kampanyalar" },
];

const firstChunk = computed(() => mainMenuLinks.value.slice(0, 3)); // 0,1,2
const secondChunk = computed(() => mainMenuLinks.value.slice(3, 6)); // 3,4,5
</script>

<template>
    <n-config-provider :theme-overrides="themeOverrides">
        <div
            :style="{
                backgroundColor: headerBgColor,
                color: headerForegroundColor,
                textAlign: headerAlign,
            }"
            class="sticky top-0 z-50 group hover:!bg-white hover:!text-black transition-colors duration-300"
        >
            <div
                class="container mx-auto px-4 flex justify-between items-center h-20"
            >
                <div
                    class="flex items-center gap-0 justify-start"
                    :class="{
                        'flex-2 ': headerAlign === 'left',
                        'flex-1 lg:hidden': headerAlign === 'center',
                    }"
                >
                    <div class="lg:hidden flex flex-1 items-center">
                        <MobileMenu :items="mainMenuLinks" />
                    </div>

                    <a
                        href="/"
                        class="w-28 mr-4"
                        aria-label="Anasayfa"
                        title="Anasayfa"
                        wire:navigate
                        v-if="headerAlign === 'left'"
                    >
                        <img
                            src="https://i.ibb.co/fYdTLd9x/image.png"
                            alt="Wavedijital Logo"
                            class="w-28 h-20 object-contain group-hover:brightness-100 group-hover:invert transition-all duration-300"
                        />
                    </a>
                </div>

                <div
                    class="hidden lg:flex items-center gap-6"
                    :class="{
                        'flex-1 justify-start': headerAlign === 'center',
                        'flex-2 justify-center': headerAlign === 'left',
                    }"
                >
                    <template
                        v-for="(link, index) in mainMenuLinks"
                        :key="index"
                    >
                        <a
                            wire:navigate
                            v-if="!link.submenu"
                            :href="link.href"
                            class="text-base font-medium hover:opacity-75 transition-opacity"
                        >
                            {{ link.name }}
                        </a>

                        <div
                            v-else
                            class="relative"
                            @mouseenter="showMenu"
                            @mouseleave="hideMenu"
                        >
                            <button
                                class="text-base font-medium cursor-pointer flex items-center justify-center h-20 gap-1"
                            >
                                <span>{{ link.name }}</span>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="20"
                                    height="20"
                                    fill="currentColor"
                                    viewBox="0 0 256 256"
                                    class="mb-1"
                                >
                                    <path
                                        d="M216.49,104.49l-80,80a12,12,0,0,1-17,0l-80-80a12,12,0,0,1,17-17L128,159l71.51-71.52a12,12,0,0,1,17,17Z"
                                    />
                                </svg>
                            </button>

                            <transition name="fade">
                                <div
                                    v-show="menuVisible"
                                    class="fixed top-20 left-0 right-0 z-30 bg-white text-black shadow-lg py-12 transition-all duration-200"
                                >
                                    <div class="container mx-auto px-4">
                                        <div class="grid grid-cols-1 gap-4">
                                            <ul class="space-y-2">
                                                <li
                                                    v-for="item in link.submenu"
                                                    :key="item.name"
                                                >
                                                    <b class="text-black">
                                                        {{ item.submenuTitle }}
                                                    </b>
                                                    <a
                                                        :href="item.href"
                                                        wire:navigate
                                                        class="hover:opacity-75 transition-opacity text-base"
                                                    >
                                                        {{ item.name }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </transition>
                            <transition name="fade">
                                <div
                                    v-show="menuVisible"
                                    class="fixed inset-0 top-20 z-20 bg-black/5 backdrop-blur-sm transition-all duration-200"
                                    @click="hideMenu"
                                ></div>
                            </transition>
                        </div>
                    </template>
                </div>

                <a
                    wire:navigate
                    href="/"
                    class="flex-2 flex items-center justify-center mx-auto"
                    aria-label="Anasayfa"
                    title="Anasayfa"
                    v-if="headerAlign === 'center'"
                >
                    <img
                        src="https://i.ibb.co/fYdTLd9x/image.png"
                        alt="Wavedijital Logo"
                        class="w-28 h-20 object-contain group-hover:brightness-100 group-hover:invert transition-all duration-300"
                    />
                </a>

                <div class="flex-1 flex justify-end items-end">
                    <Search01 />
                    <n-button type="none" class="p-0" aria-label="Giriş Yap">
                        <a
                            :href="props.login === 'true' ? '/me' : '/login'"
                            title="Giriş Yap"
                        >
                            <PhUser :size="24" />
                        </a>
                    </n-button>
                    <Basket01 />
                </div>
            </div>
        </div>
    </n-config-provider>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s ease;
}
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
