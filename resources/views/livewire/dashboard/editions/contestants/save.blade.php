@slot('header')
    {{ __('Ingresar concursante') }}
@endslot

<div>
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{__('Contestant created successfully')}}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{__('Contestant updated successfully')}}
        </div>
    </x-jet-action-message>
    <x-form.form-primary submit="submit" class="items-center">
        @slot('title')
            {{__('Ingresar concursante')}}
        @endslot
        @slot('form')
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Concursantes</x-jet-label>
                <x-jet-input-error for='country_id'/>
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="candidate_id">
                    @if ($candidate_found)
                    <option value="{{$candidate_id}}">{{$candidate_found[0]->first_name.' '.$candidate_found[0]->second_name.' '.$candidate_found[0]->first_last_name.' '.$candidate_found[0]->second_last_name}}</option>
                    @else
                    <option value="">Seleccionar...</option>
                    @endif
                    @foreach ($candidates as $key => $value)
                        <option value="{{$value['id']}}">{{$value['first_name'].' '.$value['second_name'].' '.$value['first_last_name'].' '.$value['second_last_name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Edición</x-jet-label>
                <x-jet-input-error for='edition_id'/>
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="edition_id">
                    <option value="">Seleccionar...</option>
                    @foreach ($editions as $name => $id)
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
