<nav class="w-full py-4  bg-gray-100" x-data="{ open: false }">

    @php
        $uri = \Illuminate\Support\Facades\Route::current()->getName();
    @endphp

    <div class="w-full flex-grow sm:flex sm:items-center sm:w-auto cursor-pointer">
        <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
            @foreach ($categories as $category)
               <div class="py-2 px-4 mx-2 hover:bg-blue-700 rounded cursor-pointer hover:text-white">
                    <a href="{{ route('site.posts', $category->slug)}}" @class(['bg-blue-700 text-white rounded py-2 px-4 mx-2' => $uri === 'category.technology'])>
                    {{ $category->title }}
                    </a>
               </div>
            @endforeach
        </div>
    </div>
</nav>

