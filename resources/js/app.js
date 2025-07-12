import { createApp } from "vue";
import Header01 from "./components/header/Header01.vue";

import naive from "naive-ui";

const app = createApp({});

// Global olarak component'i kaydet
app.component("header01", Header01);

app.use(naive);

app.mount("#app");
