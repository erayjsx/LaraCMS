<template>
    <n-image-group show-toolbar-tooltip class="max-h-96">
        <n-carousel
            :slides-per-view="1"
            :space-between="20"
            :loop="false"
            draggable
        >
            <n-image
                v-for="(image, index) in images"
                :key="index"
                :src="image.large"
                class="h-full aspect-square *:!object-cover object-center *:mx-auto"
            />
        </n-carousel>
    </n-image-group>
</template>

<script>
export default {
    name: "ProductGallery",
    data() {
        return {
            images: [
                {
                    thumb: "https://cdn.myikas.com/images/20c102e9-75bf-47a9-9605-828b3a311626/b642a691-ac1f-4a49-9ce4-b1f54a9e7d7a/1080/jerseymodel2urunon.webp",
                    large: "https://cdn.myikas.com/images/20c102e9-75bf-47a9-9605-828b3a311626/b642a691-ac1f-4a49-9ce4-b1f54a9e7d7a/1080/jerseymodel2urunon.webp",
                    caption: "Ürün Görseli 1",
                },
                {
                    thumb: "https://cdn.myikas.com/images/0b03644a-1913-45a8-805d-79ffa5a00641/cd39a931-962f-41cc-8348-13f6768bac4c/360/siyahsalamanderarka.webp",
                    large: "https://cdn.myikas.com/images/0b03644a-1913-45a8-805d-79ffa5a00641/cd39a931-962f-41cc-8348-13f6768bac4c/360/siyahsalamanderarka.webp",
                    caption: "Ürün Görseli 2",
                },
            ],
        };
    },
};
</script>
