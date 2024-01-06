<template>
    <li class="relative px-6 py-3">
        <span :class="[{'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg': routeIsActive()}]" aria-hidden="true"></span>

        <button @click.prevent="subMenuToggle" class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200" aria-haspopup="true">
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-200">
                <component :is="HeroIcons[icon]" class="w-5 h-5 shrink-0"/>
                <SpanItem description="Blog" />
            </a>

            <ChevronDownIcon v-if="subMenu.open" class="w-4 h-4" aria-hidden="true" />
            <svg v-else  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>
        <transition
            enter-active-class="transition-all ease-in-out duration-500"
            enter-from-class="transform opacity-0 scale-95"
            enter-to-class="transform opacity-100 scale-100"
            leave-active-class="transition ease-in duration-75"
            leave-from-class="transform opacity-100 scale-100"
            leave-to-class="transform opacity-0 scale-95"
        >

        <div v-if="subMenu.open">
                <ul class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-700" aria-label="submenu">
                    <slot />
                </ul>
        </div>
        </transition>
    </li>

</template>

<script setup>
import {reactive} from "vue";
import SpanItem from "@/Components/Atoms/MenuItem/SpanItem.vue";
import * as HeroIcons from "@heroicons/vue/24/outline";
import {ChevronDownIcon} from "@heroicons/vue/24/outline";

const subMenu = reactive({
    open: false,
})

const subMenuToggle = () => {
    subMenu.open = !subMenu.open
}

const props = defineProps({
    icon: String,
    isActive: String | Array
});

const routeIsActive = () => {
    if (props.isActive !== undefined) {
        const checkArray = Array.isArray(props.isActive);
        const routes = (!checkArray) ? props.isActive.toString().split(',') : props.isActive;

        routes.forEach(function (item) {
            if (route().current(item) === true) {
                subMenu.open = true;
            }
        });
    }
};


</script>
