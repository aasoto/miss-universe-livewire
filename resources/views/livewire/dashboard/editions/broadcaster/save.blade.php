<section class="pt-32">
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{__('Broadcaster created successfully')}}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{__('Broadcaster updated successfully')}}
        </div>
    </x-jet-action-message>
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 dark:gap-9">
            <div class="col-span-1 relative">
                <div class="flex gap-5 items-center">
                    <div class="basis-1/12 flex justify-center">
                        <span class="">
                            <i class="fi fi-{{$flag}} fis rounded-full scale-[3]"></i>
                        </span>
                    </div>
                    <div class="relative basis-11/12">
                        <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                            for="country">
                            {{__('Country')}}
                        </label>
                        <select class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-4 py-2"
                            wire:model="country_id">
                            <option value="">Seleccionar...</option>
                            @foreach ($countries as $name => $id)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="name">
                    {{__('Name')}}
                </label>
                <x-jet-input-error for='name' />
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="name" type="text">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="logo_light_theme">
                    {{__('Logo light theme')}}
                </label>
                <x-jet-input-error for='logo_light_theme' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7" />
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="logo_light_theme" type="file">
                @if ($broadcaster && $broadcaster->logo_light_theme)
                    <div class="flex justify-center items-center">
                        <img class="w-60 mt-5 rounded-lg bg-transparent dark:bg-slate-400" src="{{ $broadcaster->getLogoLightUrl() }}"/>
                    </div>
                @endif
            </div>
            <div class="col-span-1">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="logo_dark_theme">
                    {{__('Logo dark theme')}}
                </label>
                <x-jet-input-error for='logo_dark_theme' class="absolute right-28 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7" />
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="logo_dark_theme" type="file">
                @if ($broadcaster && $broadcaster->logo_dark_theme)
                    <div class="flex justify-center items-center">
                        <img class="w-60 mt-5 rounded-lg bg-slate-800 dark:bg-transparent" src="{{ $broadcaster->getLogoDarkUrl() }}"/>
                    </div>
                @endif
            </div>
        </div>
        <div class="mt-6 py-6 w-full flex justify-center items-center">
            <button type="submit" class="rounded-full w-2/3 px-4 py-3 text-white font-bold {{$send_button}} hover:scale-110 transition">
                {{__('Save')}}
            </button>
        </div>
    </form>
</section>

