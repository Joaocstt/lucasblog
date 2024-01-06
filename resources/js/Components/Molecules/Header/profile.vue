<template>
    <ul class="flex items-center flex-shrink-0 space-x-6">
        <!-- Profile menu -->
        <li class="relative left-3">
            <button @click="toggleProfile" class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none" aria-label="Account" aria-haspopup="true">

                <div class="flex-shrink-0">
                    <img
                        v-if="$page.props.user.avatar_url"
                        class="inline-block h-8 w-8 rounded-full"
                        :src="$page.props.user.avatar_url"
                        alt="Imagem do usuário"
                    />
                </div>

            </button>

            <ul
                v-if="StateProfile"
                class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                aria-label="submenu">
                <li class="flex">
                    <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#">
                        <svg
                            class="w-4 h-4 mr-3"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            ></path>
                        </svg>
                        <span>Perfil</span>
                    </a>
                </li>
                <li class="flex">
                    <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                    >
                        <svg
                            class="w-4 h-4 mr-3"
                            aria-hidden="true"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                            ></path>
                        </svg>
                        <Link :href="route('admin.logout')">Desconectar</Link>
                    </a>
                </li>
            </ul>
        </li>
        <span class="text-white font-semibold">{{ $page.props.user.name }}</span>
    </ul>
</template>

<script setup>

    import {ref} from "vue";

    const StateProfile = ref(false);
    const toggleProfile = () => {
        StateProfile.value = !StateProfile.value;
    }

</script>
