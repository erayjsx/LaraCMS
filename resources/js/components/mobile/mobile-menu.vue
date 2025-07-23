<script lang="ts" setup>
import {
    PhArrowArcRight,
    PhArrowRight,
    PhCaretLeft,
    PhCaretRight,
} from "@phosphor-icons/vue";
import { ref } from "vue";

defineProps({
    title: String,
    items: Array,
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
            title="Charmy"
            closable
            :header-style="{
                fontSize: '1rem',
            }"
            :style="{ padding: '0' }"
        >
            <div
                v-for="menu in items"
                class="flex flex-col items-start justify-start *:h-14 *:flex *:items-center *:border-b *:!border-zinc-200 *:px-6 *:w-full"
            >
                <a :href="menu.href" v-if="!menu.submenu" class="text-lg">{{
                    menu.name
                }}</a>
                <n-button
                    v-if="menu.submenu"
                    @click="detailMenuHandle"
                    type="none"
                    style="padding: 0"
                    :class="'*:w-full text-left !h-14 !w-full !border-zinc-200 !border-b !px-6 '"
                >
                    <div
                        class="flex items-center gap-2 justify-between !w-full"
                    >
                        <p class="mr-auto text-lg">{{ menu.name }}</p>
                        <PhCaretRight :size="20" class="inline ml-auto" />
                    </div>
                    <template>
                        <n-drawer
                            v-model:show="detailMenu"
                            v-model:exit="mobileMenu"
                            placement="left"
                            style="width: 80%; max-width: 500px"
                        >
                            <n-drawer-content
                                :header-style="{
                                    fontSize: '1rem',
                                }"
                                class="drawer"
                            >
                                <button
                                    v-on:click="detailMenu = false"
                                    class="h-14 flex items-center gap-4 bg-zinc-50 px-6 border-b w-full justify-start border-zinc-200"
                                >
                                    <PhCaretLeft :size="18" weight="bold" />
                                    <p>Geri</p>
                                </button>
                                <div
                                    v-for="link in menu.submenu"
                                    class="flex flex-col *:text-lg items-start justify-start *:h-14 *:flex *:items-center *:border-b *:!border-zinc-200 *:px-6 *:w-full"
                                >
                                    <a :href="link.href">{{ link.name }}</a>
                                </div>

                                <template #footer> </template>
                            </n-drawer-content>
                        </n-drawer>
                    </template>
                </n-button>
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
    justify-content: space-between;
}
</style>
