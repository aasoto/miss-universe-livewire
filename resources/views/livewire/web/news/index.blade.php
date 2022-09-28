<div x-data="showNews()">
    <div class="h-full" style="background-image: url('../../storage/app/public/images/news/cover-1.jpg'); background-size: cover; background-repeat: no-repeat; background-position: center center;">
        <div class="mx-10 md:mx-20 pt-24 lg:pt-32">
            <h1 class="text-center font-bold text-white drop-shadow-lg shadow-black text-2xl md:text-3xl lg:text-5xl">Noticias</h1>
            <h3 class="mt-6 text-center font-semibold md:font-bold text-white drop-shadow-lg shadow-black text-lg md:text-xl lg:text-3xl">Repositorio de noticias</h3>
            <div class="invisible">
                <h1 class="text-left font-bold text-white shadow-lg shadow-gray-800 text-xs md:text-base lg:text-3xl">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem deleniti in ad, maxime, dolorum odit dicta blanditiis error similique, magni voluptatum inventore et eum minus consequatur cupiditate facilis delectus est!</h1>
            </div>
        </div>
    </div>
    <div class="w-full md:w-11/12 mx-0 mt-0 md:mt-4 lg:-mt-20 md:mx-8 lg:mx-11 xl:mx-14 2xl:mx-16 md:rounded-md bg-white/70 dark:bg-gray-800 backdrop-blur-lg shadow-sm shadow-gray-700">
        <div class="pt-8 text-center">
            <input @change="searching=true; typing();" x-model="search" type="text" placeholder="Buscar..." class="w-3/6 py-2 bg-white dark:bg-gray-800 rounded border border-rose-500 hover:border-rose-800 hover:shadow-sm hover:shadow-rose-400 hover:dark:shadow-white focus:shadow-sm focus:shadow-rose-400 dark:focus:shadow-gray-600 focus:border-2 focus:border-rose-800 placeholder:text-gray-500 dark:placeholder:text-gray-200">
            <input x-model="num_results" type="range" value="10" min="10" max="100" step="10" class="w-11/12 h-2 mt-6 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
        </div>
        <div x-show="results_1">
            <template x-for="news in current_page">
                <div class="mx-4 mt-4">
                    <div class="flex flex-col md:flex-row bg-white dark:bg-gray-800 rounded-lg shadow-lg shadow-gray-300 dark:shadow-gray-600">
                        <div class="basis-1/3">
                            <img class="rounded-l-lg w-auto h-auto" :src="`../../storage/app/public/images/news/background/${news.background}`" alt="">
                        </div>
                        <div class="basis-2/3">
                            <h3 class="mt-2 mx-4 text-2xl text-gray-800 dark:text-white font-bold" x-text="news.id +' - '+news.title"></h3>
                            <p class="my-2 mx-4 text-justify text-base text-gray-800 dark:text-white font-light" x-text="news.subtitle"></p>
                            <a :href="`{{asset('news/show')}}/${news.slug}`" class="text-blue-500 hover:text-purple-800 font-bold">Leer más...</a>
                        </div>
                    </div>
                </div>
            </template>
            <div class="my-4">
                <div class="flex flex-row pb-4">
                    <button @click="previous()" class="border-t border-b border-l border-gray-700 bg-gray-200 text-gray-800 rounded-l-lg w-20 h-10">Anterior</button>
                    <template x-for="page in count_pages">
                        <button @click="jump(page.jump)" class="border-l border-t border-b border-gray-700 bg-gray-200 text-gray-800 w-10 h-10" x-text="page.current"></button>
                    </template>
                    <button @click="next()" class="border border-gray-700 bg-gray-200 text-gray-800 rounded-r-lg w-20 h-10">Siguiente</button>
                </div>
            </div>
        </div>
        <div x-show="results_2">
            <template x-for="n in result_searching">
                <div class="mx-4 mt-4">
                    <div class="flex flex-col md:flex-row bg-white dark:bg-gray-800 rounded-lg shadow-lg shadow-gray-300 dark:shadow-gray-600">
                        <div class="basis-1/3">
                            <img class="rounded-l-lg w-auto h-auto" :src="`../../storage/app/public/images/news/background/${n.background}`" alt="">
                        </div>
                        <div class="basis-2/3">
                            <h3 class="mt-2 mx-4 text-2xl text-gray-800 dark:text-white font-bold" x-text="n.title"></h3>
                            <p class="my-2 mx-4 text-justify text-base text-gray-800 dark:text-white font-light" x-text="n.content"></p>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</div>
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
            typing(){
                if(this.searching){
                    Livewire.emit("searching", this.search);
                    this.results_1 = false;
                    this.results_2 = true;
                }
                this.searching = false;
            },
            next(){
                Livewire.emit("show_page", this.next_id, "[");
            },
            previous(){
                previous = this.next_id + (this.num_results * 2);
                console.log('previous: ', previous);
                Livewire.emit("show_page", previous, "[");
            },
            jump(jump){
                console.log("jump: ", jump);
                Livewire.emit("show_page", jump, "[");
            }
        }
    }
</script>
