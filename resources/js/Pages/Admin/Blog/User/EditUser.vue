<template>
    <Main>
        <div class="container px-6 mx-auto grid mt-16">

            <div class="mx-auto flex flex-col items-center sm:flex-row sm:mx-0 sm:border-b sm:border-gray-800 sm:pb-5 sm:flex sm:items-center sm:justify-between">
                <h3 class="text-base font-semibold leading-6 text-white">
                    Editar usuário: {{ props.user.name }}
                </h3>

                <Link :href="route('admin.users.index')" class="mt-4  sm:mt-0 cursor-pointer inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
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
                            <h4 class="text-lg font-semibold leading-6 text-white">Definições de edição de usuário</h4>
                            <p class="mt-1 text-sm text-gray-400">
                                Utilize essa seção para editar um usuário.
                            </p>
                        </div>

                        <form @submit.prevent="submitForm" class="grid grid-cols-1 gap-x-6 gap-y-8 md:grid-cols-6 md:col-span-2">
                            <div class="col-span-full">
                                <div>
                                    <div class="mt-1 rounded-md shadow-sm">
                                        <label for="title" class="block text-sm font-medium leading-6 text-white">Nome</label>
                                        <input v-model="form.name" id="name" type="text" name="name" placeholder="Informe nome do usuário" class="mt-1 block w-full transition duration-150 ease-in-out  border border-gray-700 placeholder-gray-400 text-gray-200 font-medium rounded-md bg-gray-900 shadow-sm focus:outline-none  focus:border-blue-500 sm:text-sm sm:leading-5" />
                                    </div>

                                    <div class="mt-1 rounded-md shadow-sm">
                                        <label for="title" class="block text-sm font-medium leading-6 text-white">Senha</label>
                                        <input v-model="form.password" id="password" type="text" name="password" placeholder="Informe a nova senha" class="mt-1 block w-full transition duration-150 ease-in-out  border border-gray-700 placeholder-gray-400 text-gray-200 font-medium rounded-md bg-gray-900 shadow-sm focus:outline-none  focus:border-blue-500 sm:text-sm sm:leading-5" />
                                    </div>

                                    <div class="mt-6 rounded-md shadow-sm">
                                        <label for="email" class="block text-sm font-medium leading-6 text-white">E-mail</label>
                                        <input v-model="form.email" id="email" type="text" name="email" placeholder="Informe e-mail do usuário" class="mt-1 block w-full transition duration-150 ease-in-out  border border-gray-700 placeholder-gray-400 text-gray-200 font-medium rounded-md bg-gray-900 shadow-sm focus:outline-none  focus:border-blue-500 sm:text-sm sm:leading-5" />
                                    </div>

                                    <div class="mt-6 rounded-md shadow-sm">
                                        <label for="permission" class="block text-sm font-medium leading-6 text-white">Permissão</label>
                                        <select v-model="form.role" id="permission" class="mt-1 font-semibold py-3 px-4 pe-9 block w-56 bg-gray-900 border-gray-800 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                            <option value="" selected>Selecione uma permissão</option>
                                            <option value="admin" class="font-semibold">Admin</option>
                                            <option value="editor" class="font-semibold">Editor</option>
                                        </select>
                                    </div>

                                    <div class="mt-6 rounded-md shadow-sm">
                                        <label for="avatar" class="block text-sm font-medium leading-6 text-white">Avatar</label>
                                        <input type="file"  @input="form.avatar = $event.target.files[0]" name="avatar" id="avatar" class="mt-1 block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600
                                            file:border-0
                                            file:bg-gray-100 file:me-4
                                            file:py-2 file:px-4
                                            dark:file:bg-gray-700 dark:file:text-gray-400">
                                    </div>

                                    <div class="flex items-center justify-end gap-x-6">
                                        <button  type="submit" class="mt-7 rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Salvar</button>
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
import {ArrowUturnLeftIcon} from "@heroicons/vue/24/outline/index.js";
import {useForm} from "@inertiajs/vue3";
import Main from "@/Components/Template/Main.vue";
import {useToast} from 'vue-toast-notification';

const $toast = useToast();

const props = defineProps({
    user: Object,
})

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    role: props.user.role,
    avatar: null,
    password: null,
})

function submitForm() {

    if(form.password === null) {
        form.password = props.user.password;
    }

    form.post(route('admin.users.update', props.user.id), {
        preserveScroll: true,
        onSuccess: () => {
            $toast.success('Usuário atualizado com sucesso!', {
                position: 'bottom',
                duration: 2000,
            })
        },
    });

}

</script>
