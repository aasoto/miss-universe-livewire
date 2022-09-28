<div x-data="data()" class="relative">
    <template x-for="item in dataCarousel()">
        <template x-if="item.selected">
            <div class="selected" :style="`background-image: url('../storage/app/public/images/carousels/background/${item.image}'); background-size: cover; background-repeat: no-repeat; background-position: center center;`">
                {{-- @media (min-width: 640px) { height: 315px; width: 640px; } @media (min-width: 768px) { height: 378px; width: 768px; } @media (min-width: 1024px) { height: 504px; width: 1024px; } @media (min-width: 1280px) { height: 630px; width: 1280px; } @media (min-width: 1536px) { height: 756px; width: 1536px; } --}}
                <template x-if="!item.link_redirect">
                    <div class="grid sm:grid-cols-4 md:grid-cols-6">
                        <div class="cols-span-1"></div>
                        <div class="mx-3 sm:col-span-2 md:col-span-3 mt-28 sm:mt-28 md:mt-28 lg:mt-40 lg:mb-40">
                            <h1 class="w-full text-2xl sm:text-3xl md:text-6xl font-bold text-white drop-shadow-xl shadow-black"
                                x-text="item.title"></h1>
                            <h3 class="mt-8 mb-10 w-full text-lg sm:text-xl md:text-2xl font-bold text-white drop-shadow-xl shadow-black"
                                x-text="item.subtitle"></h3>
                            <div class="mb-12 lg:mb-0">
                                <template x-if="item.button_1_type">
                                    <a :href="`${item.button_1_link}`">
                                        <button type="button" class="text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
                                        :style="'--tw-bg-opacity: 1; background-color: rgb('+item.button_1_color+' / var(--tw-bg-opacity));'"
                                        x-text="item.button_1_text"></button>
                                    </a>
                                </template>
                                <template x-if="item.button_2_type">
                                    <a :href="`${item.button_2_link}`">
                                        <button type="button" class="text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"
                                        :style="'--tw-bg-opacity: 1; background-color: rgb('+item.button_2_color+' / var(--tw-bg-opacity));'"
                                        x-text="item.button_2_text"></button>
                                    </a>
                                </template>
                            </div>
                        </div>
                        <div class="cols-span-1 sm:cols-span-1 md:col-span-2 items-center">
                            <template x-if="item.secondary_image" class="">
                                <img class="invisible md:visible lg:visible py-4 px-4 my-4 sm:py-8 sm:px-8 sm:my-8 md:py-14 md:px-14 md:my-12 lg:py-20 lg:px-20 lg:my-16 w-1 h-1 md:w-full md:h-5/6 "
                                :src="`../storage/app/public/images/carousels/secondaries_images/${item.secondary_image}`" alt="item.secondary_image">
                            </template>
                        </div>
                    </div>
                </template>
                <template x-if="item.link_redirect">
                    <a :href="`${item.link_redirect}`" class="grid sm:grid-cols-4 md:grid-cols-6">
                        <div class="cols-span-1"></div>
                        <div class="mx-3 sm:col-span-2 md:col-span-3 mt-52 sm:mt-52 md:mt-52 lg:mt-72 lg:mb-72">
                            <h3 class="mt-8 mb-20 w-full text-lg sm:text-xl md:text-2xl font-bold text-white drop-shadow-xl shadow-black"
                                x-text="item.subtitle"></h3>
                        </div>
                        <div class="cols-span-1 sm:cols-span-1 md:col-span-2"></div>
                    </a>
                </template>
            </div>
        </template>
        <template x-if="!item.selected">
            <div :style="`background-image: url('../storage/app/public/images/carousels/background/${item.image}'); background-size: cover; background-repeat: no-repeat; background-position: center center;`">
                <div class="grid sm:grid-cols-4 md:grid-cols-6">
                    <div class="cols-span-1"></div>
                    <div class="mx-3 sm:col-span-2 md:col-span-3 mt-28 sm:mt-28 md:mt-28">
                        <h1 class="w-full text-2xl sm:text-3xl md:text-6xl font-bold text-white drop-shadow-xl shadow-black"
                            x-text="item.title"></h1>
                        <h3 class="mt-8 mb-20 w-full text-lg sm:text-xl md:text-2xl font-bold text-white drop-shadow-xl shadow-black"
                            x-text="item.subtitle"></h3>
                    </div>
                    <div class="cols-span-1 sm:cols-span-1 md:col-span-2"></div>
                </div>
            </div>
        </template>
    </template>

    <!-- <img class="h-4/5 w-full object-cover object-center" :src="images[selected]" alt="mountains" /> -->
    <button @click="selected = clickPrevious()"
        class="opacity-0 hover:opacity-100 absolute top-0 bottom-0 flex items-center justify-center p-5 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
        type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="inline-block bg-no-repeat" aria-hidden="true"></span>
        <span class="text-gray-50 ml-3">
            <i class="w-10 h-10 fa-solid fa-angle-left"></i>
        </span>
    </button>
    <button @click="selected = clickNext()"
        class="opacity-0 hover:opacity-100 absolute top-0 bottom-0 flex items-center justify-center p-5 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
        type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="inline-block bg-no-repeat" aria-hidden="true"></span>
        <span class="text-gray-50 mr-3">
            <i class="w-10 h-10 fa-solid fa-angle-right"></i>
        </span>
    </button>
    <div class="absolute bottom-0 w-full p-4 flex justify-center space-x-2">
        <template x-for="(title,index) in carousel" :key="index">
            <button @click="selected = index"
                :class="{'bg-gray-300': selected == index, 'bg-gray-500': selected != index}"
                class="h-2 w-2 rounded-full hover:bg-gray-300 ring-2 ring-gray-300"></button>
        </template>
    </div>
