@slot('header')
{{__('Editions - First runner up')}}
@endslot

<div class = "items-center flex flex-col sm:justify-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:w-11/12 mt-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="bg-blue-500 py-3">
            <h2 class="text-3xl text-center text-white">{{__('First runner up')}}</h2>
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
            @livewire('dashboard.editions.first-runner-ups.contestants', ['edition_id' => $edition_id, 'edit_mode' => $edit_mode])
            @endif
            <x-modals.success-modal wire:model="success">
                <x-slot name="title">
                    <div class="">
                        {{ __('Well done!') }}
                    </div>
                </x-slot>
                <x-slot name="content">
                    {{ __('The first runner up has been saved successfully.') }}
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
                        {{ __('The first runner up of this edition has been choosen!') }}
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
        </div>
    </div>
</div>
