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
            <option class="bg-transparent dark:bg-slate-800" value="{{ $id }}">{{ __($name) }}</option>
        @endforeach
    </select>
    @if ($edition_id)
        @livewire('dashboard.editions.quarterfinalists.contestants', ['edition_id' => $edition_id])
    @endif
    <x-modals.success-modal wire:model="success">
        <x-slot name="title">
            <div class="">
                {{ __('Well done!') }}
            </div>
        </x-slot>
        <x-slot name="content">
            {{ __('The quarterfinalist has been saved successfully.') }}
        </x-slot>
        <x-slot name="footer">
            <button class=""></button>
            <x-jet-secondary-button wire:click="close_success_modal()" wire:loading.attr="disabled">
                {{ __('Ok') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-modals.success-modal>
</section>
