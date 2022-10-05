@slot('header')
    {{ __('Ingresar city venue') }}
@endslot

<div>
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{__('City venue created successfully')}}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{__('City venue updated successfully')}}
        </div>
    </x-jet-action-message>
    <x-form.form-primary submit="submit" class="items-center">
        @slot('title')
            {{__('Ingresar city venue')}}
        @endslot
        @slot('form')
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Ciudad</x-jet-label>
                <x-jet-input-error for='city'/>
                <x-jet-input type="text" wire:model="city" class="w-full"/>
            </div>
            <div class="col-span-6 sm:col-span-3 mb-0">
                <x-jet-label for="">Estado / Provincia</x-jet-label>
                <x-jet-input-error for='state'/>
                <x-jet-input type="text" wire:model="state" class="w-full"/>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">País</x-jet-label>
                <x-jet-input-error for='country_id'/>
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="country_id">
                    <option value="">Seleccionar...</option>
                    @foreach ($countries as $name => $id)
                        <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
        @endslot

        @slot('actions')
            <x-jet-button type="submit">Enviar</x-jet-button>
        @endslot
    </x-form.form-primary>
</div>


