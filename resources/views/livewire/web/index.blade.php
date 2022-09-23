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
        class="opacity-0 hover:opacity-100 absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0"
        type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="inline-block bg-no-repeat" aria-hidden="true"></span>
        <span class="text-gray-50 ml-3">
            <i class="fa-solid fa-angle-left"></i>
        </span>
    </button>
    <button @click="selected = clickNext()"
        class="opacity-0 hover:opacity-100 absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0"
        type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="inline-block bg-no-repeat" aria-hidden="true"></span>
        <span class="text-gray-50 mr-3">
            <i class="fa-solid fa-angle-right"></i>
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
<div class="flex flex-wrap -mt-12 w-11/12 mx-auto bg-white dark:bg-gray-800">
    <div class="rounded-md bg-white/70 dark:bg-gray-700 backdrop-blur-sm">
        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-5 mt-20">
            <div class="w-1 sm:w-1 md:w-full col-span-0 md:col-span-1">
            </div>
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
            <div class="hidden sm:hidden md:col-span-1">
            </div>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio iste, et corporis quam hic alias
            maiores eius, maxime cumque voluptate fugit aperiam nesciunt ad incidunt quisquam quos ducimus
            quas libero!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, quisquam! Cumque debitis, ducimus
            voluptatum facilis corporis consectetur fugiat facere reiciendis mollitia neque reprehenderit.
            Dolores expedita inventore deserunt, vel magni maiores?</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt a, quam illo sapiente voluptates
            ducimus saepe perspiciatis in atque ipsam quo molestias enim rerum nesciunt! Quo minus
            voluptates tenetur blanditiis.</p>
    </div>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni illum laborum quae beatae fugit explicabo
    alias animi doloremque officia odio, blanditiis facilis totam adipisci! Tenetur fugit omnis esse
    explicabo quo?
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam tenetur, corporis nulla accusantium atque,
    minima amet quis error recusandae, impedit culpa cumque. Maiores beatae magni cum iste quisquam
    blanditiis voluptate!
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius sit consequuntur vel numquam ad illum
    nesciunt laudantium fuga pariatur, libero eveniet magni id repellendus quisquam illo modi hic odio vero.
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente voluptas ullam, officiis nemo numquam
    impedit sint tempore veritatis quis fugiat modi distinctio vel debitis vitae unde pariatur eius quasi
    vero?
    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae, voluptas. Distinctio vel, ipsum
    nisi quia iure consequuntur minima sequi consectetur impedit. Vitae animi quis blanditiis facere
    voluptatem dolorem, quia velit.
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam tenetur quidem quae qui cum. Ex quis
    fugiat harum cumque. Minus dolorum praesentium vel consectetur expedita impedit mollitia illum, nostrum
    recusandae.
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente deleniti, consequuntur molestias a
    quasi error, dolorum molestiae autem incidunt amet voluptatibus consectetur reiciendis, quibusdam vero
    eius aliquam neque numquam voluptate!
    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed sunt tenetur cupiditate enim animi quam
    obcaecati necessitatibus repellendus assumenda, ex aut labore, sit harum iusto vero possimus itaque
    fugit! Illo!
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis porro accusantium totam earum
    tempora? Fugit repudiandae eveniet ipsam dolorum doloremque, ex natus alias est? Ad aliquid delectus ea
    eaque modi.
    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi vero architecto, nesciunt aliquam
    voluptatum totam! Odit ea deleniti hic incidunt sed, non assumenda. Culpa quam accusamus consequuntur
    minima veniam officiis.
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
            },
        };
    };
</script>
