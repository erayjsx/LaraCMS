import { ref, onMounted, onUnmounted } from "vue";

export function useIsMobile() {
    const isMobile = ref(window.innerWidth <= 768);

    const debounce = (fn, delay) => {
        let timer;
        return () => {
            clearTimeout(timer);
            timer = setTimeout(fn, delay);
        };
    };

    const check = debounce(() => {
        isMobile.value = window.innerWidth <= 768;
    }, 150);

    onMounted(() => window.addEventListener("resize", check));
    onUnmounted(() => window.removeEventListener("resize", check));

    return { isMobile };
}
