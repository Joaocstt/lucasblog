<template>
    <li class="relative px-6 py-3">
        <Link
              class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
             :class="[{'text-white font-semibold': $page.component === 'User'}]"
             :href="route('admin.users.index')">

            <component :is="HeroIcons[icon]"  class="w-5 h-5" />
            <SpanItem description="Usuários" />
        </Link>
    </li>
</template>
<script setup>
import SpanItem from "@/Components/Atoms/MenuItem/SpanItem.vue";
import * as HeroIcons from "@heroicons/vue/24/outline";

const props = defineProps({
    icon: {
        type: String,
        required: true,
    },
});

</script>
