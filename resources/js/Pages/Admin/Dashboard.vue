<template>

    <Main>
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-white">Dashboard</h2>
            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
                <!-- Card -->
                <div class="flex items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <div class="p-3 mr-4 text-white rounded-full bg-blue-500">
                        <UserIcon  class="w-5 h-5"/>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-white">
                            Total de usuários
                        </p>
                        <p class="text-lg font-semibold text-gray-300">
                            {{ props.users }}
                        </p>
                    </div>
                </div>
                <!-- Card -->
                <div class="flex items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <div class="p-3 mr-4 text-white rounded-full bg-indigo-600">

                        <ClipboardDocumentListIcon class="h-5 w-5" />
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-white">
                            Total de postagens
                        </p>
                        <p
                            class="text-lg font-semibold text-gray-300">
                            {{ props.posts }}
                        </p>
                    </div>
                </div>

                <div class="flex items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                        <EllipsisHorizontalIcon class="w-5 h-5"/>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-white">
                            Postagens pendente
                        </p>

                        <p class="text-lg font-semibold text-gray-300">
                            {{ props.pendentPosts }}
                        </p>

                    </div>
                </div>
         
                <div class="flex items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <div
                        class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                       <DocumentTextIcon class="w-5 h-5" />
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-white">
                            Categorias
                        </p>
                        <p class="text-lg font-semibold text-gray-300">
                            {{ props.categories }}
                        </p>

                    </div>
                </div>

                <div class="flex items-center p-4 rounded-lg shadow-xs bg-gray-800">
                    <div
                        class="p-3 mr-4 text-white rounded-full 0 bg-green-500">
                        <CheckIcon class="w-5 h-5" />
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-white">
                            Postagens publicadas
                        </p>
                        <p class="text-lg font-semibold text-gray-300">
                            {{ props.categories }}
                        </p>

                    </div>
                </div>
            </div>
        </div>

    </Main>

</template>

<script setup>

import Main from "@/Components/Template/Main.vue";
import {ClipboardDocumentListIcon, UserIcon, EllipsisHorizontalIcon, DocumentTextIcon, CheckIcon} from "@heroicons/vue/24/outline/index.js";


const props = defineProps({
    posts: Number,
    users: Number,
    categories: Number,
    pendentPosts: Number
})

</script>
