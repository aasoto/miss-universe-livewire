<nav
    class="sticky md:absolute top-5 left-0 right-0 z-10 w-auto ml-3 sm:ml-8 mr-3 sm:mr-8 mb-5 h-14 bg-white/90 md:bg-white/70 dark:bg-slate-800/70 shadow-lg translate-x-2.5 sm:translate-x-0 rounded-full">
    <div class="grid place-items-center h-auto">
        <div class="w-11/12 flex flex-row justify-between items-center">
            <div class="w-1/3 flex flex-row items-center">
                <div class="basis-1/4">
                    <label for="hamburger" class="peer-checked:hamburger cursor-pointer transition rounded">
                        <div class="h-0.5 w-6 bg-gray-600 dark:bg-white transition"></div>
                        <div class="mt-2 h-0.5 w-6 bg-gray-600 dark:bg-white transition"></div>
                    </label>
                </div>
                <div class="basis-3/4 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img class="ml-2 sm:ml-0 block dark:hidden h-12 pt-2 transition"
                            src="../../../storage/app/public/images/dashboard/nav-logo/logo-BPproject-horizontal-fuente.svg" alt="">
                        <img class="ml-2 sm:ml-0 hidden dark:block h-12 pt-2 transition"
                            src="../../../storage/app/public/images/dashboard/nav-logo/logo-BPproject-horizontal-fuente-blanco.svg" alt="">
                    </a>
                </div>
            </div>
            <div class="w-1/3 flex flex-row gap-5 justify-end items-center">
                <div class="group">
                    <div class="flex flex-row text text-lg text-gray-800 dark:text-white font-medium">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <img class="rounded-full h-7 w-7" src="../../../storage/app/public/{{ $profile_photo }}" alt="{{ $name }}">
                            <p class="mx-5"><span class="hidden sm:block capitalize">{{ $role }}</span></p>
                        @else
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                    {{ $name }}
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        @endif
                    </div>
                    <div class="absolute -translate-x-8 w-60 h-8 bg-transparent"></div>
                    <div
                        class="absolute -translate-x-20 md:-translate-x-8 hidden group-hover:block mt-8 w-60 bg-white/70 dark:bg-slate-800/70 backdrop-blur-xl rounded-lg shadow-lg">
                        <div class="p-3 flex justify-center items-center">
                            <img class="w-20 h-20 rounded-full object-cover object-center" src="../../../storage/app/public/{{ $profile_photo }}"
                                alt="">
                        </div>
                        <div class="p-3">
                            <h1 class="text-xl text-center font-semibold text-gray-800 dark:text-white">
                                {{ $name }}
                            </h1>
                            <h5 class="text-xs text-left font-light mt-4 text-gray-500 dark:text-white/70">
                                {{__('Manage Team')}}
                            </h5>
                            <div class="border-b border-gray-400 mb-3"></div>
                            <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                <p class="text-base font-normal text-gray-800 dark:text-white">
                                    {{__('Team Settings')}}
                                </p>
                            </a>
                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <a href="{{ route('teams.create') }}">
                                <p class="text-base font-normal text-gray-800 dark:text-white">
                                    {{__('Create New Team')}}
                                </p>
                            </a>
                            @endcan
                            <h5 class="text-xs text-left font-light mt-4 text-gray-500 dark:text-white/70">
                                {{__('Switch teams')}}
                            </h5>
                            <div class="border-b border-gray-400 mb-3"></div>
                            <p class="text-base font-normal text-gray-800 dark:text-white">
                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-jet-switchable-team :team="$team" />
                                @endforeach
                            </p>
                            <h5 class="text-xs text-left font-light mt-4 text-gray-500 dark:text-white/70">
                                {{__('Manage Account')}}
                            </h5>
                            <div class="border-b border-gray-400 mb-3"></div>
                            <a href="{{ route('profile.show') }}">
                                <p class="text-base font-normal text-gray-800 dark:text-white">
                                    {{__('Profile')}}
                                </p>
                            </a>
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <a href="{{ route('api-tokens.index') }}">
                                    <p class="text-base font-normal text-gray-800 dark:text-white">
                                        {{__('API Tokens')}}
                                    </p>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-center items-center">
                    <label for="dark_check" class="inline-flex relative items-center cursor-pointer">
                        <input @click="change_mode()" type="checkbox" :value="dark_mode" id="dark_check"
                            class="sr-only peer">
                        <div
                            class="w-9 h-5 bg-gray-200 peer-focus:outline-none dark:peer-focus:ring-lime-700 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-lime-500 transition duration-200">
                        </div>
                        <div x-show="!dark_mode" x-transition>
                            <span
                                class="ml-3 text-base font-medium hover:scale-110 transition text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-white"><i
                                    class="fa-regular fa-sun"></i></span>
                        </div>
                        <div x-show="dark_mode" x-transition>
                            <span
                                class="ml-3 text-base font-medium hover:scale-110 transition text-gray-600 dark:text-white hover:text-gray-900 dark:hover:text-white"><i
                                    class="fa-solid fa-moon"></i></span>
                        </div>
                    </label>
                </div>
                <div class="text-right">
                    <a href="../../login.html">
                        <i class="text-gray-800 dark:text-white fa-solid fa-right-from-bracket"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
