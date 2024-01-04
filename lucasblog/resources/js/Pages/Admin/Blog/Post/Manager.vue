<template>
    <Main>
        <div class="container px-6 mx-auto grid mt-16">

            <div class="mx-auto flex flex-col items-center sm:flex-row sm:mx-0 sm:border-b sm:border-gray-800 sm:pb-5 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-base font-semibold leading-6 text-white">
                    Cadastro de postagem
                </h3>

                <Link :href="route('admin.blog.posts.index')" class="mt-4  sm:mt-0 cursor-pointer inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                  <span class="flex items-center gap-1.5">
                    <ArrowUturnLeftIcon class="w-4 h-5" />
                    Voltar
                  </span>
                </Link>
            </div>

            <div  class="mt-12">
                <div class="space-y-12">
                    <div class="grid grid-cols-1 gap-x-8 gap-y-10 border-b border-gray-900/10 pb-12 md:grid-cols-3 sm:border-b sm:border-gray-800 ">
                        <div>
                            <h4 class="text-lg font-semibold leading-6 text-white">Definições da publicação</h4>
                            <p class="mt-1 text-sm text-gray-400">
                                Utilize essa seção para definir a sua publicação! Essa publicação ficará pendente pra você, você pode publicar após o cadastro.
                            </p>
                        </div>

                        <form @submit.prevent="submitForm" class="grid grid-cols-1 gap-x-6 gap-y-8 md:grid-cols-6 md:col-span-2">
                            <div class="col-span-full">
                                <div>
                                    <div class="mt-1 rounded-md shadow-sm">
                                        <label for="title" class="block text-sm font-medium leading-6 text-white">Título</label>
                                        <input v-model="form.title" id="title" type="text" name="title" placeholder="Informe o título da categoria" class="mt-1 block w-full transition duration-150 ease-in-out  border border-gray-700 placeholder-gray-400 text-gray-200 font-medium rounded-md bg-gray-900 shadow-sm focus:outline-none  focus:border-blue-500 sm:text-sm sm:leading-5" />
                                    </div>

                                    <div class="mt-6 rounded-md shadow-sm">
                                        <label for="title" class="block text-sm font-medium leading-6 text-white">Subtítulo</label>
                                        <input v-model="form.subtitle" id="title" type="text" name="title" placeholder="Informe o subtítulo da categoria (opcional)" class="mt-1 block w-full transition duration-150 ease-in-out  border border-gray-700 placeholder-gray-400 text-gray-200 font-medium rounded-md bg-gray-900 shadow-sm focus:outline-none  focus:border-blue-500 sm:text-sm sm:leading-5" />
                                    </div>

                                   <div class="mt-6 rounded-md shadow-sm">
                                       <label for="title" class="block text-sm font-medium leading-6 text-white">Categoria</label>
                                       <select v-model="form.category_id" id="hs-hidden-select" class="mt-1 font-semibold py-3 px-4 pe-9 block w-56 bg-gray-900 border-gray-800 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                           <option value="" selected>Selecione uma categoria</option>
                                           <option class="font-semibold" v-for="category in categories" :value="category.id" :key="category.id">
                                               {{ category.title }}
                                           </option>
                                       </select>
                                   </div>

                                    <div class="mt-6 rounded-md shadow-sm">
                                        <label for="title" class="block text-sm font-medium leading-6 text-white">Imagem</label>
                                        <input type="file"  @input="form.image = $event.target.files[0]" name="small-file-input" id="small-file-input" class="mt-1 block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                                            file:bg-gray-50 file:border-0
                                            file:bg-gray-100 file:me-4
                                            file:py-2 file:px-4
                                            dark:file:bg-gray-700 dark:file:text-gray-400">
                                    </div>

                                    <div class="mt-6 rounded-md shadow-sm">

                                        <quill-editor
                                            v-model:content="form.content"
                                            content-type="html"
                                            :toolbar="toolbarOptions"
                                            :placeholder="'Escreva o conteúdo da sua postagem'"
                                            theme="snow">

                                        </quill-editor>

                                    </div>

                                    <div class="flex items-center justify-end gap-x-6">
                                        <button  type="submit" class="mt-7 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar publicação</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </Main>
</template>

<script setup>

import Main from "@/Components/Template/Main.vue";
import {ArrowUturnLeftIcon} from "@heroicons/vue/24/outline/index.js";
import {useForm} from "@inertiajs/vue3";
import { QuillEditor } from '@vueup/vue-quill'

import {useToast} from 'vue-toast-notification';

const $toast = useToast();

const props = defineProps({
    posts: Object,
    categories: Object,
})

const form = useForm({
    title: '',
    subtitle: '',
    category_id: '',
    image: '',
    content: '',
});

function submitForm() {
    form.post(route('admin.blog.posts.store'), {
        onError: (error) => {
            $toast.error(getError(error), {
                position: 'bottom',
                duration: 5000,
            })
        },
    })
}


function getError(errors) {
    let error = '';
    for (const [key, value] of Object.entries(errors)) {
        error += value + '<br>';
    }
    console.log(error)
    return error;
}

const toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike', 'image', { 'list': 'ordered'}, { 'header': [1, 2, 3, 4, 5, 6, true] }],

];

</script>


<style>

.ql-editor p, .ql-editor ol, .ql-editor ul, .ql-editor pre, .ql-editor blockquote, .ql-editor h1, .ql-editor h2, .ql-editor h3, .ql-editor h4, .ql-editor h5, .ql-editor h6{
    color: #ffffff !important;
}

</style>
