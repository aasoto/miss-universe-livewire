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
                    <template x-if="page.winner">
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
                    </template>
                    <h2
                        class="text-lg md:text-xl my-4 font-medium text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                        Finalistas
                    </h2>
                    <div class="flex flex-col xl:flex-row gap-2 justify-center items-center my-8">
                        <div class="flex flex-row gap-2 my-3">
                            <template x-if="page.first_runner_up">
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
                            </template>
                            <template x-if="page.second_runner_up">
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
                            </template>
                        </div>
                        <div class="flex flex-row gap-2 my-3">
                            <template x-if="page.third_runner_up">
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
                            </template>
                            <template x-if="page.fourth_runner_up">
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
                            </template>
                        </div>
                    </div>
                    <template x-if="page.semifinalists">
                        <div class="border-b border-gray-400 mx-10"></div>
                    </template>
                    <template x-if="page.semifinalists">
                        <h2
                            class="text-lg md:text-xl my-4 font-medium text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                            Semifinalistas (Top 10)
                        </h2>
                    </template>
                    <template x-if="page.semifinalists">
                        <div class="flex flex-row flex-wrap gap-10 justify-center items-center my-8">
                            <template x-for="semifinalist in page.semifinalists">
                                <div class="flex flex-col justify-center items-center">
                                    <div class="relative w-32 iPhoneSE:w-40 sm:w-48 h-32 iPhoneSE:h-40 sm:h-48">
                                        <div
                                            class="rounded-full w-full h-full p-2 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                            <img class="w-full h-full object-cover object-top rounded-full"
                                                :src="`../../storage/app/public/images/candidates/official_pictures/${semifinalist.candidate.official_picture}`"
                                                alt="">
                                        </div>
                                        <span class="absolute bottom-5 left-5"><i
                                                :class="`fi fi-${semifinalist.candidate.country.iso3166_1_alpha2} fis rounded-full scale-[3]`"></i></span>
                                    </div>
                                    <p
                                        class="text-base font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700">
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
                    </template>
                    <template x-if="page.quarterfinalists">
                        <div class="border-b border-gray-400 mx-10"></div>
                    </template>
                    <template x-if="page.quarterfinalists">
                        <h2
                            class="text-lg md:text-xl my-4 font-medium text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                            Cuartofinalistas (Top 15)
                        </h2>
                    </template>
                    <template x-if="page.quarterfinalists">
                        <div class="flex flex-row flex-wrap gap-10 justify-center items-center my-8">
                            <template x-for="quarterfinalist in page.quarterfinalists">
                                <div class="flex flex-col justify-center items-center">
                                    <div class="relative w-32 iPhoneSE:w-40 sm:w-48 h-32 iPhoneSE:h-40 sm:h-48">
                                        <div
                                            class="rounded-full w-full h-full p-2 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                            <img class="w-full h-full object-cover object-top rounded-full"
                                                :src="`../../storage/app/public/images/candidates/official_pictures/${quarterfinalist.candidate.official_picture}`"
                                                alt="">
                                        </div>
                                        <span class="absolute bottom-5 left-5"><i
                                                :class="`fi fi-${quarterfinalist.candidate.country.iso3166_1_alpha2} fis rounded-full scale-[3]`"></i></span>
                                    </div>
                                    <p
                                        class="text-base font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700">
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
                    </template>
                    <template x-if="page.best_national_costume">
                        <div class="border-b border-gray-400 mx-10"></div>
                    </template>
                    <template x-if="page.best_national_costume">
                        <h2
                            class="text-lg md:text-xl my-4 font-medium text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                            Premios especiales
                        </h2>
                    </template>
                    <div class="flex flex-col gap-2 justify-center items-center my-8">
                        <div class="flex flex-col lg:flex-row gap-2 my-3">
                            <div class="basis-2/3 flex flex-row gap-2">
                                <template x-if="page.miss_congeniality">
                                    <template x-for="miss_congeniality in page.miss_congeniality">
                                        <div class="basis-1/2 flex flex-col justify-center items-center">
                                            <div
                                                class="relative w-32 iPhoneSE:w-40 sm:w-48 h-32 iPhoneSE:h-40 sm:h-48">
                                                <div
                                                    class="rounded-full w-full h-full p-2 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                                    <img class="w-full h-full object-cover object-top rounded-full"
                                                        :src="`../../storage/app/public/images/candidates/official_pictures/${miss_congeniality.candidate.official_picture}`"
                                                        alt="">
                                                </div>
                                                <span class="absolute bottom-5 left-5">
                                                    <i
                                                        :class="`fi fi-${miss_congeniality.candidate.country.iso3166_1_alpha2} fis rounded-full scale-[3]`"></i>
                                                </span>
                                            </div>
                                            <p
                                                class="text-base font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700">
                                                Miss Simpatía
                                            </p>
                                            <template x-if="miss_congeniality.candidate.second_name">
                                                <template x-if="miss_congeniality.candidate.second_last_name">
                                                    <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                        x-text="miss_congeniality.candidate.first_name+' '+miss_congeniality.candidate.second_name+' '+miss_congeniality.candidate.first_last_name+' '+miss_congeniality.candidate.second_last_name">
                                                    </p>
                                                </template>
                                            </template>
                                            <template x-if="!miss_congeniality.candidate.second_name">
                                                <template x-if="!miss_congeniality.candidate.second_last_name">
                                                    <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                        x-text="miss_congeniality.candidate.first_name+' '+miss_congeniality.candidate.first_last_name">
                                                    </p>
                                                </template>
                                            </template>
                                            <template x-if="miss_congeniality.candidate.second_name">
                                                <template x-if="!miss_congeniality.candidate.second_last_name">
                                                    <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                        x-text="miss_congeniality.candidate.first_name+' '+miss_congeniality.candidate.second_name+' '+miss_congeniality.candidate.first_last_name">
                                                    </p>
                                                </template>
                                            </template>
                                            <template x-if="!miss_congeniality.candidate.second_name">
                                                <template x-if="miss_congeniality.candidate.second_last_name">
                                                    <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                        x-text="miss_congeniality.candidate.first_name+' '+miss_congeniality.candidate.first_last_name+' '+miss_congeniality.candidate.second_last_name">
                                                    </p>
                                                </template>
                                            </template>
                                            <p class="text-xl font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                x-text="miss_congeniality.candidate.country.name">
                                            </p>
                                        </div>
                                    </template>
                                </template>
                                <template x-if="page.best_national_costume">
                                    <template x-for="best_national_costume in page.best_national_costume">
                                        <div class="basis-1/2 flex flex-col justify-center items-center">
                                            <div
                                                class="relative w-32 iPhoneSE:w-40 sm:w-48 h-32 iPhoneSE:h-40 sm:h-48">
                                                <div
                                                    class="rounded-full w-full h-full p-2 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                                    <img class="w-full h-full object-cover object-top rounded-full"
                                                        :src="`../../storage/app/public/images/candidates/official_pictures/${best_national_costume.candidate.official_picture}`"
                                                        alt="">
                                                </div>
                                                <span class="absolute bottom-5 left-5">
                                                    <i
                                                        :class="`fi fi-${best_national_costume.candidate.country.iso3166_1_alpha2} fis rounded-full scale-[3]`"></i>
                                                </span>
                                            </div>
                                            <p
                                                class="text-base font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700">
                                                Mejor Traje Típico
                                            </p>
                                            <template x-if="best_national_costume.candidate.second_name">
                                                <template x-if="best_national_costume.candidate.second_last_name">
                                                    <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                        x-text="best_national_costume.candidate.first_name+' '+best_national_costume.candidate.second_name+' '+best_national_costume.candidate.first_last_name+' '+best_national_costume.candidate.second_last_name">
                                                    </p>
                                                </template>
                                            </template>
                                            <template x-if="!best_national_costume.candidate.second_name">
                                                <template x-if="!best_national_costume.candidate.second_last_name">
                                                    <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                        x-text="best_national_costume.candidate.first_name+' '+best_national_costume.candidate.first_last_name">
                                                    </p>
                                                </template>
                                            </template>
                                            <template x-if="best_national_costume.candidate.second_name">
                                                <template x-if="!best_national_costume.candidate.second_last_name">
                                                    <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                        x-text="best_national_costume.candidate.first_name+' '+best_national_costume.candidate.second_name+' '+best_national_costume.candidate.first_last_name">
                                                    </p>
                                                </template>
                                            </template>
                                            <template x-if="!best_national_costume.candidate.second_name">
                                                <template x-if="best_national_costume.candidate.second_last_name">
                                                    <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                        x-text="best_national_costume.candidate.first_name+' '+best_national_costume.candidate.first_last_name+' '+best_national_costume.candidate.second_last_name">
                                                    </p>
                                                </template>
                                            </template>
                                            <p class="text-xl font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                x-text="best_national_costume.candidate.country.name">
                                            </p>
                                        </div>
                                    </template>
                                </template>
                            </div>
                            <template x-if="page.miss_photogenic">
                                <template x-for="miss_photogenic in page.miss_photogenic">
                                    <div class="basis-1/3 flex flex-col justify-center items-center">
                                        <div class="relative w-32 iPhoneSE:w-40 sm:w-48 h-32 iPhoneSE:h-40 sm:h-48">
                                            <div
                                                class="rounded-full w-full h-full p-2 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                                <img class="w-full h-full object-cover object-top rounded-full"
                                                    :src="`../../storage/app/public/images/candidates/official_pictures/${miss_photogenic.candidate.official_picture}`"
                                                    alt="">
                                            </div>
                                            <span class="absolute bottom-5 left-5">
                                                <i
                                                    :class="`fi fi-${miss_photogenic.candidate.country.iso3166_1_alpha2} fis rounded-full scale-[3]`"></i>
                                            </span>
                                        </div>
                                        <p
                                            class="text-base font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700">
                                            Miss Fotogenica
                                        </p>
                                        <template x-if="miss_photogenic.candidate.second_name">
                                            <template x-if="miss_photogenic.candidate.second_last_name">
                                                <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                    x-text="miss_photogenic.candidate.first_name+' '+miss_photogenic.candidate.second_name+' '+miss_photogenic.candidate.first_last_name+' '+miss_photogenic.candidate.second_last_name">
                                                </p>
                                            </template>
                                        </template>
                                        <template x-if="!miss_photogenic.candidate.second_name">
                                            <template x-if="!miss_photogenic.candidate.second_last_name">
                                                <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                    x-text="miss_photogenic.candidate.first_name+' '+miss_photogenic.candidate.first_last_name">
                                                </p>
                                            </template>
                                        </template>
                                        <template x-if="miss_photogenic.candidate.second_name">
                                            <template x-if="!miss_photogenic.candidate.second_last_name">
                                                <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                    x-text="miss_photogenic.candidate.first_name+' '+miss_photogenic.candidate.second_name+' '+miss_photogenic.candidate.first_last_name">
                                                </p>
                                            </template>
                                        </template>
                                        <template x-if="!miss_photogenic.candidate.second_name">
                                            <template x-if="miss_photogenic.candidate.second_last_name">
                                                <p class="text-base italic font-light text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                                    x-text="miss_photogenic.candidate.first_name+' '+miss_photogenic.candidate.first_last_name+' '+miss_photogenic.candidate.second_last_name">
                                                </p>
                                            </template>
                                        </template>
                                        <p class="text-xl font-medium text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700"
                                            x-text="miss_photogenic.candidate.country.name">
                                        </p>
                                    </div>
                                </template>
                            </template>
                        </div>
                    </div>
                </div>
                <!-- End of Resumen -->
                <div class="basis-1/3">
                    <template x-if="page.owner">
                        <div class="container mx-auto -mt-0 md:-mt-20 py-5 md:py-10 w-full iPhoneSE:w-10/12 md:w-8/12">
                            <div class="block md:hidden border-b border-gray-400 mx-5"></div>
                            <h2
                                class="block md:hidden text-xl my-4 font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                Propietario
                            </h2>
                            <img @click="open_owner()"
                                class="block dark:hidden scale-75 md:scale-100 hover:scale-110 md:hover:scale-125 transition duration-200 cursor-pointer"
                                :src="`../../storage/app/public/images/owners/logo/${page.owner.logo_light_theme}`"
                                alt="">
                            <img @click="open_owner()"
                                class="hidden dark:block scale-75 md:scale-100 hover:scale-110 md:hover:scale-125 transition duration-200 cursor-pointer"
                                :src="`../../storage/app/public/images/owners/logo/${page.owner.logo_dark_theme}`"
                                alt="">
                        </div>
                    </template>
                    <template x-if="page.main_broadcaster">
                        <div class="mx-auto py-5 w-10/12 md:w-8/12">
                            <div class="block md:hidden border-b border-gray-400 mx-5"></div>
                            <h2
                                class="block md:hidden text-xl my-4 font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                Canales de televisión
                            </h2>
                            <div class="flex flex-row justify-center items-center gap-3">
                                <div class="container basis-1/2 flex items-center">
                                    <img @click="open_broadcaster()"
                                        class="block dark:hidden scale-75 md:scale-100 hover:scale-110 md:hover:scale-125 transition duration-200 cursor-pointer"
                                        :src="`../../storage/app/public/images/editions/broadcasters/${page.main_broadcaster.logo_light_theme}`"
                                        alt="">
                                    <img @click="open_broadcaster()"
                                        class="hidden dark:block scale-75 md:scale-100 hover:scale-110 md:hover:scale-125 transition duration-200 cursor-pointer"
                                        :src="`../../storage/app/public/images/editions/broadcasters/${page.main_broadcaster.logo_dark_theme}`"
                                        alt="">
                                </div>
                                <template x-if="page.secondary_broadcaster">
                                    <div class="container basis-1/2 flex items-center">
                                        <img @click="open_broadcaster_2()"
                                            class="block dark:hidden scale-75 md:scale-100 hover:scale-110 md:hover:scale-125 transition duration-200 cursor-pointer"
                                            :src="`../../storage/app/public/images/editions/broadcasters/${page.secondary_broadcaster.logo_light_theme}`"
                                            alt="">
                                        <img @click="open_broadcaster_2()"
                                            class="hidden dark:block scale-75 md:scale-100 hover:scale-110 md:hover:scale-125 transition duration-200 cursor-pointer"
                                            :src="`../../storage/app/public/images/editions/broadcasters/${page.secondary_broadcaster.logo_dark_theme}`"
                                            alt="">
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                    <div class="mx-1 iPhoneSE:mx-6">
                        <div class="border-t border-gray-400 mx-10"></div>
                        <div class="flex flex-row gap-2 mt-4 mx-1 iPhoneSE:mx-5">
                            <div class="container basis-1/2">
                                <h4
                                    class="text-base font-bold text-gray-800 dark:text-white text-right selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Sede final
                                </h4>
                            </div>
                            <div class="container basis-1/2">
                                <p
                                    class="text-base font-normal text-gray-800 dark:text-white selection:bg-rose-300 dark:selection:bg-rose-700">
                                    <span x-text="page.place.name"></span>
                                    <span>
                                        <i :class="`fi fi-${page.place.city_venue.country.iso3166_1_alpha2}`"></i>
                                    </span>
                                    <span
                                        x-text="page.place.city_venue.city+', '+page.place.city_venue.state+', '+page.place.city_venue.country.name+'.'"></span>
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-row gap-2 mt-4 mx-5">
                            <div class="container basis-1/2">
                                <h4
                                    class="text-base font-bold text-gray-800 dark:text-white text-right selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Sede operativa
                                </h4>
                            </div>
                            <div class="container basis-1/2">
                                <p
                                    class="text-base font-normal text-gray-800 dark:text-white selection:bg-rose-300 dark:selection:bg-rose-700">
                                    <span x-text="page.edition_information.hotel_concentration"></span>
                                    <span>
                                        <i :class="`fi fi-${page.place.city_venue.country.iso3166_1_alpha2}`"></i>
                                    </span>
                                    <span x-text="page.place.city_venue.country.name"></span>
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-row gap-2 mt-4 mx-5">
                            <div class="container basis-1/2">
                                <h4
                                    class="text-base font-bold text-gray-800 dark:text-white text-right selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Fecha
                                </h4>
                            </div>
                            <div class="container basis-1/2">
                                <p class="text-base font-normal text-gray-800 dark:text-white selection:bg-rose-300 dark:selection:bg-rose-700"
                                    x-text="page.edition_information.date">
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-row gap-2 mt-4 mx-5">
                            <div class="container basis-1/2">
                                <h4
                                    class="text-base font-bold text-gray-800 dark:text-white text-right selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Presentadores
                                </h4>
                            </div>
                            <div class="container basis-1/2">
                                <ul class="list-none iPhoneSE:list-disc md:list-none xl:list-disc list-inside">
                                    <template x-for="presenter in page.presenters">
                                        <li
                                            class="text-base font-normal text-gray-800 dark:text-white selection:bg-rose-300 dark:selection:bg-rose-700">
                                            <span>
                                                <i
                                                    :class="`fi fi-${presenter.presenter.country.iso3166_1_alpha2}`"></i>
                                            </span>
                                            <span x-text="presenter.presenter.name"></span>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                        <div class="flex flex-row gap-2 mt-4 mx-5">
                            <div class="container basis-1/2">
                                <h4
                                    class="text-base font-bold text-gray-800 dark:text-white text-right selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Entretenimiento
                                </h4>
                            </div>
                            <div class="container basis-1/2">
                                <ul class="list-none iPhoneSE:list-disc md:list-none xl:list-disc list-inside">
                                    <template x-for="entertainment in page.entertainment">
                                        <li
                                            class="text-base font-normal text-gray-800 dark:text-white selection:bg-rose-300 dark:selection:bg-rose-700">
                                            <span>
                                                <i :class="`fi fi-${entertainment.country.iso3166_1_alpha2}`"></i>
                                            </span>
                                            <span x-text="entertainment.artist"></span>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                        <div class="flex flex-row gap-2 mt-4 mx-5">
                            <div class="container basis-1/2">
                                <h4
                                    class="text-base font-bold text-gray-800 dark:text-white text-right selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Número de participantes
                                </h4>
                            </div>
                            <div class="container basis-1/2">
                                <p class="text-base font-normal text-gray-800 dark:text-white selection:bg-rose-300 dark:selection:bg-rose-700"
                                    x-text="page.edition_information.entrants">
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-row gap-2 mt-4 mx-5">
                            <div class="container basis-1/2">
                                <h4
                                    class="text-base font-bold text-gray-800 dark:text-white text-right selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Clasificación
                                </h4>
                            </div>
                            <div class="container basis-1/2">
                                <p class="text-base font-normal text-gray-800 dark:text-white selection:bg-rose-300 dark:selection:bg-rose-700"
                                    x-text="page.edition_information.placements">
                                </p>
                            </div>
                        </div>
                        <template x-if="page.debuts">
                            <div class="flex flex-row gap-2 mt-4 mx-5">
                                <div class="container basis-1/2">
                                    <h4
                                        class="text-base font-bold text-gray-800 dark:text-white text-right selection:bg-rose-300 dark:selection:bg-rose-700">
                                        Debuts
                                    </h4>
                                </div>
                                <div class="container basis-1/2">
                                    <ul class="list-none iPhoneSE:list-disc md:list-none xl:list-disc list-inside">
                                        <template x-for="debut in page.debuts">
                                            <li
                                                class="text-base font-normal text-gray-800 dark:text-white selection:bg-rose-300 dark:selection:bg-rose-700">
                                                <span>
                                                    <i :class="`fi fi-${debut.country.iso3166_1_alpha2}`"></i>
                                                </span>
                                                <span x-text="debut.country.name"></span>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                        </template>
                        <template x-if="page.withdrawals">
                            <div class="flex flex-row gap-2 mt-4 mx-5">
                                <div class="container basis-1/2">
                                    <h4
                                        class="text-base font-bold text-gray-800 dark:text-white text-right selection:bg-rose-300 dark:selection:bg-rose-700">
                                        Retiros
                                    </h4>
                                </div>
                                <div class="container basis-1/2">
                                    <ul class="list-none iPhoneSE:list-disc md:list-none xl:list-disc list-inside">
                                        <template x-for="withdrawal in page.withdrawals">
                                            <li
                                                class="text-base font-normal text-gray-800 dark:text-white selection:bg-rose-300 dark:selection:bg-rose-700">
                                                <span>
                                                    <i :class="`fi fi-${withdrawal.country.iso3166_1_alpha2}`"></i>
                                                </span>
                                                <span x-text="withdrawal.country.name"></span>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                        </template>
                        <template x-if="page.returns">
                            <div class="flex flex-row gap-2 mt-4 mx-5">
                                <div class="container basis-1/2">
                                    <h4
                                        class="text-base font-bold text-gray-800 dark:text-white text-right selection:bg-rose-300 dark:selection:bg-rose-700">
                                        Regresos
                                    </h4>
                                </div>
                                <div class="container basis-1/2">
                                    <ul class="list-none iPhoneSE:list-disc md:list-none xl:list-disc list-inside">
                                        <template x-for="r in page.returns">
                                            <li
                                                class="text-base font-normal text-gray-800 dark:text-white selection:bg-rose-300 dark:selection:bg-rose-700">
                                                <span>
                                                    <i :class="`fi fi-${r.country.iso3166_1_alpha2}`"></i>
                                                </span>
                                                <span x-text="r.country.name"></span>
                                            </li>
                                        </template>
                                    </ul>
                                </div>
                            </div>
                        </template>
                        <template x-if="page.edition_information.logo">
                            <div class="mx-5 my-8">
                                <h4
                                    class="mb-5 text-base font-bold text-gray-800 dark:text-white text-center selection:bg-rose-300 dark:selection:bg-rose-700">
                                    Logo oficial de la edición
                                </h4>
                                <img class="rounded-lg"
                                    :src="`../../storage/app/public/images/editions/miss-universe/logos/${page.edition_information.logo}`"
                                    alt="">
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </section>
        <!-- Infomración general y resultados -->
        <div class="border-b border-gray-400 mx-10 my-6"></div>
        <!-- Candidatas -->
        <section>
            <h2 class="text-xl md:text-2xl my-4 font-medium text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                Concursantes
            </h2>
            <div class="flex justify-center items-center">
                <table class="container mx-0 iPhoneSE:mx-5 md:mx-10 w-full">
                    <thead class="sticky top-20 md:top-18 z-[70] w-full bg-gray-300 text-xs iPhoneSE:text-base rounded-full text-gray-800">
                        <tr class="text-center w-full">
                            <th class="rounded-l-full text-base w-2/6 py-3 break-words iPhoneSE:break-normal">
                                País
                            </th>
                            <th class=" text-base w-2/6 py-3 break-words iPhoneSE:break-normal">
                                Concursante
                            </th>
                            <th class=" text-base w-1/6 py-3 break-words iPhoneSE:break-normal">
                                Edad
                            </th>
                            <th class="rounded-r-full text-base w-1/6 py-3 break-words iPhoneSE:break-normal">
                                Ciudad
                            </th>
                        </tr>
                    </thead>
                    <tbody class="w-full">
                        <template x-for="contestant in page.contestants">
                            <tr class="w-full border-b text-xs iPhoneSE:text-base border-gray-300">
                                <td class="w-2/6 px-2 py-3 text-base font-bold break-words iPhoneSE:break-normal">
                                    <span class="ml-5">
                                        <i
                                            :class="`fi fi-${contestant.candidate.country.iso3166_1_alpha2} fis rounded-full scale-125`"></i>
                                    </span>
                                    <span class="ml-3" x-text="contestant.candidate.country.name">
                                    </span>
                                </td>
                                <template x-if="contestant.candidate.second_name">
                                    <template x-if="contestant.candidate.second_last_name">
                                        <td class="w-2/6 px-2 py-3 italic text-base break-words iPhoneSE:break-normal"
                                            x-text="contestant.candidate.first_name+' '+contestant.candidate.second_name+' '+contestant.candidate.first_last_name+' '+contestant.candidate.second_last_name">
                                        </td>
                                    </template>
                                </template>
                                <template x-if="!contestant.candidate.second_name">
                                    <template x-if="contestant.candidate.second_last_name">
                                        <td class="w-2/6 px-2 py-3 italic text-base break-words iPhoneSE:break-normal"
                                            x-text="contestant.candidate.first_name+' '+contestant.candidate.first_last_name+' '+contestant.candidate.second_last_name">
                                        </td>
                                    </template>
                                </template>
                                <template x-if="contestant.candidate.second_name">
                                    <template x-if="!contestant.candidate.second_last_name">
                                        <td class="w-2/6 px-2 py-3 italic text-base break-words iPhoneSE:break-normal"
                                            x-text="contestant.candidate.first_name+' '+contestant.candidate.second_name+' '+contestant.candidate.first_last_name">
                                        </td>
                                    </template>
                                </template>
                                <template x-if="!contestant.candidate.second_name">
                                    <template x-if="!contestant.candidate.second_last_name">
                                        <td class="w-2/6 px-2 py-3 italic text-base break-words iPhoneSE:break-normal"
                                            x-text="contestant.candidate.first_name+' '+contestant.candidate.first_last_name">
                                        </td>
                                    </template>
                                </template>
                                <td class="w-1/6 px-2 py-3 text-base break-words iPhoneSE:break-normal"
                                    x-text="contestant.candidate.age">
                                </td>
                                <td class="w-1/6 px-2 py-3 text-base break-words iPhoneSE:break-normal"
                                    x-text="contestant.candidate.hometown">
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </section>
        <!--End of Candidatas -->
        <div class="sticky top-20 md:top-28 z-[70] w-full"></div>
        <!-- Contenido -->
        <section class="mx-1 iPhoneSE:mx-5 sm:mx-10">
            <h2 class="text-xl md:text-2xl my-4 font-medium text-center text-rose-700 dark:text-rose-300">
                Contenido
            </h2>
            <span class="info-texto" x-html="page.edition_information.content"></span>
        </section>
        <!--En of Contenido -->
        <div class="sticky top-20 md:top-28 z-[70] w-full"></div>
        <!-- Contenido -->
        <section class="mx-1 iPhoneSE:mx-5 sm:mx-10">
            <h2 class="text-xl md:text-2xl my-4 font-medium text-center text-rose-700 dark:text-rose-300">
                Información extra
            </h2>
            <span class="info-texto" x-html="page.edition_information.extra_data"></span>
        </section>
    </section>
    <!-- Modals -->
    <div x-show="show_info_owner" x-transition>
        <div x-html="modal_owner()"></div>
    </div>
    <div x-show="show_info_broadcaster" x-transition>
        <div x-html="modal_main_broadcaster()"></div>
    </div>
    <div x-show="show_info_broadcaster_2" x-transition>
        <div x-html="modal_secondary_broadcaster()"></div>
    </div>
    <!-- end of Modals -->
