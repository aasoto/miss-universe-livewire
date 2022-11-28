<div x-data="data()" x-init="copy_data()" class="relative">
    <!-- Carrusel -->
    <section class="mt-16 sm:mt-[86px] md:mt-0">
        <div class="relative">
            <div @click="previous()"
                class="absolute top-0 py-[100px] md:py-[160px] lg:py-[300px] z-10 px-3 md:px-5 text-gray-400 hover:text-white hover:bg-black/60 dark:hover:bg-slate-400/60 rounded-r-full dark:text-white dark:hover:text-slate-800 transition duration-200 cursor-pointer">
                <i class="fa-solid fa-angle-left scale-[1.5] md:scale-[2] lg:scale-[3]"></i>
            </div>
            <template x-for="item in dataCarousel()">
                <div x-show="item.selected">
                    <template x-if="item.make">
                        <div class="relative">
                            <img class="-z-50 w-full max-h-[600px] object-cover object-center"
                                :src="`../storage/app/public/images/carousels/background/${item.image}`" alt="">
                            <template x-if="item.secondary_image">
                                <div
                                    class="absolute top-4 md:top-32 lg:top-40 mx-10 md:mx-16 lg:mx-28 flex flex-col items-start justify-center">
                                    <div class="grid grid-cols-3 gap-5">
                                        <div class="col-span-2">
                                            <h1 class="z-10 text-white font-bold text-base sm:text-xl md:text-4xl lg:text-6xl drop-shadow-xl"
                                                x-text="item.title"></h1>
                                            <p class="z-10 mt-4 text-white font-medium text-xs sm:text-base md:text-lg lg:text-2xl"
                                                x-text="item.subtitle"></p>
                                            <div class="z-10 flex flex-row flex-wrap gap-3">
                                                <template x-if="item.button_1_type">
                                                    <a :href="`${item.button_1_link}`">
                                                        <button
                                                            :class="`mt-4 px-1 sm:px-3 md:px-6 py-1 sm:py-2 md:py-3 border sm:border-2 border-${item.button_1_color}-500 hover:border-white dark:hover:border-slate-800 bg-white dark:bg-slate-800 hover:bg-${item.button_1}-500 text-sm sm:text-base text-${item.button_1}-500 hover:text-white dark:hover:text-slate-800 font-normal sm:font-bold rounded-full transition hover:scale-110`">
                                                            <span x-text="item.button_1_text"></span>
                                                        </button>
                                                    </a>
                                                </template>
                                                <template x-if="item.button_2_type">
                                                    <a :href="`${item.button_2_link}`">
                                                        <button
                                                            :class="`mt-4 px-1 sm:px-3 md:px-6 py-1 sm:py-2 md:py-3 border sm:border-2 border-${item.button_2_color}-500 hover:border-white dark:hover:border-slate-800 bg-white dark:bg-slate-800 hover:bg-${item.button_2}-500 text-sm sm:text-base text-${item.button_2}-500 hover:text-white dark:hover:text-slate-800 font-normal sm:font-bold rounded-full transition hover:scale-110`">
                                                            <span x-text="item.button_2_text"></span>
                                                        </button>
                                                    </a>
                                                </template>
                                            </div>
                                        </div>
                                        <div class="col-span-1 flex justify-center items-center">
                                            <img class="rounded-lg w-2/3 object-cover object-center"
                                                :src="`../storage/app/public/images/carousels/secondaries_images/${item.secondary_image}`"
                                                alt="item.secondary_image">
                                        </div>
                                    </div>
                                </div>
                            </template>
                            <template x-if="!item.secondary_image">
                                <div
                                    class="absolute z-10 top-4 md:top-32 lg:top-40 mx-10 md:mx-16 lg:mx-28 flex flex-col items-start justify-center">
                                    <h1 class="z-10 text-white font-bold text-base sm:text-xl md:text-4xl lg:text-6xl drop-shadow-xl"
                                        x-text="item.title"></h1>
                                    <p class="z-10 mt-4 text-white font-medium text-xs sm:text-base md:text-lg lg:text-2xl"
                                        x-text="item.subtitle"></p>
                                    <div class="z-10 flex flex-row flex-wrap gap-3">
                                        <template x-if="item.button_1_type">
                                            <a :href="`${item.button_1_link}`">
                                                <button
                                                    :class="`mt-4 px-1 sm:px-3 md:px-6 py-1 sm:py-2 md:py-3 border sm:border-2 border-${item.button_1_color}-500 hover:border-white dark:hover:border-slate-800 bg-white dark:bg-slate-800 hover:bg-${item.button_1}-500 text-sm sm:text-base text-${item.button_1}-500 hover:text-white dark:hover:text-slate-800 font-normal sm:font-bold rounded-full transition hover:scale-110`">
                                                    <span x-text="item.button_1_text"></span>
                                                </button>
                                            </a>
                                        </template>
                                        <template x-if="item.button_2_type">
                                            <a :href="`${item.button_2_link}`">
                                                <button
                                                    :class="`mt-4 px-1 sm:px-3 md:px-6 py-1 sm:py-2 md:py-3 border sm:border-2 border-${item.button_2_color}-500 hover:border-white dark:hover:border-slate-800 bg-white dark:bg-slate-800 hover:bg-${item.button_2}-500 text-sm sm:text-base text-${item.button_2}-500 hover:text-white dark:hover:text-slate-800 font-normal sm:font-bold rounded-full transition hover:scale-110`">
                                                    <span x-text="item.button_2_text"></span>
                                                </button>
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </template>
                            <div class="absolute top-0 left-0 w-full h-full bg-black/30 dark:bg-slate-900/70"></div>
                        </div>
                    </template>
                    <template x-if="!item.make">
                        <div class="relative">
                            <a class="z-20" :href="`${item.link_redirect}`">
                                <img class="-z-50 w-full max-h-[600px] object-cover object-center"
                                    :src="`../storage/app/public/images/carousels/background/${item.image}`" alt="">
                            </a>
                        </div>
                    </template>
                </div>
            </template>
            <div @click="next()"
                class="absolute top-0 right-0 py-[100px] md:py-[160px] lg:py-[300px] z-10 px-3 md:px-5 text-gray-400 hover:text-white hover:bg-black/60 dark:hover:bg-slate-400 rounded-l-full dark:text-white dark:hover:text-slate-800 transition duration-200 cursor-pointer">
                <i class="fa-solid fa-angle-right scale-[1.5] md:scale-[2] lg:scale-[3]"></i>
            </div>
            <div x-init="automatic_next()"></div>
        </div>
    </section>
