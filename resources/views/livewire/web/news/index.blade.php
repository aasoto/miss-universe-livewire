<div x-data="showNews()">
    <!-- Cover -->
    <div class="flex flex-col justify-center items-center w-full min-h-[384px] max-h-screen"
        style="background-image: url('../../storage/app/public/images/news/fondo-pink.svg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <div class="w-full h-20"></div>
        <h1 class="mx-10 my-5 z-10 text-center text-2xl iPhoneSE:text-3xl md:text-5xl font-bold text-white">
            Listado de Noticias
        </h1>
        <h3 class="mx-10 mt-5 mb-16 z-10 text-center text-2xl iPhoneSE:text-xl md:text-3xl font-bold text-white">
            Listado general con todas las noticias de publicadas en la página
        </h3>
    </div>
    <!-- End of Cover -->
    <!-- Cuerpo página -->
    <section
        class="mt-0 md:-mt-8 lg:-mt-14 mx-0 md:mx-7 pt-12 md:pt-32 pb-20 backdrop-blur-none md:backdrop-blur-xl bg-white/50 dark:bg-slate-800/70 rounded-none md:rounded-md shadow-none md:shadow-lg md:shadow-gray-400 dark:md:shadow-black/20">
        <div class="pt-8 text-center">
            <input @change="searching=true; typing();" x-model="search" type="text" placeholder="Buscar..."
                class="w-3/6 rounded-full bg-transparent px-4 py-2 border border-gray-400 text-gray-400 focus:border-rose-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50">
            <input x-model="num_results" type="range" value="10" min="10" max="100" step="10"
                class="w-11/12 h-2 mt-6 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
        </div>
        <div x-show="results_1">
            <div class="grid grid-cols-1 2xl:grid-cols-2 gap-5 mx-5 mt-5 md:mx-20">
                <template x-for="news in current_page">
                    <div class="col-span-1">
                        <a :href="`{{ asset('news/show') }}/${news.slug}`">
                            <div
                                class="rounded-lg h-auto md:h-60 shadow-lg hover:shadow-black/20 hover:scale-[1.02] transition duration-200">
                                <div class="flex flex-col md:flex-row h-full">
                                    <div class="basis-1/2 md:basis-1/3">
                                        <img class="rounded-t-lg md:rounded-l-lg md:rounded-tr-none w-full h-full object-cover object-center cursor-pointer"
                                            :src="`../../storage/app/public/images/news/background/${news.background}`" alt="">
                                    </div>
                                    <div class="basis-1/2 md:basis-2/3 px-5 py-3">
                                        <h2 class="text-lg sm:text-xl md:text-2xl mb-4 font-medium text-left hover:text-rose-700 dark:hover:text-rose-400 hover:underline cursor-pointer"
                                            x-text="news.id +' - '+news.title">
                                        </h2>
                                        <p class="text-base text-justify pb-4 cursor-pointer"
                                            x-text="news.subtitle">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </template>
            </div>
            <div class="flex items-center justify-center text-center mt-24">
                <button @click="previous()" class="rounded-l-full px-2 md:px-4 py-1 md:py-2 border-2 hover:border-0 hover:scale-110 border-gray-600 dark:border-white bg-transparent hover:bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600 text-gray-600 dark:text-white hover:text-white text-sm md:text-lg font-medium hover:font-bold transition duration-200">
                    Anterior
                </button>
                <template x-for="page in count_pages">
                    <button @click="jump(page.jump)" class="px-2 md:px-4 py-1 md:py-2 border-y-2 border-r-2 hover:border-0 hover:scale-110 border-gray-600 dark:border-white bg-transparent hover:bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600 text-gray-600 dark:text-white hover:text-white text-sm md:text-lg font-medium hover:font-bold transition duration-200"
                        x-text="page.current">
                    </button>
                </template>
                <button @click="next()" class="rounded-r-full px-2 md:px-4 py-1 md:py-2 border-y-2 border-r-2 hover:border-0 hover:scale-110 border-gray-600 dark:border-white bg-transparent hover:bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600 text-gray-600 dark:text-white hover:text-white text-sm md:text-lg font-medium hover:font-bold transition duration-200">
                    Siguiente
                </button>
            </div>
        </div>
        <div x-show="results_2">
            <div class="grid grid-cols-1 2xl:grid-cols-2 gap-5 mx-5 mt-5 md:mx-20">
                <template x-for="n in result_searching">
                    <div class="col-span-1">
                        <a :href="`{{ asset('news/show') }}/${n.slug}`">
                            <div
                                class="rounded-lg h-auto md:h-60 shadow-lg hover:shadow-black/20 hover:scale-[1.02] transition duration-200">
                                <div class="flex flex-col md:flex-row h-full">
                                    <div class="basis-1/2 md:basis-1/3">
                                        <img class="rounded-t-lg md:rounded-l-lg w-full h-full object-cover object-center cursor-pointer"
                                            :src="`../../storage/app/public/images/news/background/${n.background}`" alt="">
                                    </div>
                                    <div class="basis-1/2 md:basis-2/3 px-5 py-3">
                                        <h2 class="text-lg sm:text-xl md:text-2xl mb-4 font-medium text-left hover:text-rose-700 dark:hover:text-rose-400 hover:underline cursor-pointer"
                                            x-text="n.id +' - '+n.title">
                                        </h2>
                                        <p class="text-base text-justify pb-4 cursor-pointer"
                                            x-text="n.subtitle">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </template>
            </div>
        </div>
    </section>
<script>
    function showNews() {
        return {
            search: '',
            searching: false,
            num_results: @entangle('num_results'),
            results_1: true,
            results_2: false,
            result_searching: @entangle('result_searching'),
            count: @entangle('count'),
            pages: @entangle('pages'),
            current_page: @entangle('current_page'),
            next_id: @entangle('next_id'),
            count_pages: @entangle('count_pages'),
            typing() {
                if (this.searching) {
                    Livewire.emit("searching", this.search);
                    this.results_1 = false;
                    this.results_2 = true;
                }
                this.searching = false;
            },
            next() {
                Livewire.emit("show_page", this.next_id, "[");
            },
            previous() {
                previous = this.next_id + (this.num_results * 2);
                console.log('previous: ', previous);
                Livewire.emit("show_page", previous, "[");
            },
            jump(jump) {
                console.log("jump: ", jump);
                Livewire.emit("show_page", jump, "[");
            }
        }
    }
</script>
