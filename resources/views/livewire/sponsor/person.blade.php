<div>
    <form wire:submit.prevent="submit" class="flex flex-col max-w-sm mx-auto">
        <x-jet-label>{{ __('Name') }}</x-jet-label>
        <x-jet-input-error for="name" />
        <x-jet-input type="text" wire:model="name"/>

        <x-jet-label>{{ __('Surname') }}</x-jet-label>
        <x-jet-input-error for="surname" />
        <x-jet-input type="text" wire:model="surname"/>

        <x-jet-label>{{ __('E-mail') }}</x-jet-label>
        <x-jet-input-error for="email" />
        <x-jet-input type="text" wire:model="email"/>

        <x-jet-label>{{ __('Web site') }}</x-jet-label>
        <x-jet-input-error for="web_site" />
        <x-jet-input type="text" wire:model="web_site"/>

        <x-jet-label>{{ __('Extra information') }}</x-jet-label>
        <x-jet-input-error for="extra_information" />
        <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        wire:model="extra_information"></textarea>

        <x-jet-label>{{ __('Type') }}</x-jet-label>
        <x-jet-input-error for="type" />
        <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            wire:model="type">
            <option value="">Select...</option>
            <option value="swimsuit">swimsuit</option>
            <option value="evening gown">Evening gown</option>
            <option value="accesories">Accesories</option>
            <option value="makeup">Makeup</option>
            <option value="skin care">Skin care</option>
            <option value="other">Other</option>
        </select>

        <div class="flex mt-5 gap-3">
            <x-jet-secondary-button wire:click="$emit('stepEvent', 1)">Back</x-jet-secondary-button>
            <x-jet-button type="submit">Enviar</x-jet-button>
        </div>
    </form>
</div>
