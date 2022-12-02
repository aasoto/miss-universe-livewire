<div x-data="data()" x-init="show_page_info()">
    <!-- Background -->
    <section class="mt-16 sm:mt-[86px] md:mt-0">
        <div class="relative">
            <img class="-z-10 w-full max-h-[500px] object-cover object-center"
                :src="`../../storage/app/public/images/editions/miss-universe/background/${page.edition_information.background}`"
                alt="">
            <div class="absolute top-0 left-0 w-full h-full dark:bg-slate-900/70"></div>
        </div>
    </section>
    <!-- End of Background -->
    <!-- Cuerpo de la página -->
    <section
        class="mt-0 md:-mt-8 lg:-mt-14 mx-0 md:mx-7 backdrop-blur-none md:backdrop-blur-xl bg-white/50 dark:bg-slate-800/50 rounded-none md:rounded-md shadow-none md:shadow-lg md:shadow-gray-400 dark:md:shadow-black py-32">
        <!-- Infomración general y resultados -->
        <section>
            <div class="flex flex-col md:flex-row">
                <!-- Resumen -->
                <div class="basis-2/3 border-r-0 md:border-r border-gray-400">
                    <div class="container mx-auto -mt-24 md:-mt-20 py-5 md:py-10 w-10/12 md:w-8/12">
                        <h1 class="text-2xl md:text-3xl mb-4 font-semibold text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600"
                            x-text="page.edition_information.name">
                        </h1>
                        <h2 class="text-xl md:text-2xl mb-4 font-medium text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600"
                            x-text="page.edition_information.official_name">
                        </h2>
                    </div>
                    <div class="mx-1 iPhoneSE:mx-5 sm:mx-8 info-texto" x-html="page.edition_information.description">
                    </div>
                    <h2
                        class="text-xl md:text-2xl my-4 font-medium text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                        Resultados
                    </h2>
                    <div class="flex flex-col justify-center items-center my-8">
                        <div class="relative w-60 iPhoneSE:w-72 h-60 iPhoneSE:h-72">
                            <div
                                class="rounded-full w-full h-full p-2 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                <img class="w-full h-full object-cover object-top rounded-full"
                                    :src="`../../storage/app/public/images/candidates/official_pictures/${page.winner.candidate.official_picture}`"
                                    alt="">
                            </div>
                            <span class="absolute bottom-7 left-7">
                                <i
                                    :class="`fi fi-${page.winner.candidate.country.iso3166_1_alpha2} fis rounded-full scale-[5]`"></i>
                            </span>
                        </div>
                        <p
                            class="text-base font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700">
                            Ganadora
                        </p>
                        <template x-if="page.winner.candidate.second_name">
                            <template x-if="page.winner.candidate.second_last_name">
                                <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                    x-text="page.winner.candidate.first_name+' '+page.winner.candidate.second_name+' '+page.winner.candidate.first_last_name+' '+page.winner.candidate.second_last_name">
                                </p>
                            </template>
                        </template>
                        <template x-if="!page.winner.candidate.second_name">
                            <template x-if="!page.winner.candidate.second_last_name">
                                <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                    x-text="page.winner.candidate.first_name+' '+page.winner.candidate.first_last_name">
                                </p>
                            </template>
                        </template>
                        <template x-if="page.winner.candidate.second_name">
                            <template x-if="!page.winner.candidate.second_last_name">
                                <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                    x-text="page.winner.candidate.first_name+' '+page.winner.candidate.second_name+' '+page.winner.candidate.first_last_name">
                                </p>
                            </template>
                        </template>
                        <template x-if="!page.winner.candidate.second_name">
                            <template x-if="page.winner.candidate.second_last_name">
                                <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                    x-text="page.winner.candidate.first_name+' '+page.winner.candidate.first_last_name+' '+page.winner.candidate.second_last_name">
                                </p>
                            </template>
                        </template>
                        <p class="text-xl font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                            x-text="page.winner.candidate.country.name">
                        </p>
                    </div>
                    <div class="border-b border-gray-400 mx-10"></div>
                    <h2
                        class="text-lg md:text-xl my-4 font-medium text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                        Finalistas
                    </h2>
                    <div class="flex flex-col xl:flex-row gap-2 justify-center items-center my-8">
                        <div class="flex flex-row gap-2 my-3">
                            <div class="basis-1/2 flex flex-col justify-center items-center">
                                <div class="relative w-32 iPhoneSE:w-40 sm:w-48 h-32 iPhoneSE:h-40 sm:h-48">
                                    <div
                                        class="rounded-full w-full h-full p-2 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                        <img class="w-full h-full object-cover object-top rounded-full"
                                            :src="`../../storage/app/public/images/candidates/official_pictures/${page.first_runner_up.candidate.official_picture}`"
                                            alt="">
                                    </div>
                                    <span class="absolute bottom-5 left-5">
                                        <i
                                            :class="`fi fi-${page.first_runner_up.candidate.country.iso3166_1_alpha2} fis rounded-full scale-[3]`"></i>
                                    </span>
                                </div>
                                <p
                                    class="text-base font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Primera finalista
                                </p>
                                <template x-if="page.first_runner_up.candidate.second_name">
                                    <template x-if="page.first_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.first_runner_up.candidate.first_name+' '+page.first_runner_up.candidate.second_name+' '+page.first_runner_up.candidate.first_last_name+' '+page.first_runner_up.candidate.second_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="!page.first_runner_up.candidate.second_name">
                                    <template x-if="!page.first_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.first_runner_up.candidate.first_name+' '+page.first_runner_up.candidate.first_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="page.first_runner_up.candidate.second_name">
                                    <template x-if="!page.first_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.first_runner_up.candidate.first_name+' '+page.first_runner_up.candidate.second_name+' '+page.first_runner_up.candidate.first_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="!page.first_runner_up.candidate.second_name">
                                    <template x-if="page.first_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.first_runner_up.candidate.first_name+' '+page.first_runner_up.candidate.first_last_name+' '+page.first_runner_up.candidate.second_last_name">
                                        </p>
                                    </template>
                                </template>
                                <p class="text-xl font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                    x-text="page.first_runner_up.candidate.country.name">
                                </p>
                            </div>
                            <div class="basis-1/2 flex flex-col justify-center items-center">
                                <div class="relative w-32 iPhoneSE:w-40 sm:w-48 h-32 iPhoneSE:h-40 sm:h-48">
                                    <div
                                        class="rounded-full w-full h-full p-2 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                        <img class="w-full h-full object-cover object-top rounded-full"
                                            :src="`../../storage/app/public/images/candidates/official_pictures/${page.second_runner_up.candidate.official_picture}`"
                                            alt="">
                                    </div>
                                    <span class="absolute bottom-5 left-5">
                                        <i
                                            :class="`fi fi-${page.second_runner_up.candidate.country.iso3166_1_alpha2} fis rounded-full scale-[3]`"></i>
                                    </span>
                                </div>
                                <p
                                    class="text-base font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Segunda finalista
                                </p>
                                <template x-if="page.second_runner_up.candidate.second_name">
                                    <template x-if="page.second_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.second_runner_up.candidate.first_name+' '+page.second_runner_up.candidate.second_name+' '+page.second_runner_up.candidate.first_last_name+' '+page.second_runner_up.candidate.second_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="!page.second_runner_up.candidate.second_name">
                                    <template x-if="!page.second_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.second_runner_up.candidate.first_name+' '+page.second_runner_up.candidate.first_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="page.second_runner_up.candidate.second_name">
                                    <template x-if="!page.second_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.second_runner_up.candidate.first_name+' '+page.second_runner_up.candidate.second_name+' '+page.second_runner_up.candidate.first_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="!page.second_runner_up.candidate.second_name">
                                    <template x-if="page.second_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.second_runner_up.candidate.first_name+' '+page.second_runner_up.candidate.first_last_name+' '+page.second_runner_up.candidate.second_last_name">
                                        </p>
                                    </template>
                                </template>
                                <p class="text-xl font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                    x-text="page.second_runner_up.candidate.country.name"></p>
                            </div>
                        </div>
                        <div class="flex flex-row gap-2 my-3">
                            <div class="basis-1/2 flex flex-col justify-center items-center">
                                <div class="relative w-32 iPhoneSE:w-40 sm:w-48 h-32 iPhoneSE:h-40 sm:h-48">
                                    <div
                                        class="rounded-full w-full h-full p-2 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                        <img class="w-full h-full object-cover object-top rounded-full"
                                            :src="`../../storage/app/public/images/candidates/official_pictures/${page.third_runner_up.candidate.official_picture}`"
                                            alt="">
                                    </div>
                                    <span class="absolute bottom-5 left-5">
                                        <i
                                            :class="`fi fi-${page.third_runner_up.candidate.country.iso3166_1_alpha2} fis rounded-full scale-[3]`"></i>
                                    </span>
                                </div>
                                <p
                                    class="text-base font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Tercera finalista
                                </p>
                                <template x-if="page.third_runner_up.candidate.second_name">
                                    <template x-if="page.third_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.third_runner_up.candidate.first_name+' '+page.third_runner_up.candidate.second_name+' '+page.third_runner_up.candidate.first_last_name+' '+page.third_runner_up.candidate.second_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="!page.third_runner_up.candidate.second_name">
                                    <template x-if="!page.third_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.third_runner_up.candidate.first_name+' '+page.third_runner_up.candidate.first_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="page.third_runner_up.candidate.second_name">
                                    <template x-if="!page.third_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.third_runner_up.candidate.first_name+' '+page.third_runner_up.candidate.second_name+' '+page.third_runner_up.candidate.first_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="!page.third_runner_up.candidate.second_name">
                                    <template x-if="page.third_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.third_runner_up.candidate.first_name+' '+page.third_runner_up.candidate.first_last_name+' '+page.third_runner_up.candidate.second_last_name">
                                        </p>
                                    </template>
                                </template>
                                <p class="text-xl font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                    x-text="page.third_runner_up.candidate.country.name">
                                </p>
                            </div>
                            <div class="basis-1/2 flex flex-col justify-center items-center">
                                <div class="relative w-32 iPhoneSE:w-40 sm:w-48 h-32 iPhoneSE:h-40 sm:h-48">
                                    <div
                                        class="rounded-full w-full h-full p-2 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                        <img class="w-full h-full object-cover object-top rounded-full"
                                            :src="`../../storage/app/public/images/candidates/official_pictures/${page.fourth_runner_up.candidate.official_picture}`"
                                            alt="">
                                    </div>
                                    <span class="absolute bottom-5 left-5"><i
                                            :class="`fi fi-${page.fourth_runner_up.candidate.country.iso3166_1_alpha2} fis rounded-full scale-[3]`"></i></span>
                                </div>
                                <p
                                    class="text-base font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Cuarta finalista
                                </p>
                                <template x-if="page.fourth_runner_up.candidate.second_name">
                                    <template x-if="page.fourth_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.fourth_runner_up.candidate.first_name+' '+page.fourth_runner_up.candidate.second_name+' '+page.fourth_runner_up.candidate.first_last_name+' '+page.fourth_runner_up.candidate.second_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="!page.fourth_runner_up.candidate.second_name">
                                    <template x-if="!page.fourth_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.fourth_runner_up.candidate.first_name+' '+page.fourth_runner_up.candidate.first_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="page.fourth_runner_up.candidate.second_name">
                                    <template x-if="!page.fourth_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.fourth_runner_up.candidate.first_name+' '+page.fourth_runner_up.candidate.second_name+' '+page.fourth_runner_up.candidate.first_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="!page.fourth_runner_up.candidate.second_name">
                                    <template x-if="page.fourth_runner_up.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="page.fourth_runner_up.candidate.first_name+' '+page.fourth_runner_up.candidate.first_last_name+' '+page.fourth_runner_up.candidate.second_last_name">
                                        </p>
                                    </template>
                                </template>
                                <p class="text-xl font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                    x-text="page.fourth_runner_up.candidate.country.name"></p>
                            </div>
                        </div>
                    </div>
                    <div class="border-b border-gray-400 mx-10"></div>
                    <h2 class="text-lg md:text-xl my-4 font-medium text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                        Semifinalistas (Top 10)
                    </h2>
                    <div class="flex flex-row flex-wrap gap-10 justify-center items-center my-8">
                        <template x-for="semifinalist in page.semifinalists">
                            <div class="flex flex-col justify-center items-center">
                                <div class="relative w-32 iPhoneSE:w-40 sm:w-48 h-32 iPhoneSE:h-40 sm:h-48">
                                    <div class="rounded-full w-full h-full p-2 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                        <img class="w-full h-full object-cover object-top rounded-full"
                                            :src="`../../storage/app/public/images/candidates/official_pictures/${semifinalist.candidate.official_picture}`" alt="">
                                    </div>
                                    <span class="absolute bottom-5 left-5"><i
                                            :class="`fi fi-${semifinalist.candidate.country.iso3166_1_alpha2} fis rounded-full scale-[3]`"></i></span>
                                </div>
                                <p class="text-base font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Semifinalista
                                </p>
                                <template x-if="semifinalist.candidate.second_name">
                                    <template x-if="semifinalist.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="semifinalist.candidate.first_name+' '+semifinalist.candidate.second_name+' '+semifinalist.candidate.first_last_name+' '+semifinalist.candidate.second_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="!semifinalist.candidate.second_name">
                                    <template x-if="!semifinalist.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="semifinalist.candidate.first_name+' '+semifinalist.candidate.first_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="!semifinalist.candidate.second_name">
                                    <template x-if="semifinalist.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="semifinalist.candidate.first_name+' '+semifinalist.candidate.first_last_name+' '+semifinalist.candidate.second_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="semifinalist.candidate.second_name">
                                    <template x-if="!semifinalist.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="semifinalist.candidate.first_name+' '+semifinalist.candidate.second_name+' '+semifinalist.candidate.first_last_name">
                                        </p>
                                    </template>
                                </template>
                                <p class="text-xl font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                    x-text="semifinalist.candidate.country.name">
                                </p>
                            </div>
                        </template>
                    </div>
                    <div class="border-b border-gray-400 mx-10"></div>
                    <h2 class="text-lg md:text-xl my-4 font-medium text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                        Cuartofinalistas (Top 15)
                    </h2>
                    <div class="flex flex-row flex-wrap gap-10 justify-center items-center my-8">
                        <template x-for="quarterfinalist in page.quarterfinalists">
                            <div class="flex flex-col justify-center items-center">
                                <div class="relative w-32 iPhoneSE:w-40 sm:w-48 h-32 iPhoneSE:h-40 sm:h-48">
                                    <div class="rounded-full w-full h-full p-2 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                        <img class="w-full h-full object-cover object-top rounded-full"
                                            :src="`../../storage/app/public/images/candidates/official_pictures/${quarterfinalist.candidate.official_picture}`" alt="">
                                    </div>
                                    <span class="absolute bottom-5 left-5"><i
                                            :class="`fi fi-${quarterfinalist.candidate.country.iso3166_1_alpha2} fis rounded-full scale-[3]`"></i></span>
                                </div>
                                <p class="text-base font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Top 15
                                </p>
                                <template x-if="quarterfinalist.candidate.second_name">
                                    <template x-if="quarterfinalist.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="quarterfinalist.candidate.first_name+' '+quarterfinalist.candidate.second_name+' '+quarterfinalist.candidate.first_last_name+' '+semifinalist.candidate.second_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="!quarterfinalist.candidate.second_name">
                                    <template x-if="!quarterfinalist.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="quarterfinalist.candidate.first_name+' '+quarterfinalist.candidate.first_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="!quarterfinalist.candidate.second_name">
                                    <template x-if="quarterfinalist.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="quarterfinalist.candidate.first_name+' '+quarterfinalist.candidate.first_last_name+' '+quarterfinalist.candidate.second_last_name">
                                        </p>
                                    </template>
                                </template>
                                <template x-if="quarterfinalist.candidate.second_name">
                                    <template x-if="!quarterfinalist.candidate.second_last_name">
                                        <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="quarterfinalist.candidate.first_name+' '+quarterfinalist.candidate.second_name+' '+quarterfinalist.candidate.first_last_name">
                                        </p>
                                    </template>
                                </template>
                                <p class="text-xl font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                    x-text="quarterfinalist.candidate.country.name">
                                </p>
                            </div>
                        </template>
                    </div>
                    <div class="border-b border-gray-400 mx-10"></div>
                </div>
            </div>
        </section>
    </section>
</div>
<script>
    function data() {
        return {
            page_information: @entangle('page_information'),
            page: [],
            show_page_info() {
                this.page = JSON.parse(this.page_information);
                console.log(this.page);
            }
        }
    }
</script>
