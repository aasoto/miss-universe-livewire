<div x-data="{ open: false, movil: false, cuenta_movil: false }">
    <nav class="fixed top-0 md:top-5 mx-0 mt-0 md:mx-8 lg:mx-11 xl:mx-14 2xl:mx-16 w-full h-16 md:w-11/12 py-0 sm:py-3 md:py-5 md:rounded-md bg-white/70 dark:bg-gray-800 backdrop-blur-lg shadow-sm shadow-gray-700">
        <div class="flex w-full justify-between">
            <div class="justify-start w-1/2 sm:w-1/6">
                <img class="scale-100 md:scale-90 ml-8 mt-4 md:mt-1.5 lg:mt-1 xl:mt-0" src="https://upload.wikimedia.org/wikipedia/commons/9/95/Tailwind_CSS_logo.svg" alt="">
            </div>
            <div class="flex justify-end">
                <div class="invisible md:visible w-1 md:w-full">
                    <a href="#" class="text-sm font-semibold text-gray-800 mx-3">Candidatas</a>
                    <a href="#" class="text-sm font-semibold text-gray-800 mx-3">Comités nacionales</a>
                    <a href="#" class="text-sm font-semibold text-gray-800 mx-3">Noticias</a>
                    <button @click="open = ! open" class="text-sm font-semibold text-gray-800 mx-3">Cuenta <i class="fa-solid fa-angle-down"></i></span></button>
                </div>
                <div class="visible md:invisible">
                    <button @click="movil = ! movil" class="mt-6 sm:mt-3 mr-4 md:mt-0 md:mr-0 text-sm text-slate-500">
                        <i class=" text-gray-800 pr-2 fa-solid fa-bars"></i>
                </button>
                </div>
            </div>
        </div>
    </nav>
    <div x-show="open" @click.outside="open = false" class="fixed top-24 right-8 lg:right-10 xl:right-14 2xl:right-16 md:rounded-md bg-white/70 dark:bg-gray-800 backdrop-blur-lg shadow-sm shadow-gray-700">
        <div class="mx-2 my-2 rounded-md hover:bg-gray-300">
            <a href="{{ route('login') }}" class="text-sm text-gray-800 dark:text-white font-semibold px-3 py-3">Iniciar sesión</a>
        </div>
        <div class="mx-2 my-2 rounded-md hover:bg-gray-300">
            <a href="{{ route('register') }}" class="text-sm text-gray-800 dark:text-white font-semibold px-3 py-3">Crear cuenta</a>
        </div>
    </div>
    <div x-show="movil" @click.outside="movil = false" class="fixed top-20 ml-4 sm:ml-0 sm:right-6 w-11/12 md:rounded-md bg-white/70 dark:bg-gray-800 backdrop-blur-lg shadow-sm shadow-gray-700">
        <div class="mx-2 my-2 rounded-md hover:bg-gray-300">
            <a href="#" class="text-sm text-gray-800 dark:text-white font-semibold px-3 py-3">Candidatas</a>
        </div>
        <div class="mx-2 my-2 rounded-md hover:bg-gray-300">
            <a href="#" class="text-sm text-gray-800 dark:text-white font-semibold px-3 py-3">Comités nacionales</a>
        </div>
        <div class="mx-2 my-2 rounded-md hover:bg-gray-300">
            <a href="#" class="text-sm text-gray-800 dark:text-white font-semibold px-3 py-3">Noticias</a>
        </div>
        <div class="mx-2 my-1 rounded-md hover:bg-gray-300">
            <button @click="cuenta_movil = ! cuenta_movil" class="text-sm text-gray-800 dark:text-white font-semibold px-3 py-3">Cuenta <i class="fa-solid fa-angle-down"></i></button>
        </div>
        <div x-show="cuenta_movil" @click.outside="cuenta_movil = false">
            <hr class="border-2 border-rose-400 mx-2">
            <div class="mx-2 my-2 rounded-md hover:bg-gray-300">
                <a href="{{ route('login') }}" class="text-sm text-gray-800 dark:text-white font-semibold px-3 py-3">Iniciar sesión</a>
            </div>
            <div class="mx-2 my-2 rounded-md hover:bg-gray-300">
                <a href="{{ route('register') }}" class="text-sm text-gray-800 dark:text-white font-semibold px-3 py-3">Crear cuenta</a>
            </div>
        </div>
    </div>
</div>
