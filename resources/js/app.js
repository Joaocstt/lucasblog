import './bootstrap';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m.js';
import Toast, {POSITION} from "vue-toastification";
import { createPinia } from 'pinia'
import ToastPlugin from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-bootstrap.css';
import { Link } from '@inertiajs/vue3'
import '@vueup/vue-quill/dist/vue-quill.snow.css';


const pinia = createPinia()

const options = {
    position: POSITION.TOP_RIGHT,
    timeout: 5000,
    maxToasts: 3,
    toastsClassName: 'shadow-lg rounded-lg ring-1 ring-black ring-opacity-5 font-sans bg-white',
    bodyClassName: ['custom-class-1','custom-class-2'],
    containerClassName: 'my-container-class',
    icon: false
}


createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Toast, options)
            .component('Link', Link)
            .use(pinia)
            .use(ToastPlugin)


    .mount(el)

    },
})
