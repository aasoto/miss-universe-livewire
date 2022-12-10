<div x-data="editions_list()">
    <!-- Cover -->
    <div class="flex flex-col justify-center items-center w-full min-h-[384px] max-h-screen"
        style="background-image: url('../storage/app/public/images/news/fondo-pink.svg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <div class="w-full h-20"></div>
        <h1 class="mx-10 my-5 z-10 text-center text-2xl iPhoneSE:text-3xl md:text-5xl font-bold text-white">
            Listado con todas la ediciones del Miss Universo
        </h1>
    </div>
    <!-- End of Cover -->
    <!-- Cuerpo página -->
    <section class="mt-0 md:-mt-8 lg:-mt-14 mx-0 md:mx-7 pt-12 md:pt-32 pb-20 backdrop-blur-none md:backdrop-blur-xl bg-white/50 dark:bg-slate-800/70 rounded-none md:rounded-md shadow-none md:shadow-lg md:shadow-gray-400 dark:md:shadow-black/20">
        <div class="pt-8 text-center">
            <input @change="searching=true; typing();" x-model="search" type="text" placeholder="Buscar..."
                class="w-3/6 rounded-full bg-transparent px-4 py-2 border border-gray-400 text-gray-400 focus:border-rose-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50">
        </div>
        <div class="grid grid-cols-2 gap-5 px-10">
            <template x-for="edition in editions">
                <div class="col-span-1">
                    <a :href="`editions/${edition.slug}`">
                        <div class="container relative w-full h-72 my-4 rounded-lg cursor-pointer">
                            <img class="rounded-lg w-full h-full object-cover object-top"
                                :src="`../storage/app/public/images/editions/miss-universe/background/${edition.background}`"
                                alt="">
                            <div
                                class="absolute top-0 z-10 bg-gradient-to-t from-black to-transparent rounded-lg w-full h-full">
                            </div>
                            <img class="absolute top-4 right-4 z-20 rounded-lg h-1/3 hover:mt-4 hover:animate-bounce transition"
                                :src="`../storage/app/public/images/editions/miss-universe/logos/${edition.logo}`" alt="">
                            <div class="absolute bottom-2 flex flex-col-reverse z-20 h-2/3 px-3">
                                <p class="text-white font-light text-base" x-html="edition.description"></p>
                                <h2 class="text-white font-bold text-2xl" x-text="edition.name"></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </template>
        </div>
    </section>
</div>
<script>
    function editions_list(){
        return {
            editions: @entangle('editions'),
            result_searching: @entangle('result_searching'),
            search: '',
            searching: false,
            typing() {
                if (this.searching) {
                    Livewire.emit("searching", this.search)
                }
                this.editions = this.result_searching
            }
        }
    }
</script>
