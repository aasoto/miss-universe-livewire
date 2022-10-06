@slot('header')
{{__('Editions - Miss Universe')}}
@endslot

<div class = "items-center flex flex-col sm:justify-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:w-11/12 mt-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="bg-blue-500 py-3">
            <h2 class="text-3xl text-center text-white">{{__('Miss Universe Editions')}}</h2>
        </div>
        <div class="px-6 py-4">
            <x-jet-action-message on="deleted">
                <div class="box-success-action-message">
                    {{__('The edition was deleted successfully')}}
                </div>
            </x-jet-action-message>
            <div class="grid grid-cols-6 gap-2 mb-2">
                <div class="col-span-2">
                    <a href="{{route('d-editions-miss-universe-create')}}">
                        <x-btn.button-success class="my-2">
                            {{__('Nueva Edicion')}}
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
                <select wire:model="broadcaster_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Canales de televisión...</option>
                    @foreach ($broadcasters as $key => $value)
                        <option value="{{$value['id']}}">{{$value['name']}}</option>
                    @endforeach
                </select>
                <select wire:model="city_venue_id"
                    class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    <option value="">Ciudades...</option>
                    @foreach ($city_venues as $key => $value)
                        <option value="{{$value['id']}}">{{$value['city'].', '.$value['state'].', '.$value['country']['name']}}</option>
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
                    @foreach ($miss_universe as $m_u)
                        <tr class="border-b">
                            <td class="p-2">{{ $m_u->id }}</td>
                            <td class="p-2">{{ $m_u->year }}</td>
                            <td class="p-2">{{ $m_u->name }}</td>
                            <td class="p-2">{{ $m_u->official_name }}</td>
                            <td class="p-2">@isset($m_u->place) {{ $m_u->place->city_venue->city.', '.$m_u->place->city_venue->country->name}} @endisset</td>
                            <td class="p-2">{{ $m_u->broadcaster->name }}</td>
                            <td class="p-2">@isset($m_u->broadcaster_2) {{ $this->searchBroadcaster2($m_u->broadcaster_2) }} @endisset</td>
                            <td class="p-2">
                                <a href="{{ route('d-editions-miss-universe-edit', $m_u) }}" class="mr-2">Editar</a>
                                <x-jet-danger-button
                                    {{--onclick="confirm('¿Seguro que desea eliminar el registro seleccionado?') || event.stopImmediatePropagation()"--}}
                                    wire:click="selectedMissUniverseToDelete({{ $m_u }})">
                                    Eliminar
                                </x-jet-danger-button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            {{ $miss_universe->links() }}

            <!-- Remove Team Member Confirmation Modal -->
            <x-jet-confirmation-modal wire:model="confirmingDeleteMissUniverse">
                <x-slot name="title">
                    <div class="">
                        {{ __('Delete edition') }}
                    </div>
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you would like to delete this edition?') }}
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('confirmingDeleteMissUniverse')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
                        {{ __('Delete') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-confirmation-modal>
        </div>
    </div>
</div>
