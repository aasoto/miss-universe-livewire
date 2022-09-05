@slot('header')
    {{ __('Ingresar comité nacional') }}
@endslot

<div>
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{__('Created national committee successfully')}}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{__('Updated national committee successfully')}}
        </div>
    </x-jet-action-message>
    <x-form.form-primary submit="submit" class="items-center">
        @slot('title')
            {{__('Ingresar comité nacional')}}
        @endslot
        @slot('form')
            <div class="col-span-6">
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
                <x-jet-label for="">Razón social</x-jet-label>
                <x-jet-input-error for='business_name'/>
                <x-jet-input type="text" wire:model="business_name" class="w-full"/>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Director nacional</x-jet-label>
                <x-jet-input-error for='national_director'/>
                <x-jet-input type="text" wire:model="national_director" class="w-full"/>
            </div>
        @endslot

        @slot('actions')
            <x-jet-button type="submit">Enviar</x-jet-button>
        @endslot
    </x-form.form-primary>
</div>
