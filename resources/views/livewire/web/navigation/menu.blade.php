<div class="container sticky top-0 z-sticky">
    <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 flex-0">
            <nav
                class="sm:mx-7 md:mx-12 w-full sm:w-11/12 md:w-11/12 py-0 md:py-5 lg:py-5 sm:rounded-md bg-white/70 dark:bg-gray-800 backdrop-blur-sm shadow-sm shadow-gray-700 fixed top-0 sm:top-5">
                <div class="w-full flex justify-between">
                    <div class="justify-start ml-4">
                        <div class="mt-5 sm:mt-4 md:mt-0 lg:mt-0 content-center">
                            <img class="h-4 md:h-7 lg:h-7 w-48 dark:bg-gray-300"
                                src="https://upload.wikimedia.org/wikipedia/commons/9/95/Tailwind_CSS_logo.svg"
                                alt="">
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <div class="w-1 sm:w-1 md:w-full lg:w-full invisible sm:invisible md:visible lg:visible flex gap-5 mr-4">
                            <a class="text-sm font-semibold text-gray-800 mt-1 pr-2" href="#">Candidatas</a>
                            <a class="text-sm font-semibold text-gray-800 mt-1 pr-2" href="#">Comités nacionales</a>
                            <a class="text-sm font-semibold text-gray-800 mt-1 pr-2" href="#">Noticias</a>
                            <li class="relative flex items-center pr-2">
                                <p class="hidden transform-dropdown-show"></p>
                                <a href="javascript:;"
                                    class="block p-0 transition-all text-sm ease-nav-brand text-slate-500"
                                    dropdown-trigger aria-expanded="false">
                                    <span class="text-sm font-semibold text-gray-800">Cuenta <i class="fa-solid fa-angle-down"></i></span>
                                </a>
                                <ul dropdown-menu
                                    class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:sm:right-7.5 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white/90 dark:bg-gray-800 shadow-sm shadow-gray-700 bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all sm:-mr-6 lg:absolute lg:top-12 lg:right-6 lg:left-auto lg:mt-4 lg:block lg:cursor-pointer">
                                    <!-- add show class on dropdown open js -->
                                    <li class="relative mb-2">
                                        <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                                            href="{{ route('login') }}">
                                            <div class="flex py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-1 font-semibold leading-normal text-sm">Iniciar sesión</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="relative mb-2">
                                        <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700"
                                            href="{{ route('register') }}">
                                            <div class="flex py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-1 font-semibold leading-normal text-sm">Crear cuenta</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                        <div class="visible sm:visible md:invisible lg:invisible flex mt-4 sm:mt-3 md:mt-2 mr-4">
                            <li class="relative flex items-center pr-2">
                                <p class="hidden transform-dropdown-show"></p>
                                <a href="javascript:;"
                                    class="block p-0 transition-all text-sm ease-nav-brand text-slate-500"
                                    dropdown-trigger aria-expanded="false">
                                    <i class=" text-gray-800 mt-1 pr-2 fa-solid fa-bars"></i>
                                </a>
                                <ul dropdown-menu
                                    class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:sm:right-7.5 before:text-5.5 pointer-events-none absolute right-2 top-16 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white/90 dark:bg-gray-800 shadow-sm shadow-gray-700 bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all sm:-mr-6 sm:absolute sm:top-12 sm:right-6 sm:left-auto sm:mt-4 sm:block sm:cursor-pointer md:absolute md:top-12 md:right-6 md:left-auto md:mt-4 md:block md:cursor-pointer">
                                    <!-- add show class on dropdown open js -->
                                    <li class="relative mb-2">
                                        <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                                            href="#">
                                            <div class="flex py-1">
                                                <div class="inline-flex items-center justify-center my-auto mr-4 text-white transition-all duration-200 ease-nav-brand text-sm bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">

                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-1 font-semibold leading-normal text-sm">Candidatas</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="relative mb-2">
                                        <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                                            href="#">
                                            <div class="flex py-1">
                                                <div class="inline-flex items-center justify-center my-auto mr-4 text-white transition-all duration-200 ease-nav-brand text-sm bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">

                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-1 font-semibold leading-normal text-sm">Comités nacionales</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="relative mb-2">
                                        <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                                            href="#">
                                            <div class="flex py-1">
                                                <div class="inline-flex items-center justify-center my-auto mr-4 text-white transition-all duration-200 ease-nav-brand text-sm bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">

                                                </div>
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-1 font-semibold leading-normal text-sm">Noticias</h6>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="relative mb-2">
                                        <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                                            href="#">
                                            <div class="flex py-1">
                                                <div class="inline-flex items-center justify-center my-auto mr-4 text-white transition-all duration-200 ease-nav-brand text-sm bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">

                                                </div>
                                                <div class="flex flex-col">
                                                    <li class="relative flex">
                                                        <p class="hidden transform-dropdown-show"></p>
                                                        <a href="javascript:;"
                                                            class="block p-0 transition-all text-sm ease-nav-brand text-slate-500"
                                                            dropdown-trigger aria-expanded="false">
                                                            <span class="mb-1 font-semibold leading-normal text-sm">Cuenta <i class="fa-solid fa-angle-down"></i></span>
                                                        </a>
                                                        <ul dropdown-menu
                                                            class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:sm:right-7.5 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white/90 dark:bg-gray-800 shadow-sm shadow-gray-700 bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all sm:-mr-6 lg:absolute lg:top-12 lg:right-6 lg:left-auto lg:mt-4 lg:block lg:cursor-pointer">
                                                            <!-- add show class on dropdown open js -->
                                                            <li class="relative mb-2">
                                                                <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors"
                                                                    href="javascript:;">
                                                                    <div class="flex py-1">
                                                                        <div class="flex flex-col justify-center">
                                                                            <h6 class="mb-1 font-semibold leading-normal text-sm">Iniciar sesión</h6>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="relative mb-2">
                                                                <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700"
                                                                    href="javascript:;">
                                                                    <div class="flex py-1">
                                                                        <div class="flex flex-col justify-center">
                                                                            <h6 class="mb-1 font-semibold leading-normal text-sm">Crear cuenta</h6>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
