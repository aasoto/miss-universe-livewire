<div>
    <form wire:submit.prevent="submit" class="flex flex-col max-w-sm mx-auto">
        <x-jet-label>{{ __('extra') }}</x-jet-label>
        <x-jet-input-error for="extra" />
        <textarea class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
        wire:model="extra"></textarea>

        <div class="flex mt-5 gap-3">
            <x-jet-secondary-button wire:click="$emit('stepEvent', 2)">Back</x-jet-secondary-button>
            <x-jet-button type="submit">Enviar</x-jet-button>
        </div>
    </form>
</div>
