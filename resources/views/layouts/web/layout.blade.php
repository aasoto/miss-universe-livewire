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
                    {{-- clases de tailwind css --}}
                    <div x-ignore>
                        <div class="text-slate-500 border-slate-500 bg-slate-500 hover:bg-slate-500"></div>
                        <div class="text-gray-500 border--500 bg-gray-500 hover:bg-gray-500"></div>
                        <div class="text-zinc-500 border-zinc-500 bg-zinc-500 hover:bg-zinc-500"></div>
                        <div class="text-neutral-500 border-neutral-500 bg-neutral-500 hover:bg-neutral-500"></div>
                        <div class="text-stone-500 border-stone-500 bg-stone-500 hover:bg-stone-500"></div>
                        <div class="text-red-500 border-red-500 bg-red-500 hover:bg-red-500"></div>
                        <div class="text-orange-500 border-orange-500 bg-orange-500 hover:bg-orange-500"></div>
                        <div class="text-amber-500 border-amber-500 bg-amber-500 hover:bg-amber-500"></div>
                        <div class="text-yellow-500 border-yellow-500 bg-yellow-500 hover:bg-yellow-500"></div>
                        <div class="text-lime-500 border-lime-500 bg-lime-500 hover:bg-lime-500"></div>
                        <div class="text-green-500 border-green-500 bg-green-500 hover:bg-green-500"></div>
                        <div class="text-emerald-500 border-emerald-500 bg-emerald-500 hover:bg-emerald-500"></div>
                        <div class="text-teal-500 border-teal-500 bg-teal-500 hover:bg-teal-500"></div>
                        <div class="text-cyan-500 border-cyan-500 bg-cyan-500 hover:bg-cyan-500"></div>
                        <div class="text-sky-500 border-sky-500 bg-sky-500 hover:bg-sky-500"></div>
                        <div class="text-blue-500 border-blue-500 bg-blue-500 hover:bg-blue-500"></div>
                        <div class="text-indigo-500 border-indigo-500 bg-indigo-500 hover:bg-indigo-500"></div>
                        <div class="text-violet-500 border-violet-500 bg-violet-500 hover:bg-violet-500"></div>
                        <div class="text-purple-500 border-purple-500 bg-purple-500 hover:bg-purple-500"></div>
                        <div class="text-fuchsia-500 border-fuchsia-500 bg-fuchsia-500 hover:bg-fuchsia-500"></div>
                        <div class="text-pink-500 border-pink-500 bg-pink-500 hover:bg-pink-500"></div>
                        <div class="text-rose-500 border-rose-500 bg-rose-500 hover:bg-rose-500"></div>
                        <div class="text-black border-black bg-black hover:bg-black"></div>
                        <div class="text-white border-white bg-white hover:bg-white"></div>
                    </div>
                    {{-- Footer --}}
                    @livewire('web.footer.menu')
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
