import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import tailwindcss from "@tailwindcss/vite";
import viteCompression from "vite-plugin-compression";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        viteCompression({
            algorithm: "brotliCompress",
            ext: ".br",
        }),
        vue(),
        tailwindcss(),
    ],
    resolve: {
        alias: {
            vue: "vue/dist/vue.esm-bundler.js",
        },
    },
    build: {
        manifest: "manifest.json",
        outDir: "public/build",
        rollupOptions: {
            input: {
                app: "resources/js/app.js",
                css: "resources/css/app.css",
            },
        },
    },
});
