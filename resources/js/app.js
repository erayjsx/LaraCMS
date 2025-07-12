import { createApp } from "vue";
import naive from "naive-ui";
import PhosphorIcons from "@phosphor-icons/vue";
import { createPinia } from "pinia";
import { useCartStore } from "./stores/cart";

import Header01 from "./components/header/Header01.vue";
import NotFound from "./components/404.vue";
import ProductCard from "./components/product/ProductCard.vue";
import ProductList from "./components/product/ProductList.vue";
import Carousel01 from "./components/carousel/Carousel01.vue";
import Footer01 from "./components/footer/Footer01.vue";

const app = createApp({});
const pinia = createPinia();

app.component("header01", Header01);
app.component("not-found", NotFound);
app.component("product-card", ProductCard);
app.component("product-list", ProductList);
app.component("carousel01", Carousel01);
app.component("footer01", Footer01);

app.use(naive);
app.use(PhosphorIcons);
app.use(pinia);

app.mount("#app");

// Uygulama mount edildikten sonra localStorage'dan sepet verilerini yükle
const cartStore = useCartStore();
cartStore.loadFromStorage();

// Ürün detay sayfasından sepete ekleme için event listener
window.addEventListener('add-to-cart', (event) => {
    const { product, quantity } = event.detail;
    
    // Belirtilen miktarda ürünü sepete ekle
    for (let i = 0; i < quantity; i++) {
        cartStore.addItem(product);
    }
});
