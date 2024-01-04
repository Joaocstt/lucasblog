import {defineStore} from 'pinia';


export const useMobileToggle = defineStore('mobileToggle', {

    state: () => ({
        mobileMenuOpen: false,
    }),

    getters: {
        _mobileMenuOpen: (state) => state.mobileMenuOpen,
    },

    actions: {
        toggleMobileMenu() {
            this.mobileMenuOpen = !this.mobileMenuOpen;
        },

    },

});
