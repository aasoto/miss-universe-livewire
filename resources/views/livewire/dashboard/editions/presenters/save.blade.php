@slot('header')
    {{ __('Ingresar presentador') }}
@endslot

<div>
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{__('Presenter created successfully')}}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{__('Presenter updated successfully')}}
        </div>
    </x-jet-action-message>
    <x-form.form-primary submit="submit" class="items-center">
        @slot('title')
            {{__('Ingresar Presentador')}}
        @endslot
        @slot('form')
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Nombre</x-jet-label>
                <x-jet-input-error for='name'/>
                <x-jet-input type="text" wire:model="name" class="w-full"/>
            </div>
            <div class="col-span-6 sm:col-span-3 mb-0">
                <x-jet-label>Rol</x-jet-label>
                <x-jet-input-error for='country_id'/>
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="rol">
                    <option value="">Seleccionar...</option>
                    @foreach ($roles as $key => $rol)
                        <option value="{{$key}}">{{$rol}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3 mb-0">
                <x-jet-label>Canal de televisión</x-jet-label>
                <x-jet-input-error for='country_id'/>
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="broadcaster_id">
                    <option value="">Seleccionar...</option>
                    @foreach ($broadcasters as $name => $id)
                        <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3 mb-0">
                <x-jet-label>País</x-jet-label>
                <x-jet-input-error for='country_id'/>
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="country_id">
                    <option value="">Seleccionar...</option>
                    @foreach ($countries as $name => $id)
                        <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Photo</x-jet-label>
                <x-jet-input-error for='photo'/>
                <x-jet-input type="file" wire:model="photo" class="w-full"/>

                @if ($presenter && $presenter->photo)
                    <img class="w-40 mt-3" src="{{ $presenter->getPhotoUrl() }}"/>
                @endif
            </div>
        @endslot

        @slot('actions')
            <x-jet-button type="submit">Enviar</x-jet-button>
        @endslot
    </x-form.form-primary>
</div>

