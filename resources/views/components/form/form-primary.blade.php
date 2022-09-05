@props(['submit'])

<div {{ $attributes->merge(['class' => 'flex flex-col sm:justify-center pt-6 sm:pt-0 bg-gray-100'])}}>
    <div class="w-full sm:max-w-4xl mt-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="bg-green-500 py-3">
            <h2 class="text-3xl text-center text-white">{{ $title }}</h2>
        </div>
        <form wire:submit.prevent="{{ $submit }}">
            <div class="px-4 py-5 bg-white sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
