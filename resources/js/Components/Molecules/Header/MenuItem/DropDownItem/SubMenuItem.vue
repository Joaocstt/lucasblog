<template>
    <div class="flex items-center">
        <ChevronRightIcon class="h-3 w-3 cursor-pointer"/>
        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-200">
            <Link :class="[{'text-white font-semibold': routeIsActive() }]" :href="link">{{ description }}</Link>
        </li>
    </div>
</template>


<script setup>

import {ChevronRightIcon} from "@heroicons/vue/24/outline/index.js";

const props = defineProps({
    whenComponentActive: {
        type: String,
    },
    link: {
        type: String,
    },
    isActive: {
        type: String
    },
    description: {
        type: String,
        required: true
    }
})


const routeIsActive = () => {
    const routes = props.isActive.split(',');
    let currentRouteFind = false;

    routes.forEach(function (item) {
        if (route().current(item)) {
            currentRouteFind = true;
        }
    });

    return currentRouteFind;
}


</script>
