<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Ingresar comité nacional') }}
    </h2>
</x-slot>
<div>
    <x-jet-action-message on="created">
        {{__('Created national committee successfully')}}
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        {{__('Updated national committee successfully')}}
    </x-jet-action-message>
    <form wire:submit.prevent="submit">
        <x-jet-label>País</x-jet-label>
        <x-jet-input-error for='country_id'/>
        <select wire:model="country_id">
            <option value="">Seleccionar...</option>
            @foreach ($countries as $name => $id)
                <option value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>

        <x-jet-label for="">Razón social</x-jet-label>
        <x-jet-input-error for='business_name'/>
        <x-jet-input type="text" wire:model="business_name"/>

        <x-jet-label for="">Director nacional</x-jet-label>
        <x-jet-input-error for='national_director'/>
        <x-jet-input type="text" wire:model="national_director"/>

        <x-jet-button type="submit">Enviar</x-jet-button>
    </form>
</div>
