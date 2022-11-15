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
    $watch('dark_mode', value => localStorage.setItem('dark_mode', JSON.stringify(value)));">
        <div :class="{'dark': dark_mode === true}">
            <div class="py-3 bg-white dark:bg-slate-900 h-auto dark:h-[1350px] text-gray-800 dark:text-white">
                <input type="checkbox" name="hamburger" id="hamburger" class="hidden peer">
                <!-- Sidebar -->
                @livewire('dashboard.pages.side-bar', [
                    'colour' => 'from-cyan-400 dark:from-cyan-300 via-sky-700 dark:via-sky-500 to-blue-800 dark:to-blue-700',
                    'redirect' => '',
                    'list_blur_shadow' => 'group-hover:bg-cyan-100 dark:group-hover:bg-blue-900/30'
                ])
                <!-- cuerpo de la página -->
                <div class="transition w-[96%] sm:w-auto inset-0 translate-x-0 peer-checked:translate-x-[100%] sm:peer-checked:translate-x-[54%] md:peer-checked:translate-x-[45%] lg:peer-checked:translate-x-[34%] xl:peer-checked:translate-x-[27%] 2xl:peer-checked:translate-x-[25%] bg-white dark:bg-slate-900">
                    <!-- navbar -->
                    <div class="h-64">
                        @livewire('dashboard.pages.nav-bar',[
                            'redirect' => '',
                            'check_color' => 'from-cyan-400 dark:from-cyan-300 via-sky-700 dark:via-sky-500 to-blue-800 dark:to-blue-700'
                        ])
                        @livewire('dashboard.pages.cover-image', [
                            'text' => 'List of candidates',
                            'cover_image' => '../../storage/app/public/images/dashboard/cover-images/fondo-azul.svg'
                        ])
                        <!-- main -->
                        <div class="rounded-xl bg-white/70 dark:bg-slate-800/70 backdrop-blur-xl -mt-6 lg:-mt-14 mx-5 sm:mx-8 md:mx-14 px-1 sm:px-4 md:px-10 w-auto shadow-lg">
                            <main>
                                {{ $slot }}
                            </main>
                        </div>
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
