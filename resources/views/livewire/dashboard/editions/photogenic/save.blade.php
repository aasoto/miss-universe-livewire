<section class="pt-32 pb-10">
    <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
        for="edition_id">
        {{__('Miss Universe editions')}}
    </label>
    <x-jet-input-error for='edition_id' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
    <select class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2"
        wire:model="edition_id">
        <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select...')}}</option>
        @foreach ($editions as $name => $id)
            <option class="bg-transparent dark:bg-slate-800" value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
    @if ($edition_id)
    @livewire('dashboard.editions.photogenic.contestants', ['edition_id' => $edition_id, 'edit_mode' => $edit_mode])
    @endif
    <x-modals.success-modal wire:model="success">
        <x-slot name="title">
            <div class="">
                {{ __('Well done!') }}
            </div>
        </x-slot>
        <x-slot name="content">
            {{ __('The miss photogenic has been saved successfully.') }}
        </x-slot>
        <x-slot name="footer">
            <button class=""></button>
            <x-jet-secondary-button wire:click="close_success_modal()" wire:loading.attr="disabled">
                {{ __('Ok') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-modals.success-modal>

    <x-modals.error-modal wire:model="exist">
        <x-slot name="title">
            <div class="">
                {{ __('The Miss Photogenic of this edition has been choosen!') }}
            </div>
        </x-slot>
        <x-slot name="content">
            {{ __('Please go to the main list and modify or remove the candidate assigned and choose another one if the actual data is wrong.') }}
        </x-slot>
        <x-slot name="footer">
            <button class=""></button>
            <x-jet-secondary-button wire:click="close_exist_modal()" wire:loading.attr="disabled">
                {{ __('Ok') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-modals.error-modal>
</section>
