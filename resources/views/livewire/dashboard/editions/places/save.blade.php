@slot('header')
    {{ __('Ingresar lugar') }}
@endslot

<div>
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{__('Place created successfully')}}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{__('Place updated successfully')}}
        </div>
    </x-jet-action-message>
    <x-form.form-primary submit="submit" class="items-center">
        @slot('title')
            {{__('Ingresar lugar')}}
        @endslot
        @slot('form')
            <div class="col-span-6 sm:col-span-3 mb-0">
                <x-jet-label for="">Nombre</x-jet-label>
                <x-jet-input-error for='name'/>
                <x-jet-input type="text" wire:model="name" class="w-full"/>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Ciudad</x-jet-label>
                <x-jet-input-error for='city_venue_id'/>
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="city_venue_id">
                    <option value="">Seleccionar...</option>
                    @foreach ($city_venues as $key => $value)
                        <option value="{{$value['id']}}">{{$value['city'].', '.$value['state'].', '.$value['country']['name'].'.'}}</option>
                    @endforeach
                </select>
            </div>
        @endslot

        @slot('actions')
            <x-jet-button type="submit">Enviar</x-jet-button>
        @endslot
    </x-form.form-primary>
</div>
