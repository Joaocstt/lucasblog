<template>

    <div class="w-full bg-gray-900 dark:text-gray-100">
        <div class="lg:flex lg:items-center lg:justify-between mt-14">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-white sm:text-base sm:tracking-tight">{{ props.title }}</h2>
                <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6 mb-4">
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <NewspaperIcon class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-300" aria-hidden="true" />
                        <p class="truncate text-xs leading-5 font-semibold text-white">{{ props.category.title }} </p>
                    </div>
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <CalendarDaysIcon class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-300" aria-hidden="true" />
                        <span class="text-xs text-white">{{ props.created_at }}</span>
                    </div>
                </div>
            </div>
            <div class="mt-5 flex lg:ml-4 lg:mt-0">
          <span class="hidden sm:block">
              <Link
                  class="hidden rounded-md px-3.5 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-900 sm:block"
                  :href="route('admin.blog.posts.show',  { id: props.id, slug: props.slug })">
                      <button class="bg-transparent hover:border-gray-600  text-white font-semibold hover:text-white py-2 px-4 border border-gray-800  rounded">
                          <span class="flex items-center gap-1.5">
                              <EyeIcon class="w-5 h-5" />
                              Visualizar
                          </span>
                      </button>
                  </Link>
          </span>

                <span class="ml-3 hidden sm:block">
                <Link
                    class="hidden rounded-md px-3.5 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-900 sm:block"
                    :href="route('admin.blog.posts.edit', id)">
                        <button class="bg-transparent hover:border-gray-600  text-white font-semibold hover:text-white py-2 px-4 border border-gray-800 rounded">
                            <span class="flex items-center gap-1.5">
                                <PencilSquareIcon class="w-5 h-5" />
                                Editar
                            </span>
                        </button>
                  </Link>
           </span>

                <span class="sm:ml-3">
              <span
                  class="hidden rounded-md px-3.5 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-900 sm:block">
                <button class="bg-transparent hover:border-gray-600 text-white font-semibold hover:text-white py-2 px-4 hover:border-transparent rounded">
                          <span :class="[
                              {'flex items-center gap-1.5 text-green-400/100': props.status === 'published'},
                              {'flex items-center gap-1.5 text-yellow-300/90': props.status !== 'published'}
                          ]">
                          <CheckCircleIcon v-if="props.status === 'published'" class="w-5 h-5" />
                         <MinusCircleIcon v-if="props.status === 'draft'" class="w-5 h-5 text-yellow-300/90" />

                      {{ props.status === 'draft' ? 'Pendente' : 'Publicado' }}

                    </span>
                </button>
            </span>
          </span>

                <!--          &lt;!&ndash; Dropdown &ndash;&gt;-->
                <!--          <div class="relative ml-3 sm:hidden">-->
                <!--            <button type="button" class="inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:ring-gray-400" id="mobile-menu-button" aria-expanded="false" aria-haspopup="true">-->
                <!--              More-->
                <!--              <svg class="-mr-1 ml-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
                <!--                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />-->
                <!--              </svg>-->
                <!--            </button>-->

                <!--            &lt;!&ndash;-->
                <!--              Dropdown menu, show/hide based on menu state.-->

                <!--              Entering: "transition ease-out duration-200"-->
                <!--                From: "transform opacity-0 scale-95"-->
                <!--                To: "transform opacity-100 scale-100"-->
                <!--              Leaving: "transition ease-in duration-75"-->
                <!--                From: "transform opacity-100 scale-100"-->
                <!--                To: "transform opacity-0 scale-95"-->
                <!--            &ndash;&gt;-->
                <!--            <div class="absolute right-0 z-10 -mr-1 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="mobile-menu-button" tabindex="-1">-->
                <!--              &lt;!&ndash; Active: "bg-gray-100", Not Active: "" &ndash;&gt;-->
                <!--              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="mobile-menu-item-0">Edit</a>-->
                <!--              <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="mobile-menu-item-1">View</a>-->
                <!--            </div>-->
                <!--          </div>-->
            </div>
        </div>
    </div>
</template>

<script setup>

import {NewspaperIcon,CalendarDaysIcon,MinusCircleIcon, EyeIcon, PencilSquareIcon, CheckCircleIcon} from "@heroicons/vue/24/outline/index.js";

const props = defineProps({
    title: String,
    subtitle: String,
    image: String,
    slug: String,
    author: Object,
    category: Object,
    status: String,
    id: String,
    created_at: String,
})

</script>
