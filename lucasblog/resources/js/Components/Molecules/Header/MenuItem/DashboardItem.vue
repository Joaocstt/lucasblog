<template>
    <li class="relative px-6 py-3">
        <span :class="[{'absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg': $page.component === 'Dashboard'}]" aria-hidden="true"></span>
        <Link
            :class="[{'text-white font-semibold': $page.component === 'Dashboard'}]"
            class="hover:text-white hover:font-semibold inline-flex items-center w-full text-sm transition-colors duration-150"
           :href="route('admin.dashboard')">
            <component :is="HeroIcons[icon]" class="w-5 h-5 shrink-0"/>
            <SpanItem description="Dashboard" />
        </Link>
    </li>
</template>
<script setup>
import SpanItem from "@/Components/Atoms/MenuItem/SpanItem.vue";
import * as HeroIcons from "@heroicons/vue/24/outline";


const props = defineProps({
    icon: {
        type: String,
        required: true
    }

})

</script>
