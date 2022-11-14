<!-- inicio -->
<div class="w-auto ml-3 sm:ml-5 mr-3 sm:mr-5 mb-5 bg-white dark:bg-slate-800 shadow-lg rounded-lg">
    <div class="h-2 w-full rounded-t-lg bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600">
    </div>
    <div class="flex flex-row justify-between border-b border-gray-400">
        <div class="pl-5 pt-5 pb-3">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white">{{ __('Home') }}</h3>
        </div>
        <div class="pr-5 pt-5 pb-3">
            <a class="text-base font-normal hover:text-rose-700 dark:hover:text-rose-400 hover:underline mr-2"
                href="#">{{ __('Dashboard') }}</a>/<a
                class="text-base font-normal text-rose-700 dark:text-rose-400 hover:text-rose-900 dark:hover:text-rose-600 hover:underline ml-2"
                href="#">{{ __('Home') }}</a>
        </div>
    </div>
    <div class="mx-5 my-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7 pb-5">
            <div class="col-span-1">
                <div class="relative group w-full h-60 rounded-lg cursor-pointer">
                    <!-- <div class="-z-10 translate-x-3 translate-y-3 w-full h-full bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 blur-lg rounded-lg"></div> -->
                    <div
                        class="absolute top-0 w-full h-full bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 rounded-lg">
                    </div>
                    <h1 class="absolute top-6 left-6 text-white text-4xl font-bold animate-appear-x">
                        {{ __('Candidates') }}
                    </h1>
                    <span
                        class="absolute bottom-5 right-5 text-white/70 group-hover:text-white group-hover:scale-125 text-8xl sm:text-9xl transition">
                        <i class="fa-solid fa-person-dress"></i>
                    </span>
                    <div class="absolute bottom-5 left-5 flex flex-row">
                        <img class="hidden group-hover:block group-hover:animate-appear-x border-2 border-white rounded-full w-24 h-24 object-cover object-center"
                            src="../storage/app/public/images/dashboard/home-card/candidatas/image-1.jpg" alt="">
                        <img class="hidden group-hover:block group-hover:animate-appear-x-1 border-2 border-white rounded-full z-10 -translate-x-14 w-24 h-24 object-cover object-center"
                            src="../storage/app/public/images/dashboard/home-card/candidatas/image-2.jpg" alt="">
                        <img class="hidden group-hover:block group-hover:animate-appear-x-2 border-2 border-white rounded-full z-20 -translate-x-28 w-24 h-24 object-cover object-center"
                            src="../storage/app/public/images/dashboard/home-card/candidatas/image-3.jpg" alt="">
                        <img class="hidden group-hover:block group-hover:animate-appear-x-3 border-2 border-white rounded-full z-30 -translate-x-[168px] w-24 h-24 object-cover object-center"
                            src="../storage/app/public/images/dashboard/home-card/candidatas/image-4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="relative group w-full h-60 rounded-lg cursor-pointer">
                    <!-- <div class="-z-10 translate-x-3 translate-y-3 w-full h-full bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 blur-lg rounded-lg"></div> -->
                    <div
                        class="absolute top-0 w-full h-full bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 rounded-lg">
                    </div>
                    <h1 class="absolute top-6 left-6 text-white text-4xl font-bold animate-appear-x">
                        {{__('National committees')}}
                    </h1>
                    <span
                        class="absolute bottom-5 right-5 text-white/70 group-hover:text-white group-hover:scale-125 text-8xl sm:text-9xl transition">
                        <i class="fa-solid fa-flag"></i>
                    </span>
                    <div class="absolute bottom-5 left-5 flex flex-row">
                        <img class="hidden group-hover:block group-hover:animate-appear-x border-2 border-white rounded-full w-24 h-24 object-cover object-center"
                            src="../storage/app/public/images/dashboard/home-card/comites nacionales/image-1.jpg" alt="">
                        <img class="hidden group-hover:block group-hover:animate-appear-x-1 border-2 border-white rounded-full z-10 -translate-x-14 w-24 h-24 object-cover object-center"
                            src="../storage/app/public/images/dashboard/home-card/comites nacionales/image-2.jpg" alt="">
                        <img class="hidden group-hover:block group-hover:animate-appear-x-2 border-2 border-white rounded-full z-20 -translate-x-28 w-24 h-24 object-cover object-center"
                            src="../storage/app/public/images/dashboard/home-card/comites nacionales/image-3.jpg" alt="">
                        <img class="hidden group-hover:block group-hover:animate-appear-x-3 border-2 border-white rounded-full z-30 -translate-x-[168px] w-24 h-24 object-cover object-center"
                            src="../storage/app/public/images/dashboard/home-card/comites nacionales/image-4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="relative group w-full h-60 rounded-lg cursor-pointer">
                    <!-- <div class="-z-10 translate-x-3 translate-y-3 w-full h-full bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 blur-lg rounded-lg"></div> -->
                    <div
                        class="absolute top-0 w-full h-full bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 rounded-lg">
                    </div>
                    <h1 class="absolute top-6 left-6 text-white text-4xl font-bold animate-appear-x">
                        {{__('News')}}
                    </h1>
                    <span
                        class="absolute bottom-5 right-5 text-white/70 group-hover:text-white group-hover:scale-125 text-8xl sm:text-9xl transition">
                        <i class="fa-solid fa-newspaper group-hover:animate-tik-tok"></i>
                    </span>
                </div>
            </div>
            <div class="col-span-1">
                <div class="relative group w-full h-60 rounded-lg cursor-pointer">
                    <div
                        class="absolute top-0 w-full h-full bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 rounded-lg">
                    </div>
                    <h1 class="absolute top-6 left-6 text-white text-4xl font-bold animate-appear-x">
                        {{__('Carousel')}}
                    </h1>
                    <span
                        class="absolute bottom-5 right-5 text-white/70 group-hover:text-white group-hover:scale-125 text-8xl sm:text-9xl transition">
                        <i class="fa-solid fa-images group-hover:animate-tik-tok"></i>
                    </span>
                </div>
            </div>
            <div class="col-span-1">
                <div class="container relative w-full h-60">
                    <video autoplay loop muted class="w-full h-60 -mb-[180px] rounded-lg object-cover object-top z-10">
                        <source src="../storage/app/public/images/dashboard/home-card/videos/video-1.mp4" type="video/mp4">
                    </video>
                    <!-- <div class="-z-20 translate-x-3 translate-y-3 w-full h-full bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 blur-lg rounded-lg"></div> -->
                    <div class="group w-full h-60 rounded-lg cursor-pointer">
                        <div
                            class="absolute top-0 w-full h-full bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 group-hover:to-rose-900/40 dark:to-rose-600 group-hover:dark:to-rose-600/40 rounded-lg">
                        </div>
                        <h1 class="absolute top-6 left-6 text-white text-4xl font-bold animate-appear-x">
                            {{__('Editions')}}
                        </h1>
                        <span
                            class="absolute bottom-5 right-5 text-white/70 block group-hover:hidden text-8xl sm:text-9xl transition">
                            <i class="fa-solid fa-file-lines"></i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="relative w-full h-60 rounded-lg">
                    <!-- <div class="-z-10 translate-x-3 translate-y-3 w-full h-full bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 blur-lg rounded-lg"></div> -->
                    <div
                        class="absolute top-0 w-full h-full bg-gradient-to-r from-pink-600 dark:from-pink-300 to-rose-900 dark:to-rose-600 rounded-lg">
                    </div>
                    <!-- <h1 class="absolute top-0">dsfregtr</h1> -->
                </div>
            </div>
        </div>
    </div>
</div>
