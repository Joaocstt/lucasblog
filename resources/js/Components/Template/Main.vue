<template>

    <div
        class="flex h-screen bg-gray-900">
        <AsideDesktop />

        <MenuMobile />
        <div class="flex flex-col flex-1 w-full">
            <TopBar />
            <main class="h-full overflow-y-auto">
                <slot />
            </main>

        </div>

    </div>


</template>


<script setup>


import  AsideDesktop from "@/Components/Organism/Header/Menu/AsideDesktop.vue";
import TopBar from "@/Components/Organism/Header/TopBar.vue";
import MenuMobile from "@/Components/Organism/Header/Menu/MenuMobile.vue";
</script>
