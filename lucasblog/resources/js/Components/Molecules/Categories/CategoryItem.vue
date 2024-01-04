<template>
    <div class="flex items-center justify-between gap-x-6 py-5">
        <div class="min-w-0">
            <div class="flex items-center gap-x-3">
                <p class="text-sm font-semibold leading-6 text-white">{{ title }}</p>
            </div>
            <div class="mt-1 flex items-center gap-x-2 text-xs leading-5 text-white">
                <p class="truncate">{{ count }} postagens publicadas</p>
            </div>
        </div>
        <div class="flex flex-none items-center gap-x-4">
            <Link
                :href="route('admin.blog.posts.index')" class="hidden rounded-md  px-3.5 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-900 sm:block">
                <button class="bg-transparent hover:bg-blue-500 text-white font-semibold hover:text-white py-2 px-4 border border-gray-800 hover:border-transparent rounded">
                    <span class="flex items-center gap-1.5">
                        <LinkIcon class="w-5 h-5" />
                        Ver publicações
                    </span>
                </button>
            </Link>
            <Link
                class="hidden rounded-md px-3.5 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-900 sm:block"
                :href="route('admin.blog.categories.edit', id)">
                <button class="bg-transparent hover:bg-blue-500 text-white font-semibold hover:text-white py-2 px-4 border border-gray-800  hover:border-transparent rounded">
                    <span class="flex items-center gap-1.5">
                        <PencilSquareIcon class="w-5 h-5" />
                        Editar
                    </span>
                </button>
            </Link>

            <button v-on:click="toggleDropdown" class="relative flex-none sm:hidden">
                <EllipsisVerticalIcon  class="w-5 h-5 text-white" />
            </button>

            <transition
                enter-active-class="transition ease-out duration-100"
                enter-from-class="transform opacity-0 scale-95"
                enter-to-class="transform opacity-100 scale-100"
                leave-active-class="transition ease-in duration-75"
                leave-from-class="transform opacity-100 scale-100"
                leave-to-class="transform opacity-0 scale-95"
            >
                <div v-if="dropdown" class="sm:hidden absolute right-10 z-10 mt-28 w-32 origin-top-right rounded-md bg-gray-700 py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none block">
                    <a class="block px-3 py-1 text-sm leading-6 text-white hover:bg-gray-800" href="#">
                        Editar
                    </a>
                    <a class="block px-3 py-1 text-sm leading-6 text-white hover:bg-gray-800" href="#">
                        Deletar
                    </a>
                </div>

            </transition>
        </div>

    </div>
</template>

<script setup>

import {EllipsisVerticalIcon, LinkIcon, PencilSquareIcon} from "@heroicons/vue/24/outline/index.js";
import {ref} from "vue";
const dropdown = ref(false);

defineProps({
    id: String,
    title: String,
    slug: String,
    count: Number,

})

const toggleDropdown = () => {
    dropdown.value = !dropdown.value;
}


</script>
