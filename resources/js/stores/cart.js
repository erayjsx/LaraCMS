import { defineStore } from "pinia";

export const useCartStore = defineStore("cart", {
    state: () => ({
        items: [],
        justAdded: false, // Yeni eklenen ürün için flag
    }),

    getters: {
        itemCount: (state) =>
            state.items.reduce((sum, item) => sum + item.quantity, 0),
        totalPrice: (state) =>
            state.items.reduce(
                (sum, item) => sum + item.quantity * item.price,
                0
            ),
    },

    actions: {
        // LocalStorage'dan sepet verilerini yükle
        loadFromStorage() {
            try {
                const savedCart = localStorage.getItem('cart');
                if (savedCart) {
                    this.items = JSON.parse(savedCart);
                }
            } catch (error) {
                console.error('Sepet verileri localStorage\'dan yüklenemedi:', error);
                this.items = [];
            }
        },

        // Sepet verilerini localStorage'a kaydet
        saveToStorage() {
            try {
                localStorage.setItem('cart', JSON.stringify(this.items));
            } catch (error) {
                console.error('Sepet verileri localStorage\'a kaydedilemedi:', error);
            }
        },

        addItem(product) {
            const existing = this.items.find((item) => item.id === product.id);
            if (existing) {
                existing.quantity += 1;
            } else {
                this.items.push({ ...product, quantity: 1 });
            }
            this.saveToStorage();
            
            // Ürün eklendi flag'ini set et
            this.justAdded = true;
            
            // 100ms sonra flag'i resetle
            setTimeout(() => {
                this.justAdded = false;
            }, 100);
        },

        removeItem(id) {
            this.items = this.items.filter((item) => item.id !== id);
            this.saveToStorage();
        },

        updateQuantity(id, quantity) {
            const item = this.items.find((item) => item.id === id);
            if (item) {
                if (quantity <= 0) {
                    this.removeItem(id);
                } else {
                    item.quantity = quantity;
                    this.saveToStorage();
                }
            }
        },

        clearCart() {
            this.items = [];
            this.saveToStorage();
        },

        // Sepet toplam adetini artır
        increaseQuantity(id) {
            const item = this.items.find((item) => item.id === id);
            if (item) {
                item.quantity += 1;
                this.saveToStorage();
            }
        },

        // Sepet toplam adetini azalt
        decreaseQuantity(id) {
            const item = this.items.find((item) => item.id === id);
            if (item) {
                if (item.quantity > 1) {
                    item.quantity -= 1;
                    this.saveToStorage();
                } else {
                    this.removeItem(id);
                }
            }
        },
    },
});