</div>
<script>
    function data() {
        return {
            page_information: @entangle('page_information'),
            page: [],
            show_page_info() {
                this.page = JSON.parse(this.page_information);
                console.log(this.page);
            },
            show_info_owner: false,
            open_owner() {
                this.show_info_owner = true;
            },
            close_owner() {
                this.show_info_owner = false;
            },
            show_info_broadcaster: false,
            open_broadcaster() {
                this.show_info_broadcaster = true;
            },
            close_broadcaster() {
                this.show_info_broadcaster = false;
            },
            show_info_broadcaster_2: false,
            open_broadcaster_2() {
                this.show_info_broadcaster_2 = true;
            },
            close_broadcaster_2() {
                this.show_info_broadcaster_2 = false;
            },
            modal_owner() {
                return `
                <div @click="close_owner()" class="z-40 absolute top-0 left-0 right-0 bottom-0 bg-transparent">
                </div>
                <div class="flex justify-center">
                    <div class="container z-50 fixed top-28 w-10/12 h-2/3 bg-white/70 dark:bg-slate-800/70 backdrop-blur-xl shadow-lg rounded-lg">
                        <div class="flex w-full h-1/6">
                            <div class="w-10/12 md:w-11/12 pl-7 flex items-center text-gray-800 dark:text-white text-xl font-bold">` +
                    this.page.owner.business_name +
                    `</div>
                            <div class="w-2/12 md:w-1/12 flex justify-center items-center">
                                <i @click="close_owner()" class="fa-solid fa-xmark text-gray-800 dark:text-white hover:text-white hover:bg-red-500 hover:rounded-full hover:py-1 hover:px-2 cursor-pointer"></i>
                            </div>
                        </div>
                        <div class="container w-full h-5/6 py-8 px-8 md:px-16 text-base font-normal text-gray-800 dark:text-white overflow-auto text-justify leading-relaxed selection:bg-rose-300 dark:selection:bg-rose-700">
                            <img class="block dark:hidden px-0 md:px-48 mb-10" src="../../storage/app/public/images/owners/logo/` +
                    this.page.owner
                    .logo_light_theme +
                    `" alt="">
                            <img class="hidden dark:block px-0 md:px-48 mb-10" src="../../storage/app/public/images/owners/logo/` +
                    this
                    .page.owner.logo_dark_theme + `" alt="">
                            <div>` + this.page.owner.description + `</div>
                        </div>
                    </div>
                </div>`;
            },
            modal_main_broadcaster() {
                return `
                <div @click="close_broadcaster()" class="z-40 absolute top-0 left-0 right-0 bottom-0 bg-transparent">
                </div>
                <div class="flex justify-center">
                    <div class="container z-50 fixed top-28 w-10/12 h-2/3 bg-white/70 dark:bg-slate-800/70 backdrop-blur-xl shadow-lg rounded-lg">
                        <div class="flex w-full h-1/6">
                            <div class="w-10/12 md:w-11/12 pl-7 flex items-center text-gray-800 dark:text-white text-xl font-bold">` +
                    this.page.main_broadcaster.name +
                    `</div>
                            <div class="w-2/12 md:w-1/12 flex justify-center items-center">
                                <i @click="close_broadcaster()" class="fa-solid fa-xmark text-gray-800 dark:text-white hover:text-white hover:bg-red-500 hover:rounded-full hover:py-1 hover:px-2 cursor-pointer"></i>
                            </div>
                        </div>
                        <div class="container w-full h-5/6 py-8 px-8 md:px-16 text-base font-normal text-gray-800 dark:text-white overflow-auto text-justify leading-relaxed selection:bg-rose-300 dark:selection:bg-rose-700">
                            <div class="flex justify-center">
                                <img class="block dark:hidden px-0 md:px-48 mb-10 w-2/3 object-cover object-center" src="../../storage/app/public/images/editions/broadcasters/` +
                    this.page.main_broadcaster.logo_light_theme +
                    `" alt="">
                                <img class="hidden dark:block px-0 md:px-48 mb-10 w-2/3 object-cover object-center" src="../../storage/app/public/images/editions/broadcasters/` +
                    this.page.main_broadcaster.logo_dark_theme + `" alt="">
                            </div>
                            <div>` + this.page.main_broadcaster.description + `</div>
                        </div>
                    </div>
                </div>`;
            },
            modal_secondary_broadcaster() {
                return `
                <div @click="close_broadcaster_2()" class="z-40 absolute top-0 left-0 right-0 bottom-0 bg-transparent">
                </div>
                <div class="flex justify-center">
                    <div class="container z-50 fixed top-28 w-10/12 h-2/3 bg-white/70 dark:bg-slate-800/70 backdrop-blur-xl shadow-lg rounded-lg">
                        <div class="flex w-full h-1/6">
                            <div class="w-10/12 md:w-11/12 pl-7 flex items-center text-gray-800 dark:text-white text-xl font-bold">` +
                    this.page.secondary_broadcaster.name +
                    `</div>
                            <div class="w-2/12 md:w-1/12 flex justify-center items-center">
                                <i @click="close_broadcaster_2()" class="fa-solid fa-xmark text-gray-800 dark:text-white hover:text-white hover:bg-red-500 hover:rounded-full hover:py-1 hover:px-2 cursor-pointer"></i>
                            </div>
                        </div>
                        <div class="container w-full h-5/6 py-8 px-8 md:px-16 text-base font-normal text-gray-800 dark:text-white overflow-auto text-justify leading-relaxed selection:bg-rose-300 dark:selection:bg-rose-700">
                            <div class="flex justify-center">
                                <img class="block dark:hidden px-0 md:px-48 mb-10 w-2/3 object-cover object-center" src="../../storage/app/public/images/editions/broadcasters/` +
                    this.page.secondary_broadcaster.logo_light_theme +
                    `" alt="">
                                <img class="hidden dark:block px-0 md:px-48 mb-10 w-2/3 object-cover object-center" src="../../storage/app/public/images/editions/broadcasters/` +
                    this.page.secondary_broadcaster.logo_dark_theme + `" alt="">
                            </div>
                            <div>` + this.page.secondary_broadcaster.description + `</div>
                        </div>
                    </div>
                </div>`;
            },
        }
    }
</script>
