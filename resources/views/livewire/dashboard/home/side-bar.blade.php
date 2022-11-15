<aside
    class="container ml-7 sm:ml-5 my-5 max-h-screen w-80 rounded-lg bg-white dark:bg-slate-800 peer-checked:shadow-lg transition fixed inset-0 translate-x-[-107%] peer-checked:translate-x-0">
    <div class="h-2 w-full rounded-t-lg bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600">
    </div>
    <div class="relative border-b border-gray-400">
        <a class="" href="/">
            <img class="block dark:hidden h-20 my-5 mx-auto"
                src="../storage/app/public/images/dashboard/side-bar-logo/logo-BPproject2x1-fuente-negro.svg"
                alt="">
            <img class="hidden dark:block h-20 my-5 mx-auto"
                src="../storage/app/public/images/dashboard/side-bar-logo/logo-BPproject2x1-fuente-blanco.svg"
                alt="">
        </a>
        <label for="hamburger"
            class="absolute top-0 right-5 block sm:hidden peer-checked:hamburger cursor-pointer transition rounded">
            <div class="text-gray-600 dark:text-white transition">
                <i class="scale-150 fa-solid fa-times"></i>
            </div>
        </label>
    </div>
    <nav class="container h-5/6 my-5 px-5 overflow-auto">
        <ul class="flex flex-col gap-3 w-full">
            <li class="relative group flex flex-col w-full transition duration-200">
                <div class="flex flex-row">
                    <div
                        class="-z-10 w-full h-10 group-hover:bg-rose-100 dark:group-hover:bg-rose-900/30 group-hover:blur-lg">
                    </div>
                    <a href="#"
                        class="absolute top-0 z-10 bg-transparent group-hover:scale-105 flex flex-row items-center w-full">
                        <div class="w-1/4">
                            <div
                                class="mx-2 px-2 py-2 text-white text-center bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 rounded-lg">
                                <i class="fa-solid fa-person-dress"></i>
                            </div>
                        </div>
                        <div
                            class="w-3/4 flex flex-row justify-between mx-5 text-gray-800 dark:text-white text-base font-medium">
                            <div class="basis-3/4">
                                <p class="">{{__('Candidates')}}</p>
                            </div>
                            <div class="basis-1/4 text-right">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <ul class="hidden group-hover:block my-5 p-4 rounded-lg shadow transition duration-200">
                    <li class="">
                        <a href="{{ route('d-candidate-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-cyan-400 dark:from-cyan-200 to-blue-900 dark:to-blue-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-list"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('List')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-candidate-create') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Add')}}
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="relative group flex flex-col w-full mb-2 transition duration-200">
                <div class="flex flex-row">
                    <div
                        class="-z-10 w-full h-10 group-hover:bg-rose-100 dark:group-hover:bg-rose-900/30 group-hover:blur-lg">
                    </div>
                    <a href="#"
                        class="absolute top-0 z-10 bg-transparent group-hover:scale-105 flex flex-row items-center w-full">
                        <div class="w-1/4">
                            <div
                                class="mx-2 px-2 py-2 text-white text-center bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 rounded-lg">
                                <i class="fa-solid fa-flag"></i>
                            </div>
                        </div>
                        <div
                            class="w-3/4 flex flex-row justify-between mx-5 text-gray-800 dark:text-white text-base font-medium">
                            <div class="basis-3/4">
                                <p class="">{{__('National committees')}}</p>
                            </div>
                            <div class="basis-1/4 flex justify-end items-center">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <ul class="hidden group-hover:block my-5 p-4 rounded-lg shadow transition duration-200">
                    <li class="">
                        <a href="{{ route('d-nationalcommittee-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-cyan-400 dark:from-cyan-200 to-blue-900 dark:to-blue-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-list"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('List')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-nationalcommittee-create') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Add')}}
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="relative group flex flex-col w-full transition duration-200">
                <div class="flex flex-row">
                    <div
                        class="-z-10 w-full h-10 group-hover:bg-rose-100 dark:group-hover:bg-rose-900/30 group-hover:blur-lg">
                    </div>
                    <a href="#"
                        class="absolute top-0 z-10 bg-transparent group-hover:scale-105 flex flex-row items-center w-full">
                        <div class="w-1/4">
                            <div
                                class="mx-2 px-2 py-2 text-white text-center bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 rounded-lg">
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                        </div>
                        <div
                            class="w-3/4 flex flex-row justify-between mx-5 text-gray-800 dark:text-white text-base font-medium">
                            <div class="basis-3/4">
                                <p class="#">{{__('News')}}</p>
                            </div>
                            <div class="basis-1/4 text-right">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <ul class="hidden group-hover:block my-5 p-4 rounded-lg shadow transition duration-200">
                    <li class="">
                        <a href={{ route('d-news-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-cyan-400 dark:from-cyan-200 to-blue-900 dark:to-blue-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-list"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('List')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-news-create') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Add')}}
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="relative group flex flex-col w-full transition duration-200">
                <div class="flex flex-row">
                    <div
                        class="-z-10 w-full h-10 group-hover:bg-rose-100 dark:group-hover:bg-rose-900/30 group-hover:blur-lg">
                    </div>
                    <a href="#"
                        class="absolute top-0 z-10 bg-transparent group-hover:scale-105 flex flex-row items-center w-full">
                        <div class="w-1/4">
                            <div
                                class="mx-2 px-2 py-2 text-white text-center bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 rounded-lg">
                                <i class="fa-solid fa-images"></i>
                            </div>
                        </div>
                        <div
                            class="w-3/4 flex flex-row justify-between mx-5 text-gray-800 dark:text-white text-base font-medium">
                            <div class="basis-3/4">
                                <p class="#">{{__('Carousel')}}</p>
                            </div>
                            <div class="basis-1/4 text-right">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <ul class="hidden group-hover:block my-5 p-4 rounded-lg shadow transition duration-200">
                    <li class="">
                        <a href="{{ route('d-carousel-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-cyan-400 dark:from-cyan-200 to-blue-900 dark:to-blue-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-list"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('List')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-carousel-create') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Add')}}
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="relative group flex flex-col w-full transition duration-200">
                <div class="flex flex-row">
                    <div
                        class="-z-10 w-full h-10 group-hover:bg-rose-100 dark:group-hover:bg-rose-900/30 group-hover:blur-lg">
                    </div>
                    <a href="#"
                        class="absolute top-0 z-10 bg-transparent group-hover:scale-105 flex flex-row items-center w-full">
                        <div class="w-1/4">
                            <div
                                class="mx-2 px-2 py-2 text-white text-center bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 rounded-lg">
                                <i class="fa-solid fa-file-lines"></i>
                            </div>
                        </div>
                        <div
                            class="w-3/4 flex flex-row justify-between mx-5 text-gray-800 dark:text-white text-base font-medium">
                            <div class="basis-3/4">
                                <p class="#">{{__('Editions')}}</p>
                            </div>
                            <div class="basis-1/4 text-right">
                                <i class="fa-solid fa-angle-down"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <ul class="container overflow-auto hidden group-hover:block h-40 my-5 p-4 rounded-lg shadow transition duration-200">
                    <li class="">
                        <a href="{{ route('d-editions-broadcaster-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-cyan-400 dark:from-cyan-200 to-blue-900 dark:to-blue-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-list"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Broadcasters')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-city-venue-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('City venues')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-place-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Places')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-presenter-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Presenters')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-miss-universe-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Miss Universe')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-entertainment-show-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Entraiment shows')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-debut-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Debuts')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-withdrawal-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Withdrawals')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-return-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Returns')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-contestant-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Contestants per edition')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-winner-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Winners')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-first-runner-up-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('First runner ups')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-second-runner-up-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Second runner ups')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-third-runner-up-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Third runner ups')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-fourth-runner-up-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Fourth runner ups')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-runners-ups-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Runners ups')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-semifinalists-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Semifinalists')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-quarterfinalists-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Quarterfinalists')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-eighterfinalists-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Eighterfinalists')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-best-national-costume-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Best National Costumes')}}
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="mt-2">
                        <a href="{{ route('d-editions-miss-congeniality-index') }}" class="py-2">
                            <div class="flex flex-row gap-3 items-center">
                                <div
                                    class="rounded-lg bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 px-4 py-2 text-white">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <p class="text-gray-800 dark:text-white text-base font-medium">
                                    {{__('Special awards')}}
                                </p>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>
