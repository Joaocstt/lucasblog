<template>
    <aside class="z-20 hidden w-64 overflow-y-auto bg-gray-800 md:block flex-shrink-0">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">Painel de Admin</a>
            <ul class="mt-6">
                <DashboardItem :icon="'HomeIcon'"/>
            </ul>
            <ul>

                <UserItem v-if="$page.props.permission" :icon="'UserIcon'" />

                <ItemSubMenu :icon="'ClipboardDocumentListIcon'" :is-active="'admin.blog.*'">

                    <SubMenuItem :link="route('admin.blog.posts.index')" :is-active="'admin.blog.posts.*'" :description="'Ver Postagens'"/>

                    <SubMenuItem :link="route('admin.blog.categories.index')" :is-active="'admin.blog.categories.*'" :description="'Ver Categorias'"/>

                </ItemSubMenu>

            </ul>
        </div>
    </aside>

</template>

<script setup>


import DashboardItem from "@/Components/Molecules/Header/MenuItem/DashboardItem.vue";
import UserItem from "@/Components/Molecules/Header/MenuItem/UserItem.vue";
import * as Icons from 'vue-next-heroicons/outline';
import SubMenuItem from "@/Components/Molecules/Header/MenuItem/DropDownItem/SubMenuItem.vue";
import ItemSubMenu from "@/Components/Molecules/Header/MenuItem/DropDownItem/ItemSubMenu.vue";


</script>
