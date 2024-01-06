<template>
    <Main>
        <div class="container px-6 mx-auto grid">
            <div class="mx-auto flex flex-col items-center sm:flex-row sm:mx-0 sm:border-b sm:border-gray-800 sm:pb-5 sm:flex sm:items-center sm:justify-between mt-16">
                <h3 class="text-base font-semibold leading-6 text-white">Listagem de usuários</h3>

                <Link :href="route('admin.users.create')" class="mt-4  sm:mt-0 cursor-pointer inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-blue-600 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:shadow-outline-blue active:bg-blue-700">
                   <span class="flex items-center gap-1.5">
                        <TagIcon class="w-5 h-5" />
                        Novo usuário
                   </span>
                </Link>
            </div>
            <div class="w-full overflow-x-auto mt-10">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Usuário</th>
                        <th class="px-4 py-3">E-mail</th>
                        <th class="px-4 py-3">Permissão</th>
                        <th class="px-4 py-3">Gerenciar</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <UserItem
                                v-for="user in users"
                                :key="user.id"
                                :id="user.id"
                                :name="user.name"
                                :email="user.email"
                                :role="user.role"
                                :avatar="user.avatar_url"
                            />
                    </tbody>
                </table>
            </div>
        </div>
    </Main>
 </template>

 <script setup>

 import Main from "@/Components/Template/Main.vue";
 import {TagIcon} from "@heroicons/vue/24/outline/index.js";
 import UserItem from "@/Components/Molecules/Users/UserItem.vue";


 const props = defineProps({
    users: Object,
 })

 </script>
