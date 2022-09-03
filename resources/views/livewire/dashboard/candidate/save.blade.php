<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Ingresar candidata') }}
    </h2>
</x-slot>
<div>
    <x-jet-action-message on="created">
        {{__('Created candidate successfully')}}
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        {{__('Updated candidate successfully')}}
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

        <x-jet-label for="">Primer nombre</x-jet-label>
        <x-jet-input-error for='first_name'/>
        <x-jet-input type="text" wire:model="first_name"/>

        <x-jet-label for="">Segundo nombre</x-jet-label>
        <x-jet-input-error for='second_name'/>
        <x-jet-input type="text" wire:model="second_name"/>

        <x-jet-label for="">Primer apellido</x-jet-label>
        <x-jet-input-error for='first_last_name'/>
        <x-jet-input type="text" wire:model="first_last_name"/>

        <x-jet-label for="">Segundo apellido</x-jet-label>
        <x-jet-input-error for='second_last_name'/>
        <x-jet-input type="text" wire:model="second_last_name"/>

        <x-jet-label for="">Genero</x-jet-label>
        <x-jet-input-error for='gender'/>
        <select wire:model="gender">
            <option value="">Seleccionar...</option>
            <option value="f">Femenino</option>
            <option value="m">Masculino</option>
        </select>

        <x-jet-label for="">Fecha de nacimiento</x-jet-label>
        <x-jet-input-error for='birthdate'/>
        <x-jet-input type="date" wire:model="birthdate"/>

        <x-jet-label>Comité nacional</x-jet-label>
        <x-jet-input-error for='national_committee_id'/>
        <select wire:model="national_committee_id">
            <option value="">Seleccionar...</option>
            @foreach ($national_committees as $business_name => $id)
                <option value="{{$id}}">{{$business_name}}</option>
            @endforeach
        </select>

        <x-jet-label for="">Foto oficial</x-jet-label>
        <x-jet-input-error for='official_picture'/>
        <x-jet-input type="file" wire:model="official_picture"/>

        @if ($candidate && $candidate->official_picture)
            <img class="w-40 mt-3" src="{{ $candidate->getImageUrl() }}"/>
        @endif

        <x-jet-button type="submit">Enviar</x-jet-button>
    </form>
</div>
