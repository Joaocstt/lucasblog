import { defineStore } from 'pinia';

export const useModalCategory = defineStore('ModalState', {
    state: () => ({
        modalCategory: false,
    }),

    getters: {
        isModalCategory: (state) => state.modalCategory,
    },

    actions: {
        modalOpen() {
            this.modalCategory = true;
        },
        modalClose() {
            this.modalCategory = false;
        },
    },
});
