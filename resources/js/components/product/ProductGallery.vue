<template>
    <n-image-group show-toolbar-tooltip>
        <n-carousel
            :slides-per-view="1"
            :loop="true"
            draggable
            autoplay
            centered-slides="true"
            dot-type="line"
            interval="5000"
            class="lg:max-h-lg h-full items-center justify-center"
        >
            <n-image
                v-for="(image, index) in images"
                :key="index"
                :src="image.url"
                class="h-full w-full !mx-auto aspect-square !object-cover object-center *:!mx-auto"
            />
        </n-carousel>
    </n-image-group>
</template>

<script lang="ts" setup>
defineProps({
    images: {
        type: Array,
        required: true,
    },
});
</script>
