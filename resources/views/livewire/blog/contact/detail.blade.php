<div>
    <form wire:submit.prevent="submit" class="flex flex-col max-w-sm mx-auto">
        <x-jet-label>{{ __('Detalles') }}</x-jet-label>
        <x-jet-input-error for="detail" />
        <x-jet-input type="text" wire:model="detail"/>

        <x-jet-label>{{__('Acepto terminos y condiciones')}}</x-jet-label>
        <x-jet-action-message on="not-agree">
            <div class="box-danger-action-message">
                {{__('Si no acepta los terminos de condiciones su información no será enviada')}}
            </div>
        </x-jet-action-message>
        <x-jet-input-error for="agree"/>
        <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            wire:model="agree">
            <option value="">Seleccionar...</option>
            <option value="yes">Sí</option>
            <option value="not">No</option>
        </select>
        <div class="flex mt-5 justify-end gap-3">
            <x-jet-secondary-button wire:click="$emit('stepEvent', 2)">Atrás</x-jet-secondary-button>
            <x-jet-button type="submit">Enviar</x-jet-button>
        </div>
    </form>
</div>
