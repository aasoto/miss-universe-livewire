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
                    <div class="relative">
                        <img class="-z-50 w-full max-h-[600px] object-cover object-center" :src="`../storage/app/public/images/carousels/background/${item.image}`"
                            alt="">
                        <template x-if="item.secondary_image">
                            <div class="absolute top-4 md:top-32 lg:top-40 mx-10 md:mx-16 lg:mx-28 flex flex-col items-start justify-center">
                                <div class="grid grid-cols-3 gap-5">
                                    <div class="col-span-2">
                                        <h1 class="z-10 text-white font-bold text-base sm:text-xl md:text-4xl lg:text-6xl drop-shadow-xl"
                                            x-text="item.title"></h1>
                                        <p class="z-10 mt-4 text-white font-medium text-xs sm:text-base md:text-lg lg:text-2xl"
                                            x-text="item.subtitle"></p>
                                        <div class="z-10 flex flex-row flex-wrap gap-3">
                                            <template x-if="item.button_1_type">
                                                <a :href="`${item.button_1_link}`">
                                                    <button :class="`mt-4 px-1 sm:px-3 md:px-6 py-1 sm:py-2 md:py-3 border sm:border-2 border-${item.button_1_color}-500 hover:border-white dark:hover:border-slate-800 bg-white dark:bg-slate-800 hover:bg-${item.button_1}-500 text-sm sm:text-base text-${item.button_1}-500 hover:text-white dark:hover:text-slate-800 font-normal sm:font-bold rounded-full transition hover:scale-110`">
                                                        <span x-text="item.button_1_text"></span>
                                                    </button>
                                                </a>
                                            </template>
                                            <template x-if="item.button_2_type">
                                                <a :href="`${item.button_2_link}`">
                                                    <button :class="`mt-4 px-1 sm:px-3 md:px-6 py-1 sm:py-2 md:py-3 border sm:border-2 border-${item.button_2_color}-500 hover:border-white dark:hover:border-slate-800 bg-white dark:bg-slate-800 hover:bg-${item.button_2}-500 text-sm sm:text-base text-${item.button_2}-500 hover:text-white dark:hover:text-slate-800 font-normal sm:font-bold rounded-full transition hover:scale-110`">
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
                            <div class="absolute top-4 md:top-32 lg:top-40 mx-10 md:mx-16 lg:mx-28 flex flex-col items-start justify-center">
                                <h1 class="z-10 text-white font-bold text-base sm:text-xl md:text-4xl lg:text-6xl drop-shadow-xl"
                                    x-text="item.title"></h1>
                                <p class="z-10 mt-4 text-white font-medium text-xs sm:text-base md:text-lg lg:text-2xl"
                                    x-text="item.subtitle"></p>
                                <div class="z-10 flex flex-row flex-wrap gap-3">
                                    <template x-if="item.button_1_type">
                                        <a :href="`${item.button_1_link}`">
                                            <button :class="`mt-4 px-1 sm:px-3 md:px-6 py-1 sm:py-2 md:py-3 border sm:border-2 border-${item.button_1_color}-500 hover:border-white dark:hover:border-slate-800 bg-white dark:bg-slate-800 hover:bg-${item.button_1}-500 text-sm sm:text-base text-${item.button_1}-500 hover:text-white dark:hover:text-slate-800 font-normal sm:font-bold rounded-full transition hover:scale-110`">
                                                <span x-text="item.button_1_text"></span>
                                            </button>
                                        </a>
                                    </template>
                                    <template x-if="item.button_2_type">
                                        <a :href="`${item.button_2_link}`">
                                            <button :class="`mt-4 px-1 sm:px-3 md:px-6 py-1 sm:py-2 md:py-3 border sm:border-2 border-${item.button_2_color}-500 hover:border-white dark:hover:border-slate-800 bg-white dark:bg-slate-800 hover:bg-${item.button_2}-500 text-sm sm:text-base text-${item.button_2}-500 hover:text-white dark:hover:text-slate-800 font-normal sm:font-bold rounded-full transition hover:scale-110`">
                                                <span x-text="item.button_2_text"></span>
                                            </button>
                                        </a>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </template>
            <div @click="next()"
                class="absolute top-0 right-0 py-[100px] md:py-[160px] lg:py-[300px] z-10 px-3 md:px-5 text-gray-400 hover:text-white hover:bg-black/60 dark:hover:bg-slate-400 rounded-l-full dark:text-white dark:hover:text-slate-800 transition duration-200 cursor-pointer">
                <i class="fa-solid fa-angle-right scale-[1.5] md:scale-[2] lg:scale-[3]"></i>
            </div>
            <div class="absolute -z-10 top-0 left-0 w-full h-full bg-black/30 dark:bg-slate-900/70"></div>
        </div>
        <div x-init="automatic_next()"></div>
    </section>
</div>

<script>
    function data () {
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
                        this.carousel_aux[this.carousel_aux.length-1].selected = false;
                        this.carousel_aux[i].selected = true;
                        i++;
                    } else {
                        this.carousel_aux[i-1].selected = false;
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

</script>
