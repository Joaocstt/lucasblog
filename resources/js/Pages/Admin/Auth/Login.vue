<template>
    <Logo />
    <div class="max-w-lg mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300 ">
        <h1 class="text-4xl font-medium text-center">Acesso administrativo</h1>
        <p class="text-slate-500 mt-4 text-center">Olá, Bem vindo 👋</p>

        <form @submit.prevent="submitForm" class="my-10">
            <div class="flex flex-col space-y-5">
                <label for="email">
                    <p class="font-medium text-slate-700 pb-2">E-mail</p>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                        placeholder="Digite seu e-mail"
                        v-model="form.email">
                </label>
                <label for="password">
                    <p class="font-medium text-slate-700 pb-2">Senha</p>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow"
                        placeholder="Digite sua senha"
                        v-model="form.password">

                </label>
                <div class="flex flex-row justify-between">
                    <div>
                        <label for="remember" class="">
                            <input type="checkbox" id="remember" class="w-4 h-4 border-slate-200 focus:bg-indigo-600">
                            Lembrar-me
                        </label>
                    </div>
                    <div>
                        <a href="#" class="font-medium text-indigo-600">Esqueceu sua senha?</a>
                    </div>
                </div>
                <button type="submit" class="w-full py-3 font-medium text-white bg-indigo-600 hover:bg-indigo-500 rounded-lg border-indigo-500 hover:shadow inline-flex space-x-2 items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                    </svg>
                    <span>Efetuar login</span>
                </button>
                <p class="text-center">Não possui uma conta? <a href="#" class="text-indigo-600 font-medium inline-flex space-x-1 items-center">
                    <span>Acesso somente para administrador </span><span><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                  </svg></span></a></p>
            </div>
        </form>
    </div>
</template>

<script setup>

import {useForm} from "@inertiajs/vue3";
import ToastNotification from "@/Components/Molecules/Toast/ToastNotification.vue";
import {useToast} from "vue-toastification";
import Logo from "@/Components/Atoms/Logo.vue";
const toast = useToast();

const form = useForm({
    email: '',
    password: '',
});

function submitForm () {
    form.post(route('admin.login.do'), {
        onSuccess: () => {
            console.log('success');
        },
        onError: (error) => {
            let message_error = "";
            Object.keys(error).forEach(field => {
                const errorMessage = error[field];
                message_error += errorMessage + '<br>'
            });
            toast({
                component: ToastNotification,
                props: {
                    title: 'Ooops, não foi possível efetuar o login!',
                    content: message_error,
                    icon: 'XCircle',
                    classIcon: 'text-red-400',
                },
            });
        },
        onFinish: () => {
            form.password = '';
        },
    });
}


</script>
