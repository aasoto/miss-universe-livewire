<x-guest-layout>
    <h1 class="mb-3 sm:mb-5 text-xl sm:text-3xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
        {{__('Login')}}
    </h1>
    <div class="border-t border-gray-400 mx-5 sm:mx-10">
        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <input class="text-sm sm:text-base border dark:bg-transparent border-gray-400 rounded-md sm:rounded-lg my-5 px-2 py-1 sm:py-2 w-full focus:text-gray-500 dark:focus:text-white"
                    placeholder="{{__('Email')}}" id="email" type="email" name="email" required autofocus>
                <input class="text-sm sm:text-base border dark:bg-transparent border-gray-400 rounded-md sm:rounded-lg mb-5 px-2 py-1 sm:py-2 w-full focus:text-gray-500 dark:focus:text-white"
                    placeholder="{{ __('Password') }}" id="password" type="password" name="password" required autocomplete="current-password">
            </div>

            <div class="flex flex-col sm:flex-row">
                <div class="basis-1/2 mb-3 sm:mb-0 flex flex-col justify-center items-center">
                    <label for="remember_me" class="text-gray-800 dark:text-white text-xs xl:text-base">
                        <input id="remember_me" name="remember" type="checkbox" class="accent-rose-700 dark:accent-rose-300" checked>
                        {{ __('Remember me') }}
                    </label>
                </div>
                <div class="basis-1/2 text-center">
                    <button type="submit" class="rounded-full px-5 py-2 text-white text-xs lg:text-base font-bold bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-400 dark:to-rose-700 hover:scale-110 transition">Iniciar sesión</button>
                </div>
            </div>
            <div class="flex flex-col iPhoneSE:flex-row justify-center items-center mt-5">
                <label class="text-gray-800 dark:text-white text-xs xl:text-base font-light" for="">{{__('Forgot your password?')}}</label>
                @if (Route::has('password.request'))
                    <a class="ml-2 text-rose-700 dark:text-rose-300 hover:text-rose-900 dark:hover:text-rose-500 hover:underline text-xs xl:text-base font-medium"
                        href="{{ route('password.request') }}">
                        {{__('Click here.')}}
                    </a>
                @endif
            </div>
{{-- ------------------------------------------------------------------------ --}}
            {{-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div> --}}
        </form>
    </div>
</x-guest-layout>
