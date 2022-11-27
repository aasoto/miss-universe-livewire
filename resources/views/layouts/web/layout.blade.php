<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>The Beauty Pageant Project</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite([
            'resources/css/app.css',
            'resources/js/app.js'
        ])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="">
        <!-- Page Content -->
        <div x-data="switch_dark_mode()" x-init="dark_mode = JSON.parse(localStorage.getItem('dark_mode'));
            $watch('dark_mode', value => localStorage.setItem('dark_mode', JSON.stringify(value)))">
            <div :class="{'dark': dark_mode === true}">
                <div class="relative bg-white dark:bg-slate-800 text-slate-800 dark:text-white">
                    {{-- Navigation --}}
                    @livewire('web.navigation.menu')

                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>

        {{--@stack('modals')--}}

        @livewireScripts
        {{-- <script src="../resources/alpinejs/data.js"></script> --}}

    </body>
    <script>
    function switch_dark_mode () {
        return {
            dark_mode: false,
            change_mode(){
                this.dark_mode = !this.dark_mode;
                console.log('dark mode: ', this.dark_mode);
            }
        }
    }
    </script>
</html>
