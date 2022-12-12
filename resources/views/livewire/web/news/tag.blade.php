<div x-data="data()">
    <!-- Cover -->
    <div class="flex flex-col justify-center items-center w-full min-h-[384px] max-h-screen"
        style="background-image: url('../../../storage/app/public/images/news/fondo-pink.svg'); background-repeat: no-repeat; background-size: cover; background-position: center;">
        <div class="w-full h-20"></div>
        <h1 class="mx-10 my-5 z-10 text-center text-2xl iPhoneSE:text-3xl md:text-5xl font-bold text-white capitalize"
            x-text="tag">
        </h1>
        <h3 class="mx-10 mt-5 mb-16 z-10 text-center text-2xl iPhoneSE:text-xl md:text-3xl font-bold text-white">
            Listado general de noticias con la etiqueta anterior
        </h3>
    </div>
    <!-- End of Cover -->
    <!-- Cuerpo página -->
    <section
        class="mt-0 md:-mt-8 lg:-mt-14 mx-0 md:mx-7 pt-12 md:pt-32 pb-20 backdrop-blur-none md:backdrop-blur-xl bg-white/50 dark:bg-slate-800/70 rounded-none md:rounded-md shadow-none md:shadow-lg md:shadow-gray-400 dark:md:shadow-black/20">
        <div class="pt-8 text-center">
        </div>
        <div class="grid grid-cols-1 2xl:grid-cols-2 gap-5 mx-5 mt-5 md:mx-20">
            <template x-for="news in tagged_news">
                <div class="col-span-1">
                    <a :href="`{{ asset('news/show') }}/${news.slug}`">
                        <div
                            class="rounded-lg h-auto md:h-60 shadow-lg hover:shadow-black/20 hover:scale-[1.02] transition duration-200">
                            <div class="flex flex-col md:flex-row h-full">
                                <div class="basis-1/2 md:basis-1/3">
                                    <img class="rounded-t-lg md:rounded-l-lg md:rounded-tr-none w-full h-full object-cover object-center cursor-pointer"
                                        :src="`../../../storage/app/public/images/news/background/${news.background}`" alt="">
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
    </section>
</div>
<script>
    function data() {
        return {
            tagged_news: @entangle('tagged_news'),
            tag: @entangle('tag')
        }
    }
</script>
