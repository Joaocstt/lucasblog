<template>
    <tr class="text-gray-700 dark:text-gray-400">
        <td class="px-4 py-3">
            <div class="flex items-center text-sm">
                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                    <img class="w-9 h-9 rounded-full" :src="props.avatar" alt="" loading="lazy">
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                </div>
                <div>
                    <p class="font-semibold">{{ props.name }}</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">
                        {{ props.role }}
                    </p>
                </div>
            </div>
        </td>
        <td class="px-4 py-3 text-sm">
            {{ props.email }}
        </td>
        <td class="px-4 py-3 text-xs">
            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                {{ props.role }}
            </span>
        </td>
        <td class="px-4 py-3 text-sm">
            <Link :href="route('admin.users.edit', props.id)">
                <div class="flex items-center gap-2">
                    <PencilSquareIcon class="w-6 h-6 text-gray-400 hover:text-white cursor-pointer" />
                    <Link :href="route('admin.users.delete', props.id)">
                        <TrashIcon class="w-6 h-6 text-gray-400 hover:text-red-700 cursor-pointer" />
                    </Link>
                </div>

            </Link>
        </td>
    </tr>
</template>

<script setup>

import {PencilSquareIcon, TrashIcon} from "@heroicons/vue/24/outline/index.js";

const props = defineProps({
    id: Number,
    name: String,
    email: String,
    role: String,
    avatar: String,
})
</script>