</div>
<div x-data="news()" class="relative">
    <div class="flex flex-wrap w-full md:w-11/12 mx-0 mt-0 md:mt-4 lg:-mt-20 md:mx-8 lg:mx-11 xl:mx-14 2xl:mx-16 md:rounded-md bg-white/70 dark:bg-gray-800 backdrop-blur-lg shadow-sm shadow-gray-700">
        <div class="grid grid-cols-1 sm:grid-cols-3 mx-0 md:mx-12 lg:mx-24 xl:mx-32 2xl:mx-44 mt-20">
            <div class="col-span-1 sm:border-r-4 border-rose-600 dark:border-rose-300">
                <div class="mx-3">
                    <div class="text-center">
                        <button type="button"
                            class="text-white bg-rose-600 dark:bg-rose-300 hover:bg-rose-900 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:hover:bg-rose-600 focus:outline-none dark:focus:ring-rose-900">
                            <i class="fa-solid fa-star"></i>
                        </button>
                    </div>
                    <h1 class="text-4xl font-extrabold text-center text-rose-600 dark:text-red-300">
                        Lorem
                    </h1>
                    <p
                        class="text-justify font-semibold text-gray-800 dark:text-white mx-6 mb-6 sm:mx-0 sm:mb-0">
                        Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Molestias excepturi tempore unde
                        adipisci, nesciunt fugiat voluptatibus perspiciatis labore incidunt in asperiores
                        ipsa
                        consequuntur odit similique quia saepe deleniti molestiae quisquam?</p>
                </div>
                <div class="sm:hidden md:hidden border-b-4 border-rose-600 dark:border-rose-300 mb-6 mx-8">
                </div>
            </div>
            <div class="col-span-1 sm:border-r-4 border-rose-600 dark:border-rose-300">
                <div class="mx-3">
                    <div class="text-center">
                        <button type="button"
                            class="text-white bg-rose-600 dark:bg-rose-300 hover:bg-rose-900 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:hover:bg-rose-600 focus:outline-none dark:focus:ring-rose-900">
                            <i class="fa-solid fa-check-circle"></i>
                        </button>
                    </div>
                    <h1 class="text-4xl font-extrabold text-center text-rose-600 dark:text-red-300">
                        Odit
                    </h1>
                    <p
                        class="text-justify font-semibold text-gray-800 dark:text-white mx-6 mb-6 sm:mx-0 sm:mb-0">
                        Lorem ipsum, dolor
                        sit amet consectetur adipisicing elit. Quidem voluptatem, velit
                        necessitatibus, animi ipsum sit earum sed omnis distinctio deserunt, fugit
                        temporibus
                        illo vitae odio enim porro. Veritatis, ipsa accusamus.</p>
                </div>
                <div class="sm:hidden md:hidden border-b-4 border-rose-600 dark:border-rose-300 mb-6 mx-8">
                </div>
            </div>
            <div class="col-span-1">
                <div class="mx-3">
                    <div class="text-center">
                        <button type="button"
                            class="text-white bg-rose-600 dark:bg-rose-300 hover:bg-rose-900 focus:ring-4 focus:ring-rose-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:hover:bg-rose-600 focus:outline-none dark:focus:ring-rose-900">
                            <i class="fa-solid fa-house"></i>
                        </button>
                    </div>
                    <h1 class="text-4xl font-extrabold text-center text-rose-600 dark:text-red-300">
                        Corporis
                    </h1>
                    <p
                        class="text-justify font-semibold text-gray-800 dark:text-white mx-6 mb-6 sm:mx-0 sm:mb-0">
                        Lorem ipsum dolor
                        sit amet, consectetur adipisicing elit. Quia quo, temporibus ipsa
                        voluptates eligendi rerum perspiciatis modi voluptate architecto, possimus
                        laboriosam
                        nostrum delectus debitis eaque corporis enim! Ea, odit tenetur!</p>
                </div>
            </div>
        </div>
        <div class="my-20">
            <h1 class="text-rose-500 text-4xl 2xl:text-6xl font-medium text-center">Noticias</h1>
            <div class="xl:flex mx-5 md:mx-20 xl:mx-20 2xl:mx-20 mt-8 gap-4">
                <template x-for="n1 in show_last_news_1()">
                    <div class="rounded-xl bg-white dark:bg-gray-800 shadow-xl shadow-gray-200 dark:shadow-gray-200 mb-6 xl:mb-0 w-full xl:w-1/4">
                        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-1">
                            <div class="col-span-1">
                                <img class="w-full rounded-t-xl lg:rounded-r-none lg:rounded-l-xl xl:rounded-b-none xl:rounded-t-xl"
                                :src="`../storage/app/public/images/news/background/${n1.background}`" alt="news-1">
                            </div>
                            <div class="col-span-1">
                                <div class="mx-4 mt-2 mb-4 lg:mb-0 xl:mb-6">
                                    <h4 class="text-gray-900 text-xl text-left font-semibold 2xl:font-bold" x-text="n1.title"></h4>
                                    <p class="mt-2 text-gray-800 text-sm 2xl:text-base font-light 2xl:font-normal text-justify" x-text="n1.subtitle"></p>
                                    <div class="mt-2 xl:mt-4">
                                        <a :href="`{{asset('news/show')}}/${n1.slug}`" class="text-blue-500 hover:text-purple-800 font-bold">Leer más...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <div class="xl:flex mx-5 md:mx-20 xl:mx-20 2xl:mx-20 mt-4 gap-4">
                <template x-for="n2 in show_last_news_2()">
                    <div class="rounded-xl bg-white dark:bg-gray-800 shadow-xl shadow-gray-200 dark:shadow-gray-200 mb-6 xl:mb-0 w-full xl:w-1/4">
                        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-1">
                            <div class="col-span-1">
                                <img class="w-full rounded-t-xl lg:rounded-r-none lg:rounded-l-xl xl:rounded-b-none xl:rounded-t-xl"
                                :src="`../storage/app/public/images/news/background/${n2.background}`" alt="news-1">
                            </div>
                            <div class="col-span-1">
                                <div class="mx-4 mt-2 mb-4 lg:mb-0 xl:mb-6">
                                    <h4 class="text-gray-900 text-xl text-left font-semibold 2xl:font-bold" x-text="n2.title"></h4>
                                    <p class="mt-2 text-gray-800 text-sm 2xl:text-base font-light 2xl:font-normal text-justify" x-text="n2.subtitle"></p>
                                    <div class="mt-2 xl:mt-4">
                                        <a :href="`{{asset('news/show')}}/${n2.slug}`" class="text-blue-500 hover:text-purple-800 font-bold">Leer más...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <div class="mx-5 md:mx-20 xl:mx-20 2xl:mx-20 my-8">
                <a class="text-lg text-blue-500 font-extrabold" href="{{route('news-index')}}">
                    <p class="text-center">Ver todas las noticias</p>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    var data = () => {
        return {
            checked_selected: 0,
            carousel: @entangle('carousels'),
            carousel_aux: [],
            carouselSelected() {
                if (this.checked_selected == 0){
                    this.carousel[0]['selected'] = true;
                    this.carousel_aux = this.carousel;
                    this.checked_selected = 1;
                }
            },
            dataCarousel() {
                this.carouselSelected();
                console.log(this.carousel_aux);
                return this.carousel_aux;
            },
            next: 1,
            previous: 0,
            aux_next: 0,
            aux_previous: 0,
            selected: 0,
            clickNext() {
                if (this.next == 1) {
                    this.carousel_aux[this.next].selected = true;
                    this.carousel_aux[this.next - 1].selected = false;
                    this.aux_next = this.next;
                    this.next = this.next + 1;
                    this.previous = this.carousel_aux.length - 1;
                } else {
                    if (this.next == this.carousel_aux.length) {
                        this.carousel_aux[this.carousel.length - 1].selected = false;
                        this.carousel_aux[0].selected = true;
                        this.aux_next = 0;
                        this.next = 1;
                        this.previous = this.carousel_aux.length - 1;
                    } else {
                        this.carousel_aux[this.next].selected = true;
                        this.carousel_aux[this.next - 1].selected = false;
                        this.aux_next = this.next;
                        this.next = this.next + 1;
                        this.previous = this.aux_next - 1;
                    }
                }
                return this.aux_next;
            },
            clickPrevious() {
                if (this.next == 1) {
                    this.carousel_aux[this.carousel_aux.length - 1].selected = true;
                    this.carousel_aux[this.next - 1].selected = false;
                    this.aux_previous = this.carousel_aux.length - 1;
                    this.previous = this.aux_previous - 1;
                    this.next = 0;
                } else {
                    this.carousel_aux[this.previous].selected = true;
                    this.carousel_aux[this.previous + 1].selected = false;
                    this.aux_previous = this.previous;
                    this.previous = this.previous - 1;
                    this.next = this.aux_previous + 1;
                }
                return this.aux_previous;
            }

        };
    };

    var news = () => {
        return {
            last_news: @entangle('news'),
            last_news_aux_1: [],
            last_news_aux_2: [],
            index_aux_2: 0,
            divide_news() {
                for (var index = 0; index < this.last_news.length; index++) {
                    if (index < 4) {
                        this.last_news_aux_1[index] = this.last_news[index];
                    }
                }
                for (var index = 0; index < this.last_news.length; index++) {
                    if (index >= 4) {
                        this.last_news_aux_2[this.index_aux_2] = this.last_news[index];
                        this.index_aux_2 = this.index_aux_2 + 1;
                        if (this.index_aux_2 == 4) {
                            break;
                        }
                    }
                    if (this.index_aux_2 == 4) {
                        break;
                    }
                }
                this.index_aux_2 = 0;
            },
            show_last_news_1() {
                this.divide_news();
                console.log('ultimas noticias 1: ', this.last_news_aux_1);
                return this.last_news_aux_1;
            },
            show_last_news_2() {
                this.divide_news();
                console.log('ultimas noticias 2: ', this.last_news_aux_2);
                return this.last_news_aux_2;
            }
        }
    };

</script>
