<div>
    <form wire:submit.prevent="submit" class="flex flex-col max-w-sm mx-auto">
        <x-jet-label>{{ __('Nombres y apellidos') }}</x-jet-label>
        <x-jet-input-error for="person_name" />
        <x-jet-input type="text" wire:model="person_name"/>

        <x-jet-label>{{ __('Dirección') }}</x-jet-label>
        <x-jet-input-error for="address" />
        <x-jet-input type="text" wire:model="address"/>

        <x-jet-label>{{ __('Correo electronico') }}</x-jet-label>
        <x-jet-input-error for="email" />
        <x-jet-input type="email" wire:model="email"/>

        <x-jet-label>{{ __('Telefono') }}</x-jet-label>
        <x-jet-input-error for="phone" />
        <x-jet-input type="text" wire:model="phone"/>

        <div class="flex mt-5 justify-end gap-3">
            <x-jet-secondary-button wire:click="$emit('stepEvent', 1)">Atrás</x-jet-secondary-button>
            <x-jet-button type="submit">Enviar</x-jet-button>
        </div>
    </form>
</div>
