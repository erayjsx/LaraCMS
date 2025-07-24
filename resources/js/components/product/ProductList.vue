<script setup>
import { ref, onMounted, computed } from "vue";
import { useIsMobile } from "../../libs/useIsMobile";
import ProductCard from "./ProductCard.vue";

const props = defineProps({
    title: {
        type: String,
        required: true,
    },
    items: {
        type: Array,
        required: true,
    },
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
        <h2
            v-if="props.title"
            class="text-2xl font-semibold mb-8 text-gray-800"
        >
            {{ props.title }}
        </h2>

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
