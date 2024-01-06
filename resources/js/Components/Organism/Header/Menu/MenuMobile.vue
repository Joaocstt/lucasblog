<template>
    <transition
        enter-active-class="transition-transform duration-700 ease-in"
        enter-from-class="transform -translate-x-full"
        enter-to-class="transform translate-x-0"
        leave-active-class="transition-transform duration-700 ease-in"
        leave-class="transform translate-x-0"
        leave-to-class="transform -translate-x-full"
    >
        <aside v-if="useToggle.mobileMenuOpen" class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-gray-800 md:hidden">
            <div class="py-4 text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-200" href="#">Painel de Admin</a>
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
    </transition>
</template>
<script setup>

import DashboardItem from "@/Components/Molecules/Header/MenuItem/DashboardItem.vue";
import UserItem from "@/Components/Molecules/Header/MenuItem/UserItem.vue";
import BtnDropDown from "@/Components/Molecules/Header/MenuItem/DropDownItem/ItemSubMenu.vue";

import { useMobileToggle } from '@/Store/MobileToggle.js';
import ItemSubMenu from "@/Components/Molecules/Header/MenuItem/DropDownItem/ItemSubMenu.vue";
import SubMenuItem from "@/Components/Molecules/Header/MenuItem/DropDownItem/SubMenuItem.vue";

const useToggle = useMobileToggle();

</script>
