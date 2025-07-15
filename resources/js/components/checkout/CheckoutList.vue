<script lang="ts" setup>
import { ref, computed, h, watch, render } from "vue";
import { useCartStore } from "../../stores/cart";
import { PhShoppingBag, PhMinus, PhPlus, PhTrash } from "@phosphor-icons/vue";

const cartStore = useCartStore();

const cartItemCount = computed(() => cartStore.itemCount);
const active = ref(false);

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
    <div v-if="cartStore.items.length === 0" class="text-center py-8">
        <PhShoppingBag :size="48" class="mx-auto mb-4 text-gray-400" />
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
                    <div class="flex items-center border rounded-md">
                        <n-button
                            @click="cartStore.decreaseQuantity(item.id)"
                            size="small"
                            quaternary
                            style="padding: 4px 8px; min-width: 30px"
                        >
                            <PhMinus :size="14" />
                        </n-button>
                        <span
                            class="px-3 py-1 min-w-[40px] text-center text-sm"
                            >{{ item.quantity }}</span
                        >
                        <n-button
                            @click="cartStore.increaseQuantity(item.id)"
                            size="small"
                            quaternary
                            style="padding: 4px 8px; min-width: 30px"
                        >
                            <PhPlus :size="14" />
                        </n-button>
                    </div>
                    <n-button
                        @click="cartStore.removeItem(item.id)"
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
</template>
