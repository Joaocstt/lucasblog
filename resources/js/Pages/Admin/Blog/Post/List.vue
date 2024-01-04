<template>

    <Main>
            <div class="container px-6 mx-auto grid mt-16">

                <div class="mx-auto flex flex-col items-center sm:flex-row sm:mx-0 sm:border-b sm:border-gray-800 sm:pb-5 sm:flex sm:items-center sm:justify-between">

                    <select v-model="filter.selectedCategory" @change.prevent="filterByCategory" class="mt-4 sm:mt-0 border-gray-700/75 bg-gray-900 text-white">
                        <option v-if="props.category_filter" value="">{{ props.category_filter.category.title }}</option>
                        <option value="">Selecione uma categoria</option>
                        <option v-for="category in props.categories" :key="category.id" :value="category.id">
                            {{ category.title }}
                        </option>
                    </select>

                    <Link :href="route('admin.blog.posts.create')" class="mt-4  sm:mt-0 cursor-pointer inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                  <span class="flex items-center gap-1.5">
                       <TagIcon class="w-5 h-5" />
                        Nova postagem
                  </span>
                    </Link>
                </div>
                <section class="divide-y divide-gray-700 mt-4">
                    <article v-for="post in props.posts.data" :key="post.id">
                        <PostItem :id="post.id" :created_at="post.formatted_date" :status="post.status" :slug="post.slug" :title="post.title" :subtitle="post.subtitle" :image="post.image_url" :author="post.author" :category="post.category"/>
                    </article>
                </section>
               <div class="ml-7 mt-4 ">
                   <Pagination :posts="props.posts"  />
               </div>
            </div>
    </Main>

</template>
<script setup>

import Main from "@/Components/Template/Main.vue";
import PostItem from "@/Components/Molecules/Posts/PostItem.vue";

import {TagIcon} from "@heroicons/vue/24/outline/index.js";
import Pagination from "@/Components/Molecules/Posts/Pagination.vue";
import {router, useForm} from "@inertiajs/vue3";

const props = defineProps({
    posts: Object,
    categories: Object,
    category_filter: Object,
})

const filter = useForm({
    selectedCategory: '',
    paginationKey: '',
});


console.log(filter.selectedCategory);
function filterByCategory() {
    if(filter.selectedCategory === '0'){
        return router.get(route('admin.blog.posts.index', {}, {preserveState: true}));
    }
    router.get(route('admin.blog.posts.index', {category: filter.selectedCategory}, {preserveState: true}));
}



</script>
