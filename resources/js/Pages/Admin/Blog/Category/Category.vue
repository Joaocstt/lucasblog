<template>
    <Main>
        <div class="container px-6 mx-auto grid mt-16">
            <div class="mx-auto flex flex-col items-center sm:flex-row sm:mx-0 sm:border-b sm:border-gray-800 sm:pb-5 sm:flex sm:items-center sm:justify-between">
            <h3 class="text-base font-semibold leading-6 text-white">Listagem de categorias</h3>

                <Link :href="route('admin.blog.categories.create')" class="mt-4  sm:mt-0 cursor-pointer inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                   <span class="flex items-center gap-1.5">
                        <TagIcon class="w-5 h-5" />
                        Nova categoria
                   </span>
                </Link>
            </div>

            <ul v-if="!props.categories.length" class="divide-y divide-gray-700 mt-7" role="list">
                <li class="text-white">
                    Não há nenhuma categoria cadastrada no momento.
                </li>
            </ul>

            <ul class="divide-y divide-gray-700 mt-7" role="list">
                <li v-for="category in categories" :key="category.id">
                    <CategoryItem :id="category.id" :title="category.title" :count="category.post_count"> </CategoryItem>
                </li>
            </ul>
        </div>

    </Main>
</template>
<script setup>
import Main from "@/Components/Template/Main.vue";
import CategoryItem from "@/Components/Molecules/Categories/CategoryItem.vue";
import {TagIcon} from "@heroicons/vue/24/outline/index.js";

const props = defineProps({
    categories: Object,
})

</script>

