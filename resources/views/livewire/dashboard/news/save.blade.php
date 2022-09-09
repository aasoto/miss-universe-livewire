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
            <div class="col-span-6">
                <x-jet-label for="">Portada</x-jet-label>
                <x-jet-input-error for='background'/>
                <x-jet-input type="file" wire:model="background" class="w-full"/>
                @if ($news && $news->background)
                    <img class="w-40 mt-3" src="{{ $news->getImageUrl() }}"/>
                @endif
            </div>
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
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Postear</x-jet-label>
                <x-jet-input-error for='posted'/>
                <select wire:model="posted"
                class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Seleccionar...</option>
                    <option value="yes">Sí</option>
                    <option value="not">No</option>
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Fecha de publicación</x-jet-label>
                <x-jet-input-error for='date_publish'/>
                <x-jet-input type="date" wire:model="date_publish" class="w-full"/>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Categoría</x-jet-label>
                <x-jet-input-error for='category_id'/>
                <select wire:model="category_id"
                class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Seleccionar...</option>
                    @foreach ($categories as $name => $id)
                        <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Tipo</x-jet-label>
                <x-jet-input-error for='type'/>
                <select wire:model="type"
                class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Seleccionar...</option>
                    <option value="article">Articulo</option>
                    <option value="news">Noticia</option>
                </select>
            </div>
        @endslot
        @slot('actions')
            <x-jet-button type="submit">Enviar</x-jet-button>
        @endslot
    </x-form.form-primary>
</div>
