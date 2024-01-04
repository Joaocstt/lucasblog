<template>
    <Main>
        <div class="container px-6 mx-auto grid mt-16">

            <div class="mx-auto flex flex-col items-center sm:flex-row sm:mx-0 sm:border-b sm:border-gray-800 sm:pb-5 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-base font-semibold leading-6 text-white">
                   Gerenciar {{ props.category?.id ? 'categoria: ' +  form.title : 'Nova categoria' }}
                </h3>

                <Link :href="route('admin.blog.categories.index')" class="mt-4  sm:mt-0 cursor-pointer inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
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
                            <h4 class="text-lg font-semibold leading-6 text-white">Definições da categoria</h4>
                            <p class="mt-1 text-sm text-gray-400">
                                Utilize essa seção para definir o título da categoria do seu blog! Essa categoria será visível para o seu público.
                            </p>
                        </div>

                        <div class="grid grid-cols-1 gap-x-6 gap-y-8 md:grid-cols-6 md:col-span-2">
                            <div class="col-span-full">
                                <div>
                                    <label for="title" class="block text-sm font-medium leading-6 text-white">Título</label>
                                    <div class="mt-1 rounded-md shadow-sm">
                                        <input v-model="form.title" id="title" type="text" name="title" placeholder="Informe o título da categoria" class="block w-full transition duration-150 ease-in-out  border border-gray-700 placeholder-gray-400 text-gray-200 font-medium rounded-md bg-gray-900 shadow-sm focus:outline-none  focus:border-blue-500 sm:text-sm sm:leading-5" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button @click.prevent="() => {form.showDeleteForm = !form.showDeleteForm}" v-if="props.category?.id" class="text-sm font-semibold leading-6 text-red-500 flex items-center gap-x-3">
                        <TrashIcon class="w-5 h-5 shrink-0" />
                        Remover
                    </button>
                    <button @click="stateModal.modalOpen" class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        {{ props.category?.id ? 'Editar categoria' : 'Criar categoria' }}
                    </button>
                </div>

                <ModalCategoryEdit :title="form.title" :titleOld="props.category.title" v-if="idUrl">
                    <button @click="submitForm" type="button" class="w-full rounded-md bg-green-500 px-7 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-700 sm:ml-3 ">Confirmar</button>
                </ModalCategoryEdit>

                <ModalCategory v-if="idUrl !== true">
                    <button @click="submitForm" type="button" class="inline-flex w-full justify-center rounded-md bg-green-500 px-7 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-700 sm:ml-3">Confirmar</button>
                </ModalCategory>

            </div>
            <CategoryRemove v-if="form.showDeleteForm" :id="props.category?.id" :title="props.category?.title" />
        </div>

    </Main>
</template>

<script setup>
import {ArrowUturnLeftIcon, TrashIcon} from "@heroicons/vue/24/outline/index.js";
import 'vue-toast-notification/dist/theme-sugar.css';
import Main from "@/Components/Template/Main.vue";
import {useForm} from "@inertiajs/vue3";
import {useToast} from 'vue-toast-notification';
import {useModalCategory} from "@/Store/ModalState.js";
import ModalCategory from "@/Components/Molecules/Categories/ModalCategory.vue";
import ModalCategoryEdit from "@/Components/Molecules/Categories/ModalCategoryEdit.vue";
import CategoryRemove from "@/Components/Molecules/Categories/CategoryRemove.vue";

const props = defineProps({
    category: Object
})

const form = useForm({
    title: props.category?.title ?? '',
    showDeleteForm: false,
});

const stateModal = useModalCategory();
const $toast = useToast();
const idUrl = props.category?.id !== undefined && props.category?.id !== null;

function submitForm () {

    if(props.category?.id) {
        form.put(route('admin.blog.categories.update', props.category.id), {
            onSuccess: () => {
                stateModal.modalClose();
            },
            onError: (error) => {
                $toast.error(error.title, {
                    position: 'bottom',
                    duration: 5000,
                })
                stateModal.modalClose();
            },
            onFinish: () => {
                form.password = '';
            },
        });
        return;
    }

      form.post(route('admin.blog.categories.store'), {
          onSuccess: () => {
            stateModal.modalClose();
            form.title = ''
          },
          onError: (error) => {
              $toast.error(error.title,{
                  position: 'bottom',
                  duration: 5000,
              })

              stateModal.modalClose();

          },
          onFinish: () => {
              form.password = '';
          },
      });
}


</script>
