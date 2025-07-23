import { createApp, defineAsyncComponent } from "vue";
import { createPinia } from "pinia";
import {
    create,
    NButton,
    NInput,
    NModal,
    NCard,
    NNotificationProvider,
    NDrawer,
    NDrawerContent,
    NConfigProvider,
    NMenu,
    NSpace,
    NCarousel,
    NIcon,
    NResult,
    NBadge,
    NTabs,
    NTabPane,
    NTab,
    NForm,
    NFormItem,
    NFormItemCol,
    NFormItemRow,
    NBreadcrumb,
    NBreadcrumbItem,
    NCheckbox,
    NMarquee,
    NImage,
    NImageGroup,
    NAvatar,
} from "naive-ui";
import {
    PhUser,
    PhShoppingBag,
    PhMinus,
    PhPlus,
    PhTrash,
    PhArrowLeft,
    PhArrowRight,
    PhInstagramLogo,
    PhXLogo,
    PhFacebookLogo,
    PhYoutubeLogo,
    PhShoppingCart,
    PhSpinnerGap,
    PhMagnifyingGlass,
    PhList,
    PhCaretRight,
} from "@phosphor-icons/vue";

import { themeOverrides } from "./libs/theme";

const app = createApp({});
const pinia = createPinia();
const naive = create({
    components: [
        NButton,
        NInput,
        NModal,
        NCard,
        NNotificationProvider,
        NMenu,
        NSpace,
        NCarousel,
        NIcon,
        NResult,
        NModal,
        NConfigProvider,
        NDrawer,
        NDrawerContent,
        NConfigProvider,
        NBadge,
        NTabs,
        NTab,
        NTabPane,
        NForm,
        NFormItem,
        NFormItemCol,
        NFormItemRow,
        NBreadcrumb,
        NBreadcrumbItem,
        NCheckbox,
        NMarquee,
        NImage,
        NImageGroup,
        NAvatar,
    ],
    themeOverrides,
});

app.component(
    "header01",
    defineAsyncComponent(() => import("./components/header/Header01.vue"))
);

app.component(
    "header02",
    defineAsyncComponent(() => import("./components/header/Header02.vue"))
);

app.component(
    "not-found",
    defineAsyncComponent(() => import("./components/404.vue"))
);

app.component(
    "product-card",
    defineAsyncComponent(() => import("./components/product/ProductCard.vue"))
);

app.component(
    "product-list",
    defineAsyncComponent(() => import("./components/product/ProductList.vue"))
);

app.component(
    "carousel01",
    defineAsyncComponent(() => import("./components/carousel/Carousel01.vue"))
);

app.component(
    "footer01",
    defineAsyncComponent(() => import("./components/footer/Footer01.vue"))
);

app.component(
    "checkout-list",
    defineAsyncComponent(() => import("./components/checkout/CheckoutList.vue"))
);

app.component(
    "product-gallery",
    defineAsyncComponent(() =>
        import("./components/product/ProductGallery.vue")
    )
);

app.component(
    "config-provider",
    defineAsyncComponent(() => import("./components/Config.vue"))
);

app.component(
    "modal",
    defineAsyncComponent(() => import("./components/modal/Modal01.vue"))
);

app.component(
    "marquee",
    defineAsyncComponent(() => import("./components/marquee/Marquee.vue"))
);

app.use(pinia);
app.use(naive);

app.component("PhUser", PhUser);
app.component("PhShoppingBag", PhShoppingBag);
app.component("PhMinus", PhMinus);
app.component("PhPlus", PhPlus);
app.component("PhTrash", PhTrash);
app.component("PhArrowLeft", PhArrowLeft);
app.component("PhArrowRight", PhArrowRight);
app.component("PhInstagramLogo", PhInstagramLogo);
app.component("PhXLogo", PhXLogo);
app.component("PhFacebookLogo", PhFacebookLogo);
app.component("PhYoutubeLogo", PhYoutubeLogo);
app.component("PhShoppingCart", PhShoppingCart);
app.component("PhSpinnerGap", PhSpinnerGap);
app.component("PhMagnifyingGlass", PhMagnifyingGlass);
app.component("PhList", PhList);
app.component("PhCaretRight", PhCaretRight);

app.mount("#app");

import { useCartStore } from "./stores/cart";
const cartStore = useCartStore();
cartStore.loadFromStorage();

window.addEventListener("add-to-cart", (event) => {
    const { product, quantity } = event.detail;
    for (let i = 0; i < quantity; i++) {
        cartStore.addItem(product);
    }
});
