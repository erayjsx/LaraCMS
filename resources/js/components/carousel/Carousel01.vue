<script setup>
import { computed } from "vue";
import { useIsMobile } from "../../libs/useIsMobile";

defineProps({
    formItemProps: Array,
});
const { isMobile } = useIsMobile();
const showArrows = computed(() => (isMobile.value ? false : true));
</script>

<template>
    <n-carousel
        :space-between="20"
        draggable
        :show-arrows="showArrows"
        centered-slides
        class="product-carousel"
    >
        <a v-for="item in formItemProps" :key="item.id" :href="item.link">
            <img class="carousel-img" :src="item.image" :alt="item.name" />
        </a>

        <template #arrow="{ prev, next }">
            <div class="custom-arrow">
                <button type="button" class="custom-arrow--left" @click="prev">
                    <n-icon :size="32"><PhArrowLeft /></n-icon>
                </button>
                <button type="button" class="custom-arrow--right" @click="next">
                    <n-icon :size="32"><PhArrowRight /></n-icon>
                </button>
            </div>
        </template>
    </n-carousel>
</template>

<style scoped>
.carousel-img {
    width: 100%;
    aspect-ratio: 16/7;
    object-fit: cover;
}

.container {
    max-width: 1200px;
}

.n-carousel.n-carousel--show-arrow.n-carousel--bottom .n-carousel__dots {
    display: flex !important;
    justify-content: center !important;
    left: 0 !important;
    right: 0 !important;
    bottom: 10px;
    width: 100% !important;
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
    right: 16px;
    left: 16px;
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
