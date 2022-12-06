<x-guest-layout>
    {{-- @php
        dd($countries);
    @endphp --}}
    <h1 class="mb-3 text-xl sm:text-3xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-300 dark:to-rose-600">
        {{__('Register')}}
    </h1>
    <div class="border-t border-gray-400 mx-5 sm:mx-10">
        <x-jet-validation-errors class="mb-4" />
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <input class="text-sm sm:text-base border dark:bg-transparent border-gray-400 rounded-md sm:rounded-lg mt-2 px-2 py-1 sm:py-2 w-full focus:text-gray-500 dark:focus:text-white"
                type="text"
                placeholder="{{ __('Name') }}" id="name" name="name" required autofocus autocomplete="name">

            <input class="text-sm sm:text-base border dark:bg-transparent border-gray-400 rounded-md sm:rounded-lg mt-2 px-2 py-1 sm:py-2 w-full focus:text-gray-500 dark:focus:text-white"
                type="email"
                placeholder="{{ __('Email') }}"id="email" name="email" required>

            <input class="text-sm sm:text-base border dark:bg-transparent border-gray-400 rounded-md sm:rounded-lg mt-2 px-2 py-1 sm:py-2 w-full focus:text-gray-500 dark:focus:text-white"
                type="password"
                placeholder="{{ __('Password') }}" id="password" name="password" required autofocus autocomplete="new-password">

            <input class="text-sm sm:text-base border dark:bg-transparent border-gray-400 rounded-md sm:rounded-lg mt-2 px-2 py-1 sm:py-2 w-full focus:text-gray-500 dark:focus:text-white"
                type="password"
                placeholder="{{ __('Confirm Password') }}" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <label class="text-gray-800 dark:text-white text-xs xl:text-base">
                        <div class="flex items-center">
                            <input type="checkbox" name="terms" id="terms" class="accent-rose-700 dark:accent-rose-300">
                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </label>
                </div>
            @endif

            <div class="flex items-center justify-end my-4">
                <a class="text-rose-700 dark:text-rose-300 hover:text-rose-900 dark:hover:text-rose-500 hover:underline text-xs xl:text-base font-medium" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="ml-4 rounded-full px-5 py-2 text-white text-xs lg:text-base font-bold bg-gradient-to-r from-pink-600 to-rose-900 dark:from-pink-400 dark:to-rose-700 hover:scale-110 transition">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
