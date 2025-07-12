<script setup>
defineProps({
    formItemProps: Array,
});
</script>

<template>
    <n-carousel :space-between="20" draggable>
        <a v-for="item in formItemProps" :key="item.id" :href="item.link">
            <img class="carousel-img" :src="item.image" />
        </a>
    </n-carousel>
</template>

<style scoped>
.carousel-img {
    width: 100%;
    aspect-ratio: 16/7;
    object-fit: cover;
}
</style>
