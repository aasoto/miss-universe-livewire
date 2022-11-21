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
        @vite(['resources/css/app.css', 'resources/js/app.js', 'node_modules/flag-icons/css/flag-icons.min.css', 'resources/fontawesome-free-6.2.0-web/css/all.min.css', 'resources/fontawesome-free-6.2.0-web/js/all.min.js'])

        <!-- Flags icons -->
        {{--<link href="../../node_modules/flag-icons/css/flag-icons.min.css" rel="stylesheet" />--}}

        <!-- Styles -->
        @livewireStyles
    </head>
    <body x-data="data()" x-init="dark_mode = JSON.parse(localStorage.getItem('dark_mode'));
    $watch('dark_mode', value => localStorage.setItem('dark_mode', JSON.stringify(value)))">
        <div :class="{'dark': dark_mode === true}">
            <div class="py-3 min-h-screen bg-white dark:bg-slate-900 text-gray-800 dark:text-white">
                <input type="checkbox" name="hamburger" id="hamburger" class="peer hidden">
                <!-- Sidebar -->
                @livewire('dashboard.pages.side-bar', [
                    'colour' => 'from-lime-400 dark:from-lime-300 via-lime-700 dark:via-lime-500 to-green-800 dark:to-green-700',
                    'redirect' => '../',
                    'list_blur_shadow' => 'group-hover:bg-lime-200 dark:group-hover:bg-lime-900/30'
                ])
                <div x-ignore>
                    <div class="from-yellow-400 dark:from-yellow-300 via-yellow-500 dark:via-yellow-400 to-orange-500 dark:to-orange-400"></div>
                    <div class="group-hover:bg-yellow-200 dark:group-hover:bg-yellow-900/30"></div>
                    <div class="bg-gradient-to-r from-lime-500 to-green-800"></div>
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-600"></div>
                    <div class="bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-700"></div>
                </div>
                <!-- cuerpo de la página -->
                <div class="w-[94%] sm:w-auto transition inset-0 translate-x-0 peer-checked:translate-x-[100%] sm:peer-checked:translate-x-[54%] md:peer-checked:translate-x-[45%] lg:peer-checked:translate-x-[34%] xl:peer-checked:translate-x-[27%] 2xl:peer-checked:translate-x-[25%] bg-white dark:bg-slate-900">
                    <!-- navbar -->
                    @livewire('dashboard.pages.nav-bar', [
                        'redirect' => '../',
                        'check_color' => 'from-lime-400 dark:from-lime-300 via-lime-700 dark:via-lime-500 to-green-800 dark:to-green-700'
                    ])
                    @livewire('dashboard.pages.cover-image', [
                        'cover_image' => '../../../storage/app/public/images/dashboard/cover-images/fondo-verde.svg'
                    ])
                    <div class="rounded-xl bg-white/70 dark:bg-slate-800/70 -mt-6 lg:-mt-14 backdrop-blur-xl mx-3.5 iPhoneSE:mx-5 sm:mx-8 md:mx-16 lg:mx-32 px-10 w-[90%] sm:w-auto translate-x-3 sm:translate-x-0 shadow-lg">
                        <main>
                            {{ $slot }}
                        </main>
                    </div>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
    <script>
        function data() {
            return {
                dark_mode: false,
                change_mode(){
                    this.dark_mode = !this.dark_mode;
                },
            }
        }
    </script>
</html>
