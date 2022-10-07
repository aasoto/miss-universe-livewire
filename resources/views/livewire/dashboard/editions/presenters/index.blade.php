@slot('header')
{{__('Editions - Presenters')}}
@endslot

<x-card.card-primary class="items-center">
    @slot('title')
        {{__('Presenters')}}
    @endslot
    <x-jet-action-message on="deleted">
        <div class="box-success-action-message">
            {{__('Presenter deleted successfully')}}
        </div>
    </x-jet-action-message>
    <div class="grid grid-cols-6 gap-2 mb-2">
        <div class="col-span-2">
            <a href="{{route('d-editions-presenter-create')}}">
                <x-btn.button-success class="my-2">
                    {{__('Nuevo presentador')}}
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
            <option value="">Canal de televisión...</option>
            @foreach ($broadcasters as $name => $id)
                <option value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>
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
            @foreach ($presenters as $presenter)
                <tr class="border-b">
                    <td class="p-2">{{ $presenter->id }}</td>
                    <td class="p-2">{{ $presenter->name }}</td>
                    <td class="p-2">{{ $presenter->country->name }}</td>
                    <td class="p-2"> @isset($presenter->broadcaster) {{ $presenter->broadcaster->name }} @endisset </td>
                    <td class="p-2">
                        @foreach ($roles as $key => $rol)
                            @if ($key == $presenter->rol)
                                {{$rol}}
                            @endif
                        @endforeach
                    </td>
                    <td class="p-2">
                        <a href="{{ route('d-editions-presenter-edit', $presenter) }}" class="mr-2">Editar</a>
                        <x-jet-danger-button
                            {{--onclick="confirm('¿Seguro que desea eliminar el registro seleccionado?') || event.stopImmediatePropagation()"--}}
                            wire:click="selectedPresenterToDelete({{ $presenter }})">
                            Eliminar
                        </x-jet-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $presenters->links() }}

    <!-- Remove Team Member Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingDeletePresenter">
        <x-slot name="title">
            <div class="">
                {{ __('Delete presenter') }}
            </div>
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this presenter?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingDeletePresenter')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</x-card.card-primary>



