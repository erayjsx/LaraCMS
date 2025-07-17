<script setup>
import { ref, onMounted, computed } from "vue";
import { useIsMobile } from "../../libs/useIsMobile";
import ProductCard from "./ProductCard.vue";

defineProps({
    title: String,
});

const products = ref([]);
const loading = ref(false);
const error = ref(null);

const fetchProducts = async () => {
    loading.value = true;
    error.value = null;

    try {
        const response = await fetch("/products", {
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
        });

        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }

        const data = await response.json();
        products.value = data;
    } catch (err) {
        error.value = err.message;
        console.error("Ürünler yüklenirken hata:", err);
    } finally {
        loading.value = false;
    }
};

onMounted(() => {
    fetchProducts();
});

const { isMobile } = useIsMobile();

const slidePerViews = computed(() => (isMobile.value ? 2 : 5));
const arrowShow = computed(() => products.value.length > slidePerViews.value);
</script>

<template>
    <div class="py-8 w-full px-0">
        <h2 v-if="title" class="text-2xl font-semibold mb-8 text-gray-800">
            {{ title }}
        </h2>

        <div v-if="loading" class="flex justify-center items-center py-12">
            <PhSpinnerGap :size="48" class="animate-spin" />
        </div>

        <div v-else-if="error" class="text-center py-12">
            <div
                class="bg-red-50 border border-red-200 rounded-lg p-6 max-w-md mx-auto"
            >
                <div
                    class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-red-100 rounded-full"
                >
                    <svg
                        class="w-6 h-6 text-red-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        ></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-red-800 mb-2">Hata</h3>
                <p class="text-red-600 mb-4">{{ error }}</p>
                <button
                    @click="fetchProducts"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors duration-200"
                >
                    Tekrar Dene
                </button>
            </div>
        </div>

        <div v-else-if="products.length === 0" class="text-center py-12">
            <div
                class="bg-gray-50 border border-gray-200 rounded-lg p-6 max-w-md mx-auto"
            >
                <div
                    class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-gray-100 rounded-full"
                >
                    <svg
                        class="w-6 h-6 text-gray-600"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m13-8a2 2 0 00-2-2H9a2 2 0 00-2 2v1m8 0V6a2 2 0 00-2-2H9a2 2 0 00-2 2v1"
                        ></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-800 mb-2">
                    Henüz ürün yok
                </h3>
                <p class="text-gray-600">
                    Şu anda görüntülenecek ürün bulunmamaktadır.
                </p>
            </div>
        </div>

        <n-carousel
            :slides-per-view="slidePerViews"
            :space-between="20"
            :loop="false"
            draggable
            :show-arrow="arrowShow"
            :show-dots="false"
            class="product-carousel"
        >
            <ProductCard
                v-for="product in products"
                :key="product.id"
                :product="product"
            />
            <template #arrow="{ prev, next }">
                <div class="custom-arrow">
                    <button
                        type="button"
                        class="custom-arrow--left"
                        @click="prev"
                    >
                        <n-icon :size="32"><PhArrowLeft /></n-icon>
                    </button>
                    <button
                        type="button"
                        class="custom-arrow--right"
                        @click="next"
                    >
                        <n-icon :size="32"><PhArrowRight /></n-icon>
                    </button>
                </div>
            </template>
        </n-carousel>
    </div>
</template>

<style scoped>
.container {
    max-width: 1200px;
}

.product-carousel:hover {
    transition: all 0.3s ease;
    .custom-arrow {
        display: flex;
    }
}

.custom-arrow {
    overflow: hidden;
    transition: all 0.3s ease;
    display: none;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 14px;
    left: 14px;
    justify-content: space-between;
    z-index: 10;

    button {
        cursor: pointer;
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #fff;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
    }
}
</style>
