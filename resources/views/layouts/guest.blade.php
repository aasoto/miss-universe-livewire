<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div x-data="data()" x-init="dark_mode = JSON.parse(localStorage.getItem('dark_mode'));
            $watch('dark_mode', value => localStorage.setItem('dark_mode', JSON.stringify(value)))">
            <div :class="{'dark': dark_mode === true}">
                <div class="bg-white dark:bg-slate-800">
                    <div class="relative">
                        <div class="absolute z-20 ml-10 mt-36 sm:ml-14 sm:mt-24 smd:ml-20 md:ml-7 md:mt-7">
                            <a href="../index.html">
                                <div class="block dark:hidden">
                                    <img class="hidden md:block w-[200px] md:w-auto h-[60px] md:h-[40px] -my-7 md:my-0"
                                        :src="`${logo_modo_diurno}`" alt="">
                                    <img class="block md:hidden w-[200px] md:w-auto h-[60px] md:h-[40px] -my-7 md:my-0"
                                        :src="`${logo_modo_nocturno}`" alt="">
                                </div>
                                <div class="hidden dark:block">
                                    <img class="w-[200px] md:w-auto h-[60px] md:h-[40px] -my-7 md:my-0"
                                        :src="`${logo_modo_nocturno}`" alt="">
                                </div>
                            </a>
                        </div>
                        <div class="grid place-items-center h-auto md:h-screen">
                            <div class="h-screen w-full flex justify-center items-center">
                                <div class="sm:container w-full md:w-10/12 h-5/6 mt-11 sm:mt-14 md:mt-0">
                                    <div class="flex flex-col-reverse md:flex-row h-full">
                                        <div class="basis-0 md:basis-1/2 flex justify-center items-center">
                                            <div class="z-20 -mt-28 md:mt-0 mb-10 md:mb-0 mr-0 md:-mr-52 lg:-mr-72 xl:-mr-96 flex flex-col justify-center items-center w-4/6 md:w-full lg:w-5/6 h-[290px] sm:h-[350px] bg-white/70 dark:bg-slate-800/70 backdrop-blur-xl shadow-lg rounded-xl">
                                                {{ $slot }}
                                            </div>
                                        </div>
                                        <div class="basis-0 md:basis-1/2 sm:container flex justify-center items-center">
                                            <div class="relative w-full md:w-11/12 h-[300px] md:h-full xl:h-5/6 mx-4 md:mx-0">
                                                <template class="w-full h-full" x-for="image in images">
                                                    <div class="w-full h-full" x-show="image.show">
                                                        <img class="-z-10 w-full h-full rounded-xl object-cover object-center blur-xl"
                                                            :src="`${image.image}`" alt="">
                                                        <img class="absolute top-0 z-10 w-full h-full rounded-xl object-cover object-center"
                                                            :src="`${image.image}`" alt="">
                                                    </div>
                                                </template>
                                                <div x-init="change_image()"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        function data() {
            return {
                logo_modo_diurno: '../storage/app/public/images/dashboard/nav-logo/logo-BPproject-horizontal-fuente.svg',
                logo_modo_nocturno: '../storage/app/public/images/dashboard/nav-logo/logo-BPproject-horizontal-fuente-blanco.svg',
                images: [
                    {
                        image: '../storage/app/public/images/login/image-1.jpg',
                        show: true
                    }, {
                        image: '../storage/app/public/images/login/image-2.jpg',
                        show: false
                    }, {
                        image: '../storage/app/public/images/login/image-3.jpg',
                        show: false
                    }
                ],
                change_image() {
                    i = 0
                    setInterval(() => {
                        if (i == 0) {
                            this.images[this.images.length-1].show = false;
                            this.images[i].show = true;
                            i++;
                        } else {
                            this.images[i-1].show = false;
                            this.images[i].show = true;
                            i++;
                        }
                        if (i == this.images.length) {
                            i = 0;
                        }
                    }, 5000);
                }
            }
        }
    </script>
</html>
