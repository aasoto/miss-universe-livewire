<div>
    <div class="flex">
        <div x-data="{ active:@entangle('step') }" class="flex mx-auto flex-col sm:flex-row">
            <div class="step active" :class="{ 'active': active == 1 }">
                STEP 1
            </div>
            <div class="step" :class="{ 'active': active == 2 }">
                STEP 2
            </div>
            <div class="step" :class="{ 'active': active == 4 }">
                STEP 3
            </div>

            {{--<div x-text="active"></div>
            <div x-text="$wire.step"></div>
            <div x-text="$wire.get('"></div>--}}
        </div>
    </div>
@if($step == 1)
    <form wire:submit.prevent="submit" class="flex flex-col max-w-sm mx-auto">
        <x-jet-label>{{ __('Miss Universe edition') }}</x-jet-label>
        <x-jet-input-error for="mu_edition_id" />
        <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            wire:model="mu_edition_id">
            <option value="">Select...</option>
            @foreach ($mu_editions as $official_name => $id)
                <option value="{{$id}}">{{$official_name}}</option>
            @endforeach
        </select>

        <x-jet-label>{{ __('Objective') }}</x-jet-label>
        <x-jet-input-error for="own_objective" />
        <x-jet-input type="text" wire:model="own_objective"/>

        <x-jet-label>{{ __('Message') }}</x-jet-label>
        <x-jet-input-error for="message" />
        <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        wire:model="message"></textarea>

        <x-jet-label>{{ __('Type') }}</x-jet-label>
        <x-jet-input-error for="type" />
        <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            wire:model="type">
            <option value="">Select...</option>
            <option value="company">Company</option>
            <option value="person">Person</option>
        </select>

        <div class="flex mt-5">
            <x-jet-button type="submit">Enviar</x-jet-button>
        </div>
    </form>
@elseif($step == 2)
    @livewire('sponsor.company')
@elseif($step == 3)
    @livewire('sponsor.person')
@elseif($step == 4)
    @livewire('sponsor.detail')
@endif
</div>
