<script lang="ts" setup>
import { ref } from "vue";
import ProductList from "../product/ProductList.vue";

const search = ref(false);

const handleSearch = () => {
    search.value = true;
};
</script>

<template>
    <n-button @click="handleSearch" type="none" style="padding: 0">
        <PhMagnifyingGlass :size="24" />
    </n-button>

    <n-drawer
        v-model:show="search"
        placement="top"
        class="h-[22rem]"
        :style="{ height: '100%', maxHeight: '52rem' }"
    >
        <n-drawer-content
            title="Ürün Ara"
            closable
            :header-style="{
                paddingTop: '1.5rem',
                paddingLeft: '1.5rem',
                paddingRight: '1.5rem',
                fontSize: '1.5rem',
                fontWeight: 'medium',
                width: '100%',
            }"
            :header-class="['max-w-screen-xl', 'mx-auto', 'w-full']"
            :body-style="{
                padding: '0',
            }"
        >
            <div
                class="max-w-screen-xl mx-auto flex flex-col justify-center items-center p-0"
            >
                <n-input
                    placeholder="Ürün adı veya açıklama..."
                    size="large"
                    clearable
                />

                <ProductList />
            </div>
        </n-drawer-content>
    </n-drawer>
</template>
