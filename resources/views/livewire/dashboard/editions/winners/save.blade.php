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
    @livewire('dashboard.editions.winners.contestants', ['edition_id' => $edition_id, 'edit_mode' => $edit_mode])
    @endif
    <x-modals.success-modal wire:model="success">
        <x-slot name="title">
            <div class="">
                {{ __('Well done!') }}
            </div>
        </x-slot>

        <x-slot name="content">
            {{ __('The winner has been saved successfully.') }}
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
                {{ __('The winner of this edition has been choosen!') }}
            </div>
        </x-slot>

        <x-slot name="content">
            {{ __('Please go to the main list and delete the candidate assigned and choose another one if the actual data is wrong.') }}
        </x-slot>

        <x-slot name="footer">
            <button class=""></button>
            <x-jet-secondary-button wire:click="close_exist_modal()" wire:loading.attr="disabled">
                {{ __('Ok') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-modals.error-modal>
</section>
{{-- <div class = "items-center flex flex-col sm:justify-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:w-11/12 mt-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="bg-blue-500 py-3">
            <h2 class="text-3xl text-center text-white">{{__('Winner')}}</h2>
        </div>
        <div class="px-6 py-4">
            <div class="flex flex-row">
                <div class="basis-1/6"></div>
                <div class="basis-4/6 flex flex-col">
                    <x-jet-label>{{__('Miss universe editions')}}</x-jet-label>
                    <select wire:model="edition_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">{{__('Editions...')}}</option>
                        @foreach ($editions as $name => $id)
                            <option value="{{$id}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="basis-1/6"></div>
            </div>
            @if ($edition_id)
            @livewire('dashboard.editions.winners.contestants', ['edition_id' => $edition_id, 'edit_mode' => $edit_mode])
            @endif
            <x-modals.success-modal wire:model="success">
                <x-slot name="title">
                    <div class="">
                        {{ __('Well done!') }}
                    </div>
                </x-slot>

                <x-slot name="content">
                    {{ __('The winner has been saved successfully.') }}
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
                        {{ __('The winner of this edition has been choosen!') }}
                    </div>
                </x-slot>

                <x-slot name="content">
                    {{ __('Please go to the main list and delete the candidate assigned and choose another one if the actual data is wrong.') }}
                </x-slot>

                <x-slot name="footer">
                    <button class=""></button>
                    <x-jet-secondary-button wire:click="close_exist_modal()" wire:loading.attr="disabled">
                        {{ __('Ok') }}
                    </x-jet-secondary-button>
                </x-slot>
            </x-modals.error-modal>
        </div>
    </div>
</div> --}}
