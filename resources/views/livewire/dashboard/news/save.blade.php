@slot('header')
{{ __('Ingresar noticia') }}
@endslot
<div>
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{__('Created news successfully')}}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{__('Updated news successfully')}}
        </div>
    </x-jet-action-message>
    <x-form.form-primary submit="submit" class="items-center">
        @slot('title')
            {{__('Ingresar noticia')}}
        @endslot
        @slot('form')
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Título</x-jet-label>
                <x-jet-input-error for='title'/>
                <x-jet-input type="text" wire:model="title" class="w-full"/>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Subtitulo</x-jet-label>
                <x-jet-input-error for='subtitle'/>
                <x-jet-input type="text" wire:model="subtitle" class="w-full"/>
            </div>
            <div class="col-span-6">
                <x-jet-label for="">Contenido</x-jet-label>
                <x-jet-input-error for='content'/>
                <x-jet-input type="text" wire:model="content" class="w-full"/>
            </div>
        @endslot
        @slot('actions')
            <x-jet-button type="submit">Enviar</x-jet-button>
        @endslot
    </x-form.form-primary>
</div>
