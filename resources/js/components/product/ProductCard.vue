<script setup>
import { ref } from "vue";
import { useCartStore } from "@/stores/cart";
import { themeOverrides } from "../../libs/theme";

const props = defineProps({
    product: {
        type: Object,
        required: true,
    },
});

const cart = useCartStore();
const isAdding = ref(false);

const addToCart = async () => {
    isAdding.value = true;

    cart.addItem(props.product);

    setTimeout(() => {
        isAdding.value = false;
    }, 1200);
};

const formatPrice = (price) => {
    return new Intl.NumberFormat("tr-TR", {
        style: "currency",
        currency: "TRY",
        minimumFractionDigits: 2,
    }).format(price);
};

const getImageUrl = (imagePath) => {
    if (!imagePath) {
        return "https://via.placeholder.com/300x200?text=No+Image";
    }

    if (imagePath.startsWith("http")) {
        return imagePath;
    }

    return `/storage/${imagePath}`;
};
</script>

<template>
    <n-config-provider :theme-overrides="themeOverrides">
        <div
            class="bg-white overflow-hidden hover:shadow-lg transition-shadow duration-300 group product-card"
        >
            <a :href="`/${product.slug}`" class="relative">
                <img
                    :src="getImageUrl(product.image)"
                    :alt="product.name"
                    class="w-full object-cover aspect-4/5"
                />
                <div
                    v-if="product.stock <= 0"
                    class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded-full text-xs"
                >
                    Stokta Yok
                </div>
            </a>

            <div class="p-4">
                <a :href="`/${product.slug}`">
                    <h3
                        class="font-semibold text-lg mb-2 text-gray-800 line-clamp-2"
                    >
                        {{ product.name }}
                    </h3>
                </a>


                <div class="flex flex-col h-full justify-between">
                    <div class="flex flex-col product-card-price">
                        <span class="text-2xl font-bold text-gray-900">
                            {{ formatPrice(product.price) }}
                        </span>
                        <span
                            v-if="product.stock > 0"
                            class="text-sm text-green-600 line-clamp-1"
                        >
                            {{ product.stock }} adet stokta
                        </span>
                    </div>

                    <n-button
                        @click="addToCart"
                        type="primary"
                        :disabled="product.stock <= 0 || isAdding"
                        class="group-hover:translate-y-[-2px] hidden group-hover:flex transition-all duration-300 mt-8 product-card-button"
                    >
                        <span v-if="product.stock <= 0">Stokta Yok</span>
                        <span
                            v-else-if="isAdding"
                            class="flex items-center gap-2"
                        >
                            <svg
                                class="animate-spin h-4 w-4"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <circle
                                    class="opacity-25"
                                    cx="12"
                                    cy="12"
                                    r="10"
                                    stroke="currentColor"
                                    stroke-width="4"
                                ></circle>
                                <path
                                    class="opacity-75"
                                    fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                                ></path>
                            </svg>
                            Eklendi!
                        </span>
                        <span
                            v-else
                            class="flex items-center justify-center gap-2 w-full"
                        >
                            <PhShoppingCart :size="20" />
                            Sepete Ekle
                        </span>
                    </n-button>
                </div>
            </div>
        </div>
    </n-config-provider>
</template>

<style scoped>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-card {
    transition: all 0.3s ease;

    .product-card-button {
        display: none;
        transition: all 0.3s ease;
        height: 3rem;
        align-items: center;
        justify-content: center;
        text-align: center;
        text-transform: uppercase;
    }

    &:hover {
        .product-card-price {
            display: none;
        }

        .product-card-button {
            display: block;
        }
    }
}
</style>
