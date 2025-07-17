<script lang="ts" setup>
import { PhArrowArcRight } from "@phosphor-icons/vue";
import { ref } from "vue";

defineProps({
    title: String,
});

const mobileMenu = ref(false);
const detailMenu = ref(false);

const mobileMenuHandle = () => {
    mobileMenu.value = true;
};
const detailMenuHandle = () => {
    detailMenu.value = true;
};
</script>

<template>
    <n-button @click="mobileMenuHandle" type="none" style="padding: 0">
        <PhList :size="26" />
    </n-button>
    <n-drawer
        v-model:show="mobileMenu"
        placement="left"
        style="width: 80%; max-width: 500px"
    >
        <n-drawer-content
            title="Menü"
            closable
            :header-style="{
                fontSize: '1rem',
            }"
            :style="{ padding: '0' }"
        >
            <div
                class="flex flex-col items-start justify-start *:h-14 *:flex *:items-center *:border-b *:!border-zinc-200 *:px-6 *:w-full"
            >
                <a href="/">Ana Sayfa</a>
                <a href="/" class="text-red-800">Yeni Sezon</a>
                <n-button
                    @click="detailMenuHandle"
                    type="none"
                    style="padding: 0"
                    :class="'drawer text-left !w-full !border-zinc-200 !border-b !px-6 !justify-between !flex !items-center'"
                >
                    <p>Erkek</p>
                    <PhArrowArcRight :size="16" class="inline" />
                </n-button>
                <n-button
                    @click="detailMenuHandle"
                    type="none"
                    style="padding: 0"
                    :class="'drawer text-left !w-full !border-zinc-200 !border-b !px-6 !justify-between !flex !items-center'"
                >
                    <p>Kadın</p>
                    <PhArrowArcRight :size="16" class="inline" />
                </n-button>
            </div>

            <template #footer> </template>
        </n-drawer-content>
    </n-drawer>

    <n-drawer
        v-model:show="detailMenu"
        placement="left"
        style="width: 80%; max-width: 500px"
    >
        <n-drawer-content
            title="Menü"
            :header-style="{
                fontSize: '1rem',
            }"
            class="drawer"
        >
            <div
                class="flex flex-col items-start justify-start *:h-14 *:flex *:items-center *:border-b *:!border-zinc-200 *:px-6 *:w-full"
            >
                <a href="/">Giyim</a>
                <a href="/">Ayakkabı</a>
            </div>

            <template #footer> </template>
        </n-drawer-content>
    </n-drawer>
</template>

<style>
.n-drawer .n-drawer-content .n-drawer-body-content-wrapper {
    padding: 0 !important;
}

.drawer {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
</style>