</div>
<!-- Cuerpo de la página -->
<section
    class="mt-0 md:-mt-8 lg:-mt-14 mx-0 md:mx-7 pt-32 pb-20 backdrop-blur-none md:backdrop-blur-xl bg-white/50 dark:bg-slate-800/70 rounded-none md:rounded-md shadow-none md:shadow-lg md:shadow-gray-400 dark:md:shadow-black">
    <!-- Sección de ganadoras actuales -->
    <div x-data="titleholders()">
        <section>
            <div class="container mx-auto -mt-24 md:-mt-20 py-5 md:py-10 w-10/12 md:w-8/12">
                <h1
                    class="text-2xl md:text-3xl mb-4 font-semibold text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                    Actuales
                    ganadoras de los certamenes de belleza más importantes</h1>
            </div>
            <div class="mx-5 sm:mx-10 my-10 flex flex-row gap-2 md:gap-4">
                <template x-for="titleholder in current_titleholders">
                    <div @click="show_info_titleholder(titleholder)"
                        class="basis-1/3 container flex flex-col justify-center items-center">
                        <div class="relative flex flex-col items-center justify-center">
                            <div
                                class="rounded-full w-16 iPhoneSE:w-24 sm:w-32 md:w-44 lg:w-60 h-16 iPhoneSE:h-24 sm:h-32 md:h-44 lg:h-60 p-1 md:p-2 bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                                <img class="rounded-full w-full h-full object-cover object-center cursor-pointer"
                                    :src="`${titleholder.image}`" alt="">
                            </div>
                            <span class="absolute bottom-0 sm:bottom-3 md:bottom-6 left-0 sm:left-3 md:left-6"><i
                                    :class="`fi fi-${titleholder.flag} fis rounded-full scale-[2] sm:scale-[3] cursor-pointer`"></i></span>
                        </div>
                    </div>
                </template>
            </div>
            <template x-for="titleholder_info in current_titleholders">
                <div x-show="titleholder_info.show" x-transition>
                    <div class="w-10/12 mx-auto flex flex-col justify-center md:justify-start my-16">
                        <h1 class="text-3xl sm:text-4xl mb-4 font-medium text-center md:text-left"
                            x-text="titleholder_info.edition"></h1>
                        <p class="mb-8 leading-relaxed text-lg text-center md:text-left"
                            x-text="titleholder_info.description"></p>
                    </div>
                </div>
            </template>
        </section>
    </div>
    <!-- fin Sección de ganadoras actuales -->
    <!-- Sección de noticias -->
    <div x-data="latest_news()">
        <section class="my-8 px-6 sm:px-12">
            <div class="container mx-auto py-5 md:py-10 w-10/12 md:w-8/12">
                <h1 class="text-2xl md:text-3xl mb-4 font-semibold text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
                    Últimas noticias
                </h1>
            </div>
            <div class="grid grid-cols-4 gap-4">
                <template x-for="item in news">
                    <div class="col-span-4 lg:col-span-2 2xl:col-span-1">
                        <a :href="`{{asset('news/show')}}/${item.slug}`">
                            <div
                                class="flex flex-col xl:flex-row 2xl:flex-col w-full rounded-md shadow-md hover:shadow-gray-400 hover:scale-105 transition">
                                <img class="w-full xl:w-1/2 2xl:w-full h-full xl:h-64 2xl:h-1/2 rounded-t-md xl:rounded-l-md 2xl:rounded-t-md object-cover object-center cursor-pointer"
                                    :src="`../storage/app/public/images/news/background/${item.background}`" alt="">
                                <div class="px-4">
                                    <h3 class="text-lg sm:text-xl mb-4 font-medium text-left hover:text-rose-700 hover:underline cursor-pointer"
                                        x-text="item.title"></h3>
                                    <p class="text-base text-justify pb-4 break-words cursor-pointer" x-html="item.content"></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </template>
            </div>
            <div class="my-7">
                <a href="pages/list_news.html">
                    <h2
                        class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600 hover:underline cursor-pointer text-center">
                        Ver más noticias</h2>
                </a>
            </div>
        </section>
    </div>
