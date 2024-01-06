<template>
<Main>
    <div class="container px-6 mx-auto grid mt-16">

        <div class="mx-auto flex flex-col items-center sm:flex-row sm:mx-0 sm:border-b sm:border-gray-800 sm:pb-5 sm:flex sm:items-center sm:justify-between">
            <h3 class="text-base font-semibold leading-6 text-white">
                Você deseja excluir: <span class="text-red-500">{{ props.userEmail.name }}</span>
            </h3>

            <Link :href="route('admin.users.index')" class="mt-4  sm:mt-0 cursor-pointer inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                  <span class="flex items-center gap-1.5">
                    <ArrowUturnLeftIcon class="w-4 h-5" />
                    Voltar
                  </span>
            </Link>
        </div>

        <div class="mt-12 p-6 rounded-md overflow-hidden bg-gray-800">
            <form @submit.prevent="deleteUser">
                <h2 class="text-lg font-normal leading-6 text-white">Tem certeza que deseja excluir esse usuário?</h2>
                <p class="mt-2 text-sm text-gray-400">
                    Essa ação é irreversível, para confirmar a remoção deste usuário, digite <span class="font-semibold text-white"></span> no campo abaixo:
                </p>
                <input
                       v-model="form.email"
                       id="title" type="text"
                       name="title"
                       placeholder="Digite a senha do usuário"
                       class="mt-6 block w-full transition duration-150 ease-in-out text-white   placeholder-gray-400 font-medium rounded-md bg-gray-900  focus:blue-red-500 sm:text-sm sm:leading-5"
                />
                <button  class="mt-6 flex items-center gap-1 rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <TrashIcon class="w-5 h-5 shrink-0" />
                    Excluir usuário permanente
                </button>
            </form>
        </div>
    </div>

</Main>
</template>

<script setup>

import Main from "@/Components/Template/Main.vue";
import {ArrowUturnLeftIcon, TrashIcon} from "@heroicons/vue/24/outline/index.js";
import {useForm} from "@inertiajs/vue3";
import {useToast} from "vue-toast-notification";

const $toast = useToast();

const props = defineProps({
    userEmail: Object,
})

const form = useForm( {
    email: null,
})

function deleteUser() {
    if(form.email !== props.userEmail.email) {
        $toast.error('Atenção, digite o email do usuário para realizar a ação!', {
            position: 'bottom',
            duration: 5000,
        })
        return;
    }
    form.delete(route('admin.users.destroy', props.userEmail.id), {
        onSuccess: () => {
            $toast.success('Usuário excluído com sucesso!', {
                position: 'bottom',
                duration: 5000,
            })
        },
    })
}

</script>
