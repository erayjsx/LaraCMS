<script setup lang="ts">
import { ref, onMounted } from "vue";
import { themeOverrides } from "../../libs/theme";

const showModal = ref(false);
onMounted(() => {
    showModal.value = true;
});

const bodyStyle = {
    width: "600px",
};

const segmented = {
    content: "soft",
    footer: "soft",
} as const;
</script>

<template>
    <n-config-provider :theme-overrides="themeOverrides">
        <n-modal
            v-model:show="showModal"
            class="custom-card !p-0"
            preset="card"
            :style="bodyStyle"
            :bordered="false"
            :segmented="segmented"
            role="dialog"
            aria-modal="true"
        >
            <div class="flex row max-lg:flex-col lg:h-96 h-[36rem]">
                <div
                    class="bg-cover bg-no-repeat bg-[url('https://cdn.myikas.com/images/theme-images/c3c88b7c-557e-4a02-b142-d4e04e885d31/image_2560.webp')] flex-1 lg:w-1/2"
                ></div>
                <div
                    class="flex-1 lg:w-1/2 flex text-center flex-col gap-2 items-center justify-center px-12"
                >
                    <h3 class="text-xl font-bold">CHAMRY'YE HOŞ GELDİN!</h3>
                    <p>
                        Bültenimize abone olarak en yeni kampanya ve
                        fırsatlardan haberdar olabilirsiniz.
                    </p>
                    <n-input
                        placeholder="E-posta adresinizi girin"
                        class="w-full max-w-md mt-4"
                        size="large"
                        clearable
                    />
                    <n-button
                        class="mt-4 w-full"
                        type="primary"
                        block
                        @click="showModal = false"
                    >
                        Bültene Kayıt Ol
                    </n-button>
                </div>
            </div>
        </n-modal>
    </n-config-provider>
</template>

<style>
.custom-card {
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 0;
    border: none;
    max-width: 800px;
    width: 90% !important;
    margin: 1rem auto;
}

.n-card-header {
    position: absolute !important;
    padding: 1rem !important;
    right: 0;
    font-size: 1.25rem;
    font-weight: 600;
}

.n-card__content {
    padding: 0 !important;
    margin: 0 !important;
    height: 440px !important;
}

.n-card.n-card--content-segmented > .n-card__content:not(:first-child),
.n-card.n-card--content-soft-segmented > .n-card__content:not(:first-child) {
    border-top: 0px !important;
}
</style>
