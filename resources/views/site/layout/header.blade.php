<!-- Top Bar Nav -->
<nav class="w-full py-4 bg-gray-900 shadow">
    <div class="w-full container  flex flex-col items-center mx-auto sm:flex-row sm:items-center sm:justify-between">

        <nav>
            <ul class="flex flex-col items-center gap-4 sm:flex-row sm:items-center sm:justify-between font-bold text-sm text-white uppercase no-underline">
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('site.home') }}">Página Inicial</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('site.about') }}">Sobre mim</a></li>
            </ul>
        </nav>

        <div class="flex mt-4 sm:mt-0 items-center text-lg no-underline text-white pr-6">
            <a class="" href="#">
                <i class="fab fa-facebook"></i>
            </a>
            <a class="pl-6" href="#">
                <i class="fab fa-instagram"></i>
            </a>
            <a class="pl-6" href="#">
                <i class="fab fa-twitter"></i>
            </a>
            <a class="pl-6" href="#">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>

    </div>

</nav>

