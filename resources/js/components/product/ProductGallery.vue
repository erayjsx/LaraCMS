<template>
    <div class="aspect-square relative">
        <div class="gallery f-carousel" id="productCarousel">
            <div
                class="f-carousel__slide"
                data-thumb-src="https://cdn.myikas.com/images/0b03644a-1913-45a8-805d-79ffa5a00641/286f1901-87ee-4f0c-ad80-59c64c897065/540/beastarka1.webp"
                data-fancybox="gallery"
                data-src="https://cdn.myikas.com/images/0b03644a-1913-45a8-805d-79ffa5a00641/286f1901-87ee-4f0c-ad80-59c64c897065/540/beastarka1.webp"
            >
                <img
                    alt=""
                    width="100%"
                    height="100%"
                    data-lazy-src="https://cdn.myikas.com/images/0b03644a-1913-45a8-805d-79ffa5a00641/286f1901-87ee-4f0c-ad80-59c64c897065/540/beastarka1.webp"
                />
            </div>
            <div
                class="f-carousel__slide"
                data-thumb-src="https://cdn.myikas.com/images/0b03644a-1913-45a8-805d-79ffa5a00641/88769653-e47d-4222-9eb7-148249e338a9/1080/beaston1.webp"
                data-fancybox="gallery"
                data-src="https://cdn.myikas.com/images/0b03644a-1913-45a8-805d-79ffa5a00641/88769653-e47d-4222-9eb7-148249e338a9/1080/beaston1.webp"
            >
                <img
                    alt=""
                    width="100%"
                    height="100%"
                    data-lazy-src="https://cdn.myikas.com/images/0b03644a-1913-45a8-805d-79ffa5a00641/88769653-e47d-4222-9eb7-148249e338a9/1080/beaston1.webp"
                />
            </div>
        </div>
    </div>
</template>

<script>
import { Carousel, Fancybox } from "@fancyapps/ui/";
import "@fancyapps/ui/dist/carousel/carousel.css";
import "@fancyapps/ui/dist/fancybox/fancybox.css";

import { Thumbs } from "@fancyapps/ui/dist/carousel/carousel.thumbs.esm.js";
import "@fancyapps/ui/dist/carousel/carousel.thumbs.css";

export default {
    name: "ProductGallery",
    data() {
        return {
            images: [
                {
                    thumb: "https://picsum.photos/id/1015/150/100",
                    large: "https://picsum.photos/id/1015/800/600",
                    caption: "Ürün Görseli 1",
                },
                {
                    thumb: "https://picsum.photos/id/1016/150/100",
                    large: "https://picsum.photos/id/1016/800/600",
                    caption: "Ürün Görseli 2",
                },
                {
                    thumb: "https://picsum.photos/id/1018/150/100",
                    large: "https://picsum.photos/id/1018/800/600",
                    caption: "Ürün Görseli 3",
                },
            ],
        };
    },
    mounted() {
        new Carousel(
            document.getElementById("productCarousel"),
            {
                infinite: false,
                Dots: false,
                Thumbs: {
                    type: "classic",
                    Carousel: {
                        slidesPerPage: 1,
                        Navigation: true,
                        center: true,
                        fill: true,
                        dragFree: true,
                    },
                },
            },
            { Thumbs }
        );

        Fancybox.bind('[data-fancybox="product-gallery"]', {
            idle: false,
            compact: false,
            dragToClose: false,

            animated: false,
            showClass: "f-fadeSlowIn",
            hideClass: false,

            Carousel: {
                infinite: false,
            },

            Images: {
                zoom: false,
                Panzoom: {
                    maxScale: 1.5,
                },
            },

            Toolbar: {
                absolute: true,
                display: {
                    left: [],
                    middle: [],
                    right: ["close"],
                },
            },

            Thumbs: {
                type: "classic",
                Carousel: {
                    axis: "x",

                    slidesPerPage: 1,
                    Navigation: true,
                    center: true,
                    fill: true,
                    dragFree: true,

                    breakpoints: {
                        "(min-width: 640px)": {
                            axis: "y",
                        },
                    },
                },
            },
        });
    },
};
</script>

<style scoped>
:root {
    --f-brand-color: #2563eb;
}

#productCarousel,
.f-thumbs.is-classic,
.fancybox__toolbar,
.fancybox__nav {
    --f-button-width: 40px;
    --f-button-height: 40px;
    --f-button-border-radius: 4px;

    --f-button-color: #0d0c22;
    --f-button-hover-color: var(--f-brand-color);

    --f-button-bg: #f1f5f9;
    --f-button-hover-bg: #e2e8f0;
    --f-button-active-bg: #e2e8f0;

    --f-button-svg-width: 20px;
    --f-button-svg-height: 20px;
    --f-button-svg-stroke-width: 2.25;
    --f-button-svg-filter: none;

    --f-button-svg-disabled-opacity: 0.2;
}

.f-carousel__slide {
    display: flex;
    align-items: center;
    justify-items: center;
}

.f-thumbs.is-classic {
    --f-thumb-width: 120px;
    --f-thumb-height: 80px;
    --f-thumb-gap: 8px;

    --f-thumb-opacity: 1;
    --f-thumb-selected-opacity: 1;

    --f-thumb-outline: 2px;
    --f-thumb-outline-color: var(--f-brand-color);

    --f-button-next-pos: 8px;
    --f-button-prev-pos: 8px;
}

.f-thumbs.is-classic.is-horizontal {
    padding: 0 56px;
}

.f-thumbs.is-classic.is-vertical {
    padding: 56px 0;
}

#productCarousel .f-carousel__nav {
    opacity: 0;
    transition: opacity 0.15s;
}

@media (hover: hover) {
    #productCarousel:hover .f-carousel__nav {
        opacity: 1;
    }
}

.fancybox__container {
    --fancybox-bg: #fff;
    --fancybox-color: #6a6969;

    --f-spinner-color-1: rgba(0, 0, 0, 0.1);
    --f-spinner-color-2: rgba(17, 24, 28, 0.8);
}

@media screen and (min-width: 640px) {
    .fancybox__container {
        flex-direction: row-reverse;
    }
}

.fancybox__thumbs.is-classic.is-horizontal {
    --f-thumb-width: 75px;
    --f-thumb-height: 55px;
    --f-thumb-gap: 8px;
}

.fancybox__thumbs.is-classic.is-vertical {
    --f-thumb-width: 100%;
    --f-thumb-height: 100px;

    width: 182px;

    outline: 1px solid #edeef0;
}

.fancybox__thumbs.is-classic.is-vertical .f-thumbs__track {
    padding: 0 16px;
}

.fancybox__toolbar {
    padding: 8px;
}

.fancybox__nav {
    --f-button-next-pos: 8px;
    --f-button-prev-pos: 8px;
}

.fancybox__carousel {
    min-width: 0;
    min-height: 0;
}

.fancybox__slide {
    padding: 8px;
}
</style>
