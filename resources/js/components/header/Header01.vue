<script lang="ts" setup>
import type { Component } from "vue";
import { ref, computed, h, watch, render } from "vue";
import { useCartStore } from "../../stores/cart";
import { themeOverrides } from "../../libs/theme";
import { NConfigProvider, MenuOption, NIcon } from "naive-ui";
import {
    PhChevronDown,
    PhUser,
    PhShoppingBag,
    PhMinus,
    PhPlus,
    PhTrash,
} from "@phosphor-icons/vue";

defineProps({
    title: String,
});

const cartStore = useCartStore();

function addToCart(product) {
    cartStore.addItem(product);
}

const cartItemCount = computed(() => cartStore.itemCount);
const active = ref(false);
const active2 = ref(false);
const activeKey = ref("");

const activate = () => {
    active.value = true;
};

const activate2 = () => {
    active2.value = true;
};

function renderIcon(icon: Component) {
    return () => h(NIcon, null, { default: () => h(icon, { size: 20 }) });
}

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

const formatPrice = (price) => {
    return new Intl.NumberFormat("tr-TR", {
        style: "currency",
        currency: "TRY",
        minimumFractionDigits: 2,
    }).format(price);
};

const cartTotal = computed(() => cartStore.totalPrice);
</script>

<template>
    <n-config-provider :theme-overrides="themeOverrides">
        <div
            style="
                background-color: #fff;
                top: 0px;
                z-index: 1000;
                position: sticky !important;
                width: 100%;
            "
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
                        <n-button
                            @click="activate"
                            type="none"
                            style="padding: 0"
                        >
                            <PhList :size="26" />
                        </n-button>
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
                    <n-button @click="activate2" type="none" style="padding: 0">
                        <PhMagnifyingGlass :size="26" />
                    </n-button>
                    <n-button type="none" style="padding: 0">
                        <a href="/login">
                            <PhUser :size="26" />
                        </a>
                    </n-button>
                    <n-button @click="activate" type="none" style="padding: 0">
                        <n-badge
                            :value="cartItemCount"
                            :show="cartItemCount > 0"
                        >
                            <PhShoppingBag :size="26" />
                        </n-badge>
                    </n-button>
                </n-space>

                <n-drawer
                    v-model:show="active"
                    placement="right"
                    style="width: 100%; max-width: 500px"
                >
                    <n-drawer-content
                        title="Sepetim"
                        closable
                        :header-style="{
                            paddingTop: '1rem',
                            lineHeight: '2.5rem',
                            fontSize: '1.5rem',
                            fontWeight: 'medium',
                        }"
                    >
                        <div
                            v-if="cartStore.items.length === 0"
                            class="text-center py-8"
                        >
                            <PhShoppingBag
                                :size="48"
                                class="mx-auto mb-4 text-gray-400"
                            />
                            <p class="text-gray-500">Sepetiniz boş</p>
                        </div>

                        <div v-else>
                            <div
                                v-for="item in cartStore.items"
                                :key="item.id"
                                class="mb-4 p-4 border border-gray-200 rounded-lg"
                            >
                                <div class="flex justify-between items-start">
                                    <div class="w-20 h-12 mr-4">
                                        <img
                                            :src="item.image"
                                            alt="Ürün Resmi"
                                            class="w-20 h-20 object-cover"
                                        />
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold">
                                            {{ item.name }}
                                        </h4>
                                        <p class="text-sm text-gray-600">
                                            {{ formatPrice(item.price) }}
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <div
                                            class="flex items-center border rounded-md"
                                        >
                                            <n-button
                                                @click="
                                                    cartStore.decreaseQuantity(
                                                        item.id
                                                    )
                                                "
                                                size="small"
                                                quaternary
                                                style="
                                                    padding: 4px 8px;
                                                    min-width: 30px;
                                                "
                                            >
                                                <PhMinus :size="14" />
                                            </n-button>
                                            <span
                                                class="px-3 py-1 min-w-[40px] text-center text-sm"
                                                >{{ item.quantity }}</span
                                            >
                                            <n-button
                                                @click="
                                                    cartStore.increaseQuantity(
                                                        item.id
                                                    )
                                                "
                                                size="small"
                                                quaternary
                                                style="
                                                    padding: 4px 8px;
                                                    min-width: 30px;
                                                "
                                            >
                                                <PhPlus :size="14" />
                                            </n-button>
                                        </div>
                                        <n-button
                                            @click="
                                                cartStore.removeItem(item.id)
                                            "
                                            type="error"
                                            size="small"
                                            quaternary
                                        >
                                            <PhTrash :size="16" />
                                        </n-button>
                                    </div>
                                </div>
                                <div class="mt-2 text-right">
                                    <span class="font-semibold">{{
                                        formatPrice(item.price * item.quantity)
                                    }}</span>
                                </div>
                            </div>
                        </div>

                        <template #footer>
                            <div class="w-full space-y-4 p-0">
                                <div>
                                    <div
                                        class="flex justify-between items-center text-lg font-bold"
                                    >
                                        <span>Toplam:</span>
                                        <span>{{
                                            formatPrice(cartTotal)
                                        }}</span>
                                    </div>
                                </div>
                                <n-button
                                    block
                                    type="primary"
                                    size="large"
                                    style="padding: 1.6rem"
                                    :disabled="cartStore.items.length === 0"
                                >
                                    Ödeme Yap ({{ formatPrice(cartTotal) }})
                                </n-button>
                                <a href="/cart">
                                    <n-button
                                        block
                                        type="default"
                                        size="large"
                                        style="
                                            padding: 1.6rem;
                                            margin-top: 0.6rem;
                                        "
                                        :disabled="cartStore.items.length === 0"
                                    >
                                        Sepete Git
                                    </n-button></a
                                >
                            </div>
                        </template>
                    </n-drawer-content>
                </n-drawer>

                <n-drawer v-model:show="active2" placement="top">
                    <n-drawer-content
                        title="Ürün Ara"
                        closable
                        :header-style="{
                            paddingTop: '1rem',
                            lineHeight: '2.5rem',
                            fontSize: '1.5rem',
                            fontWeight: 'medium',
                            width: '100%',
                            maxWidth: '80%',
                            margin: '0 auto',
                        }"
                    >
                        <div
                            style="
                                flex: 1;
                                display: flex;
                                flex-direction: column;
                                justify-content: space-between;
                            "
                        >
                            <n-input
                                placeholder="Ürün adı veya açıklama..."
                                size="large"
                                clearable
                            />
                        </div>
                    </n-drawer-content>
                </n-drawer>
            </div>
        </div>
    </n-config-provider>
</template>
