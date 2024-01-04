<template>
    <div class="mt-12 p-6 rounded-md overflow-hidden bg-gray-800">
        <form @submit.prevent="deletePost">
            <h2 class="text-lg font-normal leading-6 text-white">Tem certeza que deseja excluir essa postagem?</h2>
            <p class="mt-2 text-sm text-gray-400">
                Essa ação é irreversível, para confirmar a remoção desta postagem, digite <span class="font-semibold text-white">{{ props.id }}</span> no campo abaixo:
            </p>
            <input v-model="state.id"
                   id="title" type="number"
                   name="title"
                   placeholder="Digite o número para confirmar a ação"
                   class="mt-6 block w-full transition duration-150 ease-in-out text-white   placeholder-gray-400 font-medium rounded-md bg-gray-900  focus:blue-red-500 sm:text-sm sm:leading-5"
            />
            <button  class="mt-6 flex items-center gap-1 rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                <TrashIcon class="w-5 h-5 shrink-0" />
                Excluir Postagem permanente
            </button>
        </form>
    </div>

</template>
<script setup>
import {TrashIcon} from "@heroicons/vue/24/outline/index.js";
import {useToast} from 'vue-toast-notification';
import {useForm} from "@inertiajs/vue3";

const $toast = useToast();
const props = defineProps({
    id: String,
})

const state = useForm({
    id:  null,
});

const deletePost = () => {
    if (state.id !== props.id) {
        $toast.error('Atenção, digite o número acima para realizar a ação!', {
            position: 'bottom',
            duration: 5000,
        })

        return;
    }
    state.delete(route('admin.blog.posts.destroy', props.id))
}


</script>
