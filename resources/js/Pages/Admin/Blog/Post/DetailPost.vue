<template>
    <Main>
        <div class="container px-6 mx-auto grid mt-16">

        <div class="px-4 sm:px-0 flex justify-between items-center ">

          <div class="flex flex-col">
            <h3 class="text-base font-semibold leading-7 text-white">Detalhe da publicação</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-300">Verifique os dados da publicação antes de publicar.</p>
          </div>
            <div>
              <Link :href="route('admin.blog.posts.index')" class="mt-4  sm:mt-0 cursor-pointer inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                  <span class="flex items-center gap-1.5">
                    <ArrowUturnLeftIcon class="w-4 h-5" />
                    Voltar
                  </span>
              </Link>
            </div>
        </div>
        <form @submit.prevent="published" class="mt-6 border-t border-gray-800">
            <dl class="divide-y divide-gray-800">
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-white">Título</dt>
                    <dd class="mt-1 text-sm leading-6 text-white sm:col-span-2 sm:mt-0">{{ props.posts.title }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-white">Subtítulo</dt>
                    <dd class="mt-1 text-sm leading-6 text-white sm:col-span-2 sm:mt-0">{{ props.posts.subtitle }}</dd>
                </div>
              <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                <dt class="text-sm font-medium leading-6 text-white">Status</dt>
                <dd class="mt-1 text-sm leading-6 text-white sm:col-span-2 sm:mt-0">
                  {{ props.posts.status === 'published' ? 'Publicado' : 'Pendente' }}
                </dd>
              </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-white">Imagem</dt>
                    <dd class="mt-1 text-sm leading-6 text-white sm:col-span-2 sm:mt-0">
                        <img :src="props.posts.image_url" alt="Imagem da publicação" class="w-32 h-32 rounded-md">
                    </dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-white">Categoria</dt>
                    <dd class="mt-1 text-sm leading-6 text-white sm:col-span-2 sm:mt-0">{{ props.posts.category.title }}</dd>
                </div>
                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                    <dt class="text-sm font-medium leading-6 text-white">Conteúdo</dt>
                    <dd class="mt-1 text-sm leading-6 text-gray-300 sm:col-span-2 sm:mt-0" v-html="props.posts.content"></dd>                </div>
                <div class="flex items-center justify-end gap-x-6">
                    <button v-if="props.posts.status !== 'published'" type="submit" class="mt-7 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Publicar postagem</button>
                    <button @submit.prevent="published" v-if="props.posts.status === 'published'" type="submit" class="mt-7 rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Remover postagem</button>

                </div>
            </dl>
        </form>


    </div>
    </Main>
</template>

<script setup>

import Main from "@/Components/Template/Main.vue";
import {useForm} from "@inertiajs/vue3";
import {useToast} from 'vue-toast-notification';
import {ArrowUturnLeftIcon} from "@heroicons/vue/24/outline/index.js";
const $toast = useToast();

const props = defineProps({
    posts: Object,
    categories: Object,
})

const form = useForm({
    title: props.posts.title,
    subtitle: props.posts.subtitle,
    image: props.posts.image,
    category_id: props.posts.category.id,
    content: props.posts.content,
});


function published() {

    form.put(route('admin.blog.posts.publish', {id: props.posts.id}), {
        onSuccess: () => {
            if(props.posts.status === 'published') {
                $toast.success('Publicação realizada com sucesso!', {
                    position: 'bottom',
                    duration: 5000,
                })
            } else {
                $toast.warning('Publicação removida com sucesso!', {
                    position: 'bottom',
                    duration: 5000,
                })
            }
        },
    })

}
</script>
