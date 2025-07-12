import { createApp } from "vue";
import naive from "naive-ui";
import PhosphorIcons from "@phosphor-icons/vue";
import { createPinia } from "pinia";
import { useCartStore } from "./stores/cart";

import Header01 from "./components/header/Header01.vue";
import NotFound from "./components/404.vue";
import ProductCard from "./components/product/ProductCard.vue";
import ProductList from "./components/product/ProductList.vue";

const app = createApp({});
const pinia = createPinia();

app.component("header01", Header01);
app.component("not-found", NotFound);
app.component("product-card", ProductCard);
app.component("product-list", ProductList);

app.use(naive);
app.use(PhosphorIcons);
app.use(pinia);

app.mount("#app");

const cartStore = useCartStore();
cartStore.loadFromStorage();
