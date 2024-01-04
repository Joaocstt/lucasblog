<template>
    <Main>
        <div class="container px-6 mx-auto grid">
 
            <div class="w-full overflow-x-auto mt-16">
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
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy">
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">Lucas Santana</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        Postador
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            LucasSantana@gmail.com
                        </td>
                        <td class="px-4 py-3 text-xs">
                         <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                           Approved
                         </span>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <button class="rounded-md bg-white p-1 text-gray-800">Gerenciar</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </Main>
 </template>
 
 <script setup>
 
 import Main from "@/Components/Template/Main.vue";
 </script>
 