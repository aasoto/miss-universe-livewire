<nav class="z-20 fixed top-0 md:top-4 2xl:top-7 w-full">
    <div
        class="flex flex-row justify-between items-center rounded-none md:rounded-md mx-0 md:mx-7 shadow dark:shadow-lg backdrop-blur-xl bg-white/50 dark:bg-slate-800/70 py-7 md:py-2">
        <div class="z-20 ml-7">
            <div class="block dark:hidden">
                <img class="w-[200px] md:w-auto h-[60px] md:h-[40px] -my-7 md:my-0"
                src="../storage/app/public/images/web/navbar/logo-BPproject-horizontal-fuente.svg" alt="">
            </div>
            <div class="hidden dark:block">
                <img class="w-[200px] md:w-auto h-[60px] md:h-[40px] -my-7 md:my-0"
                src="../storage/app/public/images/web/navbar/logo-BPproject-horizontal-fuente-blanco.svg" alt="">
            </div>
        </div>
        <!-- Botón responsive -->
        <input type="checkbox" name="hamburger" id="hamburger" class="peer hidden">
        <label for="hamburger"
            class="peer-checked:hamburger block z-20 cursor-pointer md:hidden transition mr-7 rounded">
            <div class="h-0.5 w-6 bg-gray-600 dark:bg-white transition"></div>
            <div class="mt-2 h-0.5 w-6 bg-gray-600 dark:bg-white transition"></div>
        </label>
        <div
            class="w-full mt-24 md:mt-0 rounded-md md:rounded-none shadow md:shadow-none shadow-gray-800 transition flex flex-col justify-between fixed inset-0 translate-x-[-100%] peer-checked:translate-x-0 md:w-auto md:static md:translate-x-0 md:flex-row">
            <div
                class="flex flex-col md:flex-row md:items-center px-6 md:px-0 md:pt-0 mr-0 md:mr-7 bg-white/80 md:bg-transparent dark:bg-slate-800 dark:md:bg-transparent">
                <div class="group">
                    <div
                        class="my-4 md:my-0 ml-0 md:ml-7 text-center text-base font-medium hover:scale-110 transition text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-white cursor-pointer px-[26px]">
                        <span>Ediciones</span><i class="fa-solid fa-chevron-down ml-2"></i>
                    </div>
                    <div class="md:absolute">
                        <div
                            class="hidden group-hover:block w-full shadow-none md:shadow dark:md:shadow-lg md:shadow-gray-800 dark:md:shadow-gray-400 backdrop-blur-none md:backdrop-blur-xl bg-transparent md:bg-white/70 dark:md:bg-slate-800 mt-1 md:mt-7 p-0 md:p-4 rounded-none md:rounded-md transition">
                            <ul class="text-center border-t-2 border-b-2 border-rose-600 dark:border-rose-300">
                                <a href="{{ route('miss-universe-edition', 'miss-universo-2014') }}">
                                    <li
                                        class="px-4 py-1 hover:scale-110 transition text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-white font-medium text-base whitespace-nowrap cursor-pointer">
                                        Miss Universo</li>
                                </a>
                                <li
                                    class="px-4 py-1 hover:scale-110 transition text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-white font-medium text-base whitespace-nowrap cursor-pointer">
                                    Miss Mundo</li>
                                <li
                                    class="px-4 py-1 hover:scale-110 transition text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-white font-medium text-base whitespace-nowrap cursor-pointer">
                                    Miss Grand International</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <a href="pages/list_news.html"
                    class="my-4 md:my-0 ml-0 md:ml-7 text-center text-base font-medium hover:scale-110 transition text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-white">Noticias</a>
                <div class="group">
                    <div
                        class="my-4 md:my-0 ml-0 md:ml-7 text-center text-base font-medium hover:scale-110 transition text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-white cursor-pointer px-[26px]">
                        <span>Cuenta</span><i class="fa-solid fa-chevron-down ml-2"></i>
                    </div>
                    <div class="md:absolute">
                        <div
                            class="hidden group-hover:block w-full shadow-none md:shadow dark:md:shadow-lg md:shadow-gray-800 dark:md:shadow-gray-400 backdrop-blur-none md:backdrop-blur-xl bg-transparent md:bg-white/70 dark:md:bg-slate-800 mt-1 md:mt-7 px-0 md:px-7 py-0 md:py-4 rounded-none md:rounded-md transition">
                            <ul class="text-center border-t-2 border-b-2 border-rose-600 dark:border-rose-300">
                                <a href="{{ route('login') }}">
                                    <li
                                        class="px-4 py-1 hover:scale-110 transition text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-white font-medium text-base whitespace-nowrap cursor-pointer">
                                        Iniciar sesión</li>
                                </a>
                                <a href="{{ route('register') }}">
                                    <li class="px-4 py-1 hover:scale-110 transition text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-white font-medium text-base whitespace-nowrap cursor-pointer">
                                        Crear cuenta
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-center items-center">
                    <label for="dark_check" class="inline-flex relative items-center cursor-pointer">
                        <input @click="change_mode()" type="checkbox" :value="dark_mode" id="dark_check"
                            class="sr-only peer">
                        <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none dark:peer-focus:ring-rose-700 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600 transition duration-200">
                        </div>
                        <div x-show="!dark_mode" x-transition>
                            <span class="ml-3 text-base font-medium hover:scale-110 transition text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-white">
                                <i class="fa-regular fa-sun"></i></span>
                        </div>
                        <div x-show="dark_mode" x-transition>
                            <span class="ml-3 text-base font-medium hover:scale-110 transition text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-white">
                                <i class="fa-solid fa-moon"></i></span>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>
</nav>
{{-- <div x-data="{ open: false, movil: false, cuenta_movil: false }">
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
</div> --}}
