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
    <body class="">
        @php
            $url = url()->current();
        @endphp
        <div x-data="data()" x-init="dark_mode = JSON.parse(localStorage.getItem('dark_mode'));
            $watch('dark_mode', value => localStorage.setItem('dark_mode', JSON.stringify(value)))">
            <div :class="{'dark': dark_mode === true}">
                <div class="py-5 bg-white dark:bg-slate-900 text-gray-800 dark:text-white">
                    <input type="checkbox" name="hamburger" id="hamburger" class="hidden peer">
                    <!-- Sidebar -->
                    @livewire('dashboard.home.side-bar')
                    <!-- cuerpo de la página -->
                    <div class="transition inset-0 translate-x-0 peer-checked:translate-x-[100%] sm:peer-checked:translate-x-[54%] md:peer-checked:translate-x-[45%] lg:peer-checked:translate-x-[34%] xl:peer-checked:translate-x-[27%] 2xl:peer-checked:translate-x-[25%] bg-white dark:bg-slate-900">
                        <!-- navbar -->
                        @livewire('dashboard.home.nav-bar')
                        <!-- inicio -->
                        @livewire('dashboard.home.home-card')
                    </div>
                </div>
            </div>
        </div>

        {{-- <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main>
                {{ $slot }}
            </main>
        </div> --}}

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
