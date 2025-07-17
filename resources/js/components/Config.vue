<script setup lang="ts">
import { themeOverrides } from "../libs/theme";
</script>

<template>
    <n-config-provider :theme-overrides="themeOverrides">
        <slot />
    </n-config-provider>
</template>