</section>


<script>
    function data() {
        return {
            carousel: @entangle('carousels'),
            carousel_aux: [],
            carousel_aux_lenght: 0,
            item_selected: 0,
            auto_carousel: true,
            copy_data() {
                for (let i = 0; i < this.carousel.length; i++) {
                    this.carousel_aux[i] = this.carousel[i];
                    console.log('for carousel: ', i);
                    if (i == 0) {
                        this.carousel_aux[i].selected = true;
                    } else {
                        this.carousel_aux[i].selected = false;
                    }
                    if (this.carousel_aux[i].type == 'make') {
                        this.carousel_aux[i].make = true;
                    } else {
                        this.carousel_aux[i].make = false;
                    }
                }
                this.carousel_aux_lenght = this.carousel_aux.length;
            },
            dataCarousel() {
                console.log('dataCarousel()');

                return this.carousel_aux;
            },
            next() {
                console.log('next()')
                this.auto_carousel = false;
                this.item_selected++;
                if (this.item_selected == this.carousel_aux_lenght) {
                    this.item_selected = 0;
                    for (let i = 0; i < this.carousel_aux.length; i++) {
                        if (i == this.item_selected) {
                            this.carousel_aux[this.carousel_aux_lenght - 1].selected = false;
                            this.carousel_aux[i].selected = true;
                        }
                    }
                } else {
                    for (let i = 0; i < this.carousel_aux.length; i++) {
                        if (i == this.item_selected) {
                            this.carousel_aux[i - 1].selected = false;
                            this.carousel_aux[i].selected = true;
                        }
                    }
                }
            },
            previous() {
                console.log('previous()')
                this.auto_carousel = false;
                this.item_selected--;
                if (this.item_selected >= 0) {
                    for (let i = 0; i < this.carousel_aux.length; i++) {
                        if (i == this.item_selected) {
                            this.carousel_aux[i + 1].selected = false;
                            this.carousel_aux[i].selected = true;
                        }
                    }
                } else {
                    this.item_selected = this.carousel_aux_lenght - 1;
                    for (let i = 0; i < this.carousel_aux.length; i++) {
                        if (i == this.item_selected) {
                            this.carousel_aux[0].selected = false;
                            this.carousel_aux[i].selected = true;
                        }
                    }
                }
            },
            automatic_next() {
                i = 0
                setInterval(() => {
                    if (this.auto_carousel) {
                        if (i == 0) {
                            this.carousel_aux[this.carousel_aux.length - 1].selected = false;
                            this.carousel_aux[i].selected = true;
                            i++;
                        } else {
                            this.carousel_aux[i - 1].selected = false;
                            this.carousel_aux[i].selected = true;
                            i++;
                        }
                        if (i == this.carousel_aux.length) {
                            i = 0;
                        }
                    }
                }, 5000);
            },

        }
    }

    function titleholders() {
        return {
            current_titleholders: [{
                edition: 'Miss Universo 2021',
                description: 'Harnaaz Kaur Sandhu de la India coronada el 13 de diciembre de 2021 en Eilat, Israel.',
                image: '../storage/app/public/images/titleholders/Captura2.PNG',
                flag: 'in',
                show: false
            }, {
                edition: 'Miss Mundo 2021',
                description: 'Karolina Bielawska de Polonia coronada en Marzo del 2022 en San Juan, Puerto Rico.',
                image: '../storage/app/public/images/titleholders/miss-world.jpg',
                flag: 'pl',
                show: false
            }, {
                edition: 'Miss Grand International 2022',
                description: 'Isabella Menin de Brasil coronada el 25 de octubre del 2022 en Bogor, Indonesia.',
                image: '../storage/app/public/images/titleholders/miss-grand-2022.PNG',
                flag: 'br',
                show: false
            }],
            show_info_titleholder(key) {
                for (let i = 0; i < this.current_titleholders.length; i++) {
                    if ((key.edition == this.current_titleholders[i].edition) && (key.description == this
                            .current_titleholders[i].description)) {
                        this.current_titleholders[i].show = true;
                    } else {
                        this.current_titleholders[i].show = false;
                    }
                }
            }
        }
    }

    function latest_news() {
        return {
            news: @entangle('news')
        }
    }
</script>
