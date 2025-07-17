<script lang="ts" setup>
import { ref, computed, watch } from "vue";
import { useCartStore } from "../../stores/cart";
import { PhShoppingBag, PhMinus, PhPlus, PhTrash } from "@phosphor-icons/vue";

defineProps({
    title: String,
});

const cartStore = useCartStore();

const cartItemCount = computed(() => cartStore.itemCount);
const active = ref(false);
const active2 = ref(false);

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
    <n-button
        @click="activate"
        type="none"
        style="padding: 0"
        aria-label="Sepetim"
        title="Sepetim"
    >
        <n-badge :value="cartItemCount" :show="cartItemCount > 0">
            <PhShoppingBag :size="24" />
        </n-badge>
    </n-button>
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
            <div v-if="cartStore.items.length === 0" class="text-center py-8">
                <PhShoppingBag :size="48" class="mx-auto mb-4 text-gray-400" />
                <p class="text-gray-500">Sepetiniz boş</p>
            </div>

            <div v-else>
                <div
                    v-for="item in cartStore.items"
                    :key="item.id"
                    class="mb-4 p-4 border border-gray-200 rounded-lg h-32"
                >
                    <div class="flex justify-between items-start h-full">
                        <div class="w-20 h-12 mr-4">
                            <img
                                :src="item.image"
                                alt="Ürün Resmi"
                                class="w-20 h-24 object-cover"
                            />
                        </div>
                        <div
                            class="flex-1 flex flex-col justify-between items-start h-full"
                        >
                            <h4 class="font-semibold">
                                {{ item.name }}
                            </h4>
                            <div
                                class="flex items-center border rounded-md border-zinc-300 w-auto"
                            >
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
                        </div>
                        <div
                            class="text-right flex flex-col h-full justify-between items-end"
                        >
                            <div class="flex items-center gap-2">
                                <button
                                    @click="cartStore.removeItem(item.id)"
                                    type="none"
                                    class="cursor-pointer"
                                >
                                    <PhTrash :size="20" color="red" />
                                </button>
                            </div>

                            <span class="font-semibold text-lg">{{
                                formatPrice(item.price * item.quantity)
                            }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <template #footer>
                <div class="w-full space-y-4 p-0">
                    <div>
                        <div
                            class="flex justify-between items-center text-sm mb-2"
                        >
                            <span>KDV (20%):</span>
                            <span>₺400</span>
                        </div>
                        <div
                            class="flex justify-between items-center text-lg font-bold"
                        >
                            <span>Toplam:</span>
                            <span>{{ formatPrice(cartTotal) }}</span>
                        </div>
                    </div>

                    <a
                        href="/checkout"
                        aria-label="Sepete Git"
                        title="Sepete Git"
                    >
                        <n-button
                            block
                            type="primary"
                            size="large"
                            style="padding: 1.6rem"
                            :disabled="cartStore.items.length === 0"
                            aria-label="Ödeme Yap"
                            title="Ödeme Yap"
                        >
                            Ödeme Yap
                        </n-button>
                    </a>
                    <n-button
                        @click="active = false"
                        block
                        type="default"
                        size="large"
                        style="padding: 1.6rem; margin-top: 0.6rem"
                        aria-label="Alışverişe Devam Et"
                        title="Alışverişe Devam Et"
                    >
                        Alışverişe Devam Et
                    </n-button>
                </div>
            </template>
        </n-drawer-content>
    </n-drawer>
</template>
