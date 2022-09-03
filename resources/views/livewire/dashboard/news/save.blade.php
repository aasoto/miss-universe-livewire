<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Ingresar noticia') }}
    </h2>
</x-slot>
<div>
    <x-jet-action-message on="created">
        {{__('Created news successfully')}}
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        {{__('Updated news successfully')}}
    </x-jet-action-message>
    <form wire:submit.prevent="submit">
        <x-jet-label for="">Título</x-jet-label>
        <x-jet-input-error for='title'/>
        <x-jet-input type="text" wire:model="title"/>

        <x-jet-label for="">Subtitulo</x-jet-label>
        <x-jet-input-error for='subtitle'/>
        <x-jet-input type="text" wire:model="subtitle"/>

        <x-jet-label for="">Contenido</x-jet-label>
        <x-jet-input-error for='content'/>
        <x-jet-input type="text" wire:model="content"/>

        <x-jet-button type="submit">Enviar</x-jet-button>
    </form>
</div>
