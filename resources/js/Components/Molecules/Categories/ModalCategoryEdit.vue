<template>
    <div v-if="modalCategory.isModalCategory" class="fixed top-0 left-0 z-20 flex items-center justify-center w-screen h-screen bg-slate-300/20 backdrop-blur-sm" aria-labelledby="header-1a content-1a" aria-modal="true" tabindex="-1" role="dialog">
        <div class="flex max-h-[90vh] w-11/12 max-w-2xl flex-col gap-6 overflow-hidden rounded bg-gray-800 p-6 text-slate-500 shadow-xl shadow-slate-700/10" id="modal" role="document">
            <header id="header-1a" class="flex items-center gap-4">
                <h3 class="flex-1 text-xl ml-4 font-medium text-slate-700 text-white">Confirmação de edição de categoria</h3>
                <button class="inline-flex items-center justify-center h-10 gap-2 px-5 text-sm font-medium tracking-wide transition duration-300 rounded-full focus-visible:outline-none justify-self-center whitespace-nowrap text-emerald-500 hover:bg-emerald-100 hover:text-emerald-600 focus:bg-emerald-200 focus:text-emerald-700 disabled:cursor-not-allowed disabled:text-emerald-300 disabled:shadow-none disabled:hover:bg-transparent" aria-label="close dialog">
                        <span class="relative only:-mx-5">
                          <svg @click="modalCategory.modalClose"  xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" role="graphics-symbol" aria-labelledby="title-79 desc-79">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                        </span>
                </button>
            </header>
            <!-- Modal body -->
            <div id="content-1a" class="flex-1 overflow-auto">
                <p class="ml-4 text-sm text-white">Ao editar a categoria <b>{{ state.titleOld }} para {{ state.title }} </b>, ela será visível para o público do seu blog. Por favor, certifique-se de que esta ação é intencional e desejada.</p>
            </div>
            <!-- Modal actions -->
            <div class="flex justify-start gap-2">
                <slot />
            </div>
        </div>
    </div>

</template>


<script setup>

import {useModalCategory} from "@/Store/ModalState.js";

const modalCategory = useModalCategory();

const state = defineProps({
    id: String,
    title: String,
    titleOld: String
});


</script>
