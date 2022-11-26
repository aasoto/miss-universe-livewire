<section class="pt-32">
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{ __('Created owner successfully') }}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{ __('Updated owner successfully') }}
        </div>
    </x-jet-action-message>
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 dark:gap-9">
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="business_name">
                    {{__('Business name')}}
                </label>
                <x-jet-input-error for='business_name' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="business_name" type="text">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="country">
                    {{__('Country')}}
                </label>
                <x-jet-input-error for='country_id' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2"
                    wire:model="country_id">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select...')}}</option>
                    @foreach ($countries as $name => $id)
                        <option class="bg-transparent dark:bg-slate-800" value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="logo_light_theme">
                    {{__('Logo light theme')}}
                </label>
                <x-jet-input-error for='logo_light_theme' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <div class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2">
                    <x-jet-input type="file" wire:model="logo_light_theme" class="w-full"/>
                </div>
                @if ($owner && $owner->logo_light_theme)
                <div class="flex justify-center items-center">
                    <div class="w-2/3 mt-5 p-4 bg-transparent dark:bg-gray-400 rounded-lg">
                        <img class="w-full object-cover object-center rounded-lg" src="{{ $owner->getLogoLightThemeUrl() }}" />
                    </div>
                </div>
                @endif
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="logo_dark_theme">
                    {{__('Logo dark theme')}}
                </label>
                <x-jet-input-error for='logo_dark_theme' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <div class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2">
                    <input type="file" wire:model="logo_dark_theme" class="w-full">
                </div>
                @if ($owner && $owner->logo_dark_theme)
                <div class="flex justify-center items-center">
                    <div class="w-2/3 mt-5 p-4 bg-gray-400 dark:bg-transparent rounded-lg">
                        <img class="w-full object-cover object-center rounded-lg" src="{{ $owner->getLogoDarkThemeUrl() }}" />
                    </div>
                </div>
                @endif
            </div>
            <div class="col-span-1 lg:col-span-2 relative">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="content">
                    {{ __('Description') }}
                </label>
                <div
                    class="z-10 w-full rounded-3xl border-2 text-gray-800 bg-white dark:bg-transparent border-gray-500 dark:border-white px-0.5 py-3">
                    <div wire:ignore>
                        <textarea id="ckdescription" rows="6">
                            {!! $description !!}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-2 relative">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="content">
                    {{ __('Description HTML view') }}
                </label>
                <x-jet-input-error for='description'  class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <textarea wire:model="description"
                    class="w-full rounded-3xl border-2 text-gray-800 dark:text-white bg-white dark:bg-transparent border-gray-500 dark:border-white px-0.5 py-3"></textarea>
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="owner_name">
                    {{__('Owner name')}}
                </label>
                <x-jet-input-error for='owner_name' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="owner_name" type="text">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="owner_occupation">
                    {{__("Owner's occupation")}}
                </label>
                <x-jet-input-error for='owner_occupation' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="owner_occupation" type="text">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="owner_picture">
                    {{__("Owner's picture")}}
                </label>
                <x-jet-input-error for='owner_picture' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <div class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2">
                    <x-jet-input type="file" wire:model="owner_picture" class="w-full"/>
                </div>
                @if ($owner && $owner->owner_picture)
                <div class="flex justify-center items-center">
                    <img class="w-2/3 mt-5 object-cover object-center rounded-lg" src="{{ $owner->getOwnerPictureUrl() }}" />
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

{{-- Importar plugin ckeditor --}}
<script src="{{ asset('js/ckeditor5-build-classic/ckeditor.js') }}"></script>
<script>
    document.addEventListener('livewire:load', function() {
        var ckeditor = null;
        /* Comunicación ckeditor a description */
        var editor = ClassicEditor.create(document.querySelector('#ckdescription')).then(
            editor => {
                ckeditor = editor;
                editor.model.document.on('change:data', () => {
                    @this.description = editor.getData();
                });
            }
        )

        /* Comunicación description a ckeditor */
        Livewire.hook('message.processed', (message, component) => {
            if (message.updateQueue[0].name == 'description') {
                ckeditor.setData(@this.description);
            }
        })
    })
</script>
