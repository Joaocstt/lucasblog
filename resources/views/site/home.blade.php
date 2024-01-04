@extends('site.layout.app')
@section('content')
    @include('site.layout.textHeader')
    @include('site.layout.nav')
        @hasSection('content')
            @yield('content')
        @else
            <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
               
                <nav class="mb-5">
                    <ol class="flex items-stretch gap-2 px-4 list-none rounded shadow-md h-14 shadow-slate-200 bg-white">
                        <li class="flex items-center gap-2">
                            <a href="#" class="flex max-w-[20ch] items-center gap-1 truncate whitespace-nowrap text-slate-700 transition-colors hover:text-emerald-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true" aria-labelledby="title-01 description-01" role="link">
                                    <title id="title-01">Home</title>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-none w-4 h-4 transition-transform stroke-slate-700 md:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true" aria-labelledby="title-02 description-02" role="graphics-symbol">
                                <title id="title-02">Arrow</title>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </li>
                        <li class="flex items-center flex-1 gap-2">
                            <a href="#" aria-current="page" class="pointer-events-none max-w-[20ch] truncate whitespace-nowrap text-slate-400">Postagens recentes</a>
                        </li>
                    </ol>
                </nav>
                <div class="grid lg:grid-cols-2 gap-6">
                    @if($postsLatest->count() == 0)
                    <h1 class="text-3xl">Nenhuma postagem publicada!</h1>
                    @endif
                    @foreach($postsLatest as $post)
                        <a class="group relative block rounded-xl dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
                                    <div class="flex-shrink-0 relative w-full rounded-xl overflow-hidden h-[350px] before:absolute before:inset-x-0 before:w-full before:h-full before:bg-gradient-to-t before:from-gray-900/[.7] before:z-[1]">
                                        <img class="w-full h-full absolute top-0 start-0 object-cover" src="{{ asset('storage/' . $post->image) }}" alt="Imagem postagem">
                                    </div>

                                    <div class="absolute top-0 inset-x-0 z-10">
                                        <div class="p-4 flex flex-col h-full sm:p-6">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0">
                                                    <img class="h-[2.875rem] w-[2.875rem] border-2 border-white rounded-full" src="https://images.unsplash.com/photo-1669837401587-f9a4cfe3126e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Image Description">
                                                </div>
                                                <div class="ms-2.5 sm:ms-4">
                                                    <h4 class="font-semibold text-white">
                                                        {{ $post->author->name  }}
                                                    </h4>
                                                    <p class="text-xs text-white/[.8]">
                                                        {{ $post->created_at->format('d/m/Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="absolute bottom-0 inset-x-0 z-10">
                                        <div class="flex flex-col h-full p-4 sm:p-6">
                                            <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/[.8]">
                                                {{ $truncatedTitles[$post->id] }}
                                            </h3>
                                            <p class="mt-2 text-white/[.8]">
                                                {{ $truncatedSubTitles[$post->id] }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                    @endforeach
                </div>
                <nav class="mt-16">
                    <ol class="flex items-stretch gap-2 px-4 list-none rounded shadow-md h-14 shadow-slate-200 bg-white">
                        <li class="flex items-center gap-2">
                            <a href="#" class="flex max-w-[20ch] items-center gap-1 truncate whitespace-nowrap text-slate-700 transition-colors hover:text-emerald-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true" aria-labelledby="title-01 description-01" role="link">
                                    <title id="title-01">Home</title>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </a>
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-none w-4 h-4 transition-transform stroke-slate-700 md:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" aria-hidden="true" aria-labelledby="title-02 description-02" role="graphics-symbol">
                                <title id="title-02">Arrow</title>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </li>
                        <li class="flex items-center flex-1 gap-2">
                            <a href="#" aria-current="page" class="pointer-events-none max-w-[20ch] truncate whitespace-nowrap text-slate-400">Últimas Postagens</a>
                        </li>
                    </ol>
                </nav>
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
                    @if($postsNotRecent->count() == 0)
                    <h1 class="text-3xl">Nenhuma postagem publicada!</h1>
                    @endif
                    
                    @foreach($postsNotRecent as $post)
                        <a class="group rounded-xl overflow-hidden dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
                            <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                                <img class="w-full h-full absolute top-0 start-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl" src="{{ asset('storage/' . $post->image) }}" alt="Image Description">
                                <span class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3 dark:bg-gray-900">
                                    {{ $post->category->title }}
                                </span>
                            </div>

                            <div class="mt-7">
                                <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-gray-500">
                                    {{ $post->title}}

                                </h3>
                                <p class="mt-3 text-gray-800 dark:text-gray-800">
                                    {{ $post->subtitle  }}
                                </p>
                                <p class="mt-5 inline-flex items-center gap-x-1 text-blue-600 decoration-2 group-hover:underline font-medium">
                                    Ler mais
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
                <div class="max-w-2xl mx-auto text-center mb-16 lg:mb-14 mt-12">
                    {{ $postsNotRecent->links('pagination::tailwind') }}
                </div>
        @endif
@endsection

