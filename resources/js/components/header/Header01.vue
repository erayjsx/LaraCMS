<script lang="ts" setup>
import { ref, h, watch } from "vue";
import { useCartStore } from "../../stores/cart";
import { themeOverrides } from "../../libs/theme";
import { NConfigProvider, MenuOption } from "naive-ui";
import { PhUser } from "@phosphor-icons/vue";
import Search01 from "../search/Search01.vue";
import Basket01 from "../basket/Basket01.vue";
import MobileMenu from "../mobile/mobile-menu.vue";

defineProps({
    title: String,
});

const cartStore = useCartStore();

const active = ref(false);
const activeKey = ref("");

const activate = () => {
    active.value = true;
};

watch(
    () => cartStore.justAdded,
    (newValue) => {
        if (newValue) {
            active.value = true;

            window.scrollTo({
                top: 0,
                behavior: "smooth",
            });
        }
    }
);

const menuOptions: MenuOption[] = [
    {
        label: () =>
            h(
                "a",
                {
                    href: "/",
                },
                "Anasayfa"
            ),
        key: "anasayfa",
    },
    {
        label: "Ürünler",
        key: "urunler",
    },
    {
        label: "Bilgi",
        key: "bilgi",
        children: [
            {
                label: "İletişim",
                key: "iletisim",
            },
            {
                label: "Hakkımızda",
                key: "hakkimizda",
            },
        ],
    },
];
</script>

<template>
    <n-config-provider :theme-overrides="themeOverrides">
        <div
            class="bg-white overflow-hidden group top-0 sticky z-50 border-b border-zinc-100"
        >
            <div
                class="container mx-auto px-4"
                style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    height: 80px;
                "
            >
                <div class="flex items-center gap-4">
                    <div class="lg:hidden">
                        <MobileMenu />
                    </div>

                    <a href="/" class="w-32">
                        <img
                            src="https://www.wavedijital.com/logo.png"
                            alt="logo"
                            style="
                                width: 100%;
                                height: 100%;
                                object-fit: contain;
                            "
                        />
                    </a>
                </div>

                <div
                    style="@media screen and (max-width: 768px) {display: none}"
                    class="max-lg:hidden"
                >
                    <n-menu
                        v-model:value="activeKey"
                        mode="horizontal"
                        :options="menuOptions"
                        responsive
                        class="*:text-base *:font-medium *:*:text-base"
                    />
                </div>

                <n-space
                    :size="18"
                    align="center"
                    style="
                        display: flex;
                        justify-content: center;
                        align-items: center;
                    "
                >
                    <Search01 />
                    <n-button type="none" style="padding: 0">
                        <a href="/login">
                            <PhUser :size="26" />
                        </a>
                    </n-button>
                    <Basket01 />
                </n-space>
            </div>
        </div>
    </n-config-provider>
</template>
