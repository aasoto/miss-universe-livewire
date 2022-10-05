@slot('header')
{{__('Editions - City Venues')}}
@endslot

<x-card.card-primary class="items-center">
    @slot('title')
        {{__('City Venues')}}
    @endslot
    <x-jet-action-message on="deleted">
        <div class="box-success-action-message">
            {{__('City venue deleted successfully')}}
        </div>
    </x-jet-action-message>
    <div class="grid grid-cols-6 gap-2 mb-2">
        <div class="col-span-2">
            <a href="{{route('d-editions-city-venue-create')}}">
                <x-btn.button-success class="my-2">
                    {{__('Nueva city venue')}}
                </x-btn.button-success>
            </a>
        </div>
        <div class="col-span-1">
            <select wire:model="pagination"
            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="">Mostrar</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="300">300</option>
                <option value="500">500</option>
                <option value="750">750</option>
                <option value="1000">1000</option>
            </select>
        </div>
        <div class="col-span-3">
            <x-jet-input type="text" wire:model="search" class="w-full" placeholder="Buscar"></x-jet-input>
        </div>
    </div>
    <div class="flex gap-2 mb-2">
        <select wire:model="country_id"
            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">País...</option>
            @foreach ($countries as $name => $id)
                <option value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>
    </div>
    <table class="table w-full">
        <thead class="text-left bg-gray-100">
            <tr class="border-b">
                @foreach ($columns as $key => $column)
                    <th class="p-2">
                        <button wire:click="sort('{{ $key }}')">
                        {{ $column }}
                        @if ($key == $sortColumn)
                            @if ($sortDirection == 'asc')
                                &uarr;
                            @else
                                &darr;
                            @endif
                        @endif
                        </button>
                    </th>
                @endforeach
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($city_venues as $city_venue)
                <tr class="border-b">
                    <td class="p-2">{{ $city_venue->id }}</td>
                    <td class="p-2">{{ $city_venue->city }}</td>
                    <td class="p-2">{{ $city_venue->state }}</td>
                    <td class="p-2">{{ $city_venue->country->name }}</td>
                    <td class="p-2">
                        <a href="{{ route('d-editions-city-venue-edit', $city_venue) }}" class="mr-2">Editar</a>
                        <x-jet-danger-button
                            {{--onclick="confirm('¿Seguro que desea eliminar el registro seleccionado?') || event.stopImmediatePropagation()"--}}
                            wire:click="selectedCityVenueToDelete({{ $city_venue }})">
                            Eliminar
                        </x-jet-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $city_venues->links() }}

    <!-- Remove Team Member Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingDeleteCityVenue">
        <x-slot name="title">
            <div class="">
                {{ __('Delete city venue') }}
            </div>
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this city venue?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingDeleteCityVenue')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</x-card.card-primary>


