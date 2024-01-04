@extends('site.layout.mainHome')

@section('title')
    Blog | {{ $category->title }}
@endsection

@section('content')

    <div class="max-w-2xl mx-auto text-center mb-2  mt-12">
        @if($posts->count() == 0)
            <h1 class="text-3xl text-center">Nenhuma postagem foi encontrada sobre <span class="font-semibold text-gray-800">{{ $category->title }}</span>!</h1>
        @else
            <p class="mt-1 text-xl text-gray-700 dark:text-gray-800">Veja tudo sobre <span class="font-semibold text-gray-800">{{ $category->title }}</span>.</p>
        @endif
        @foreach($posts as $post)

        @endforeach
    </div>
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($posts as $post)
                <a class="group rounded-xl overflow-hidden dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
                    <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
                        <img class="w-full h-full absolute top-0 start-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl" src="{{ asset('storage/' . $post->image) }}" alt="Image Description">
                        <span class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3 dark:bg-gray-900">
                      {{ $post->category->title }}
                </span>
                    </div>

                    <div class="mt-7">
                        <h3 class="text-xl font-semibold text-gray-800 group-hover:text-gray-600 dark:text-gray-500">
                            {{ $truncatedTitles[$post->id] }}

                        </h3>
                        <p class="mt-3 text-gray-800 dark:text-gray-800">
                            {{ $truncatedSubTitles[$post->id] }}
                        </p>
                        <p class="mt-5 inline-flex items-center gap-x-1 text-blue-600 decoration-2 group-hover:underline font-medium">
                            Ler mais
                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="max-w-2xl mx-auto text-center mb-16 lg:mb-14 mt-12">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>
@endsection

