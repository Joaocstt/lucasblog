<template>
    <div class="mt-12 p-6 rounded-md overflow-hidden bg-gray-800">
        <form @submit.prevent="deleteCategory">
            <h2 class="text-lg font-normal leading-6 text-white">Tem certeza que deseja remover essa categoria?</h2>
            <p class="mt-2 text-sm text-gray-400">
                Essa ação é irreversível, para confirmar a remoção desta categoria, digite <span class="font-semibold text-white">{{ props.title }}</span> no campo abaixo:
            </p>
            <input v-model="state.title"
                   id="title" type="text"
                   name="title"
                   placeholder="Confirme o nome da categoria"
                   class="mt-6 block w-full transition duration-150 ease-in-out  border border-gray-700 placeholder-gray-400 text-gray-200 font-medium rounded-md bg-gray-900 shadow-sm focus:outline-none  focus:border-blue-500 sm:text-sm sm:leading-5"
            />
            <button  class="mt-6 flex items-center gap-1 rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <TrashIcon class="w-5 h-5 shrink-0" />
                Remover Categoria
            </button>
        </form>
    </div>

</template>
<script setup>
import {TrashIcon} from "@heroicons/vue/24/outline/index.js";
import {reactive} from "vue";
import {useToast} from 'vue-toast-notification';
import {useForm} from "@inertiajs/vue3";

const $toast = useToast();
const props = defineProps({
    id: String,
    title: String
})


const state = useForm({
    title:  '',
});

const deleteCategory = () => {
    if (state.title !== props.title) {
        $toast.error('Confirme o nome da categoria para confirmar a ação!', {
            position: 'bottom',
            duration: 5000,
        })

        return;
    }
    state.delete(route('admin.blog.categories.destroy', props.id))
}


</script>
