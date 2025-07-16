<script lang="ts" setup>
import { ref } from "vue";

defineProps({
    title: String,
});

const mobileMenu = ref(false);

const mobileMenuHandle = () => {
    mobileMenu.value = true;
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
        >
            <div>asd</div>

            <template #footer> </template>
        </n-drawer-content>
    </n-drawer>
</template>
