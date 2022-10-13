@slot('header')
{{__('Editions - Miss Congeniality')}}
@endslot

<x-card.card-primary class="items-center">
    @slot('title')
        {{__('Miss Congeniality')}}
    @endslot
    <x-jet-action-message on="deleted">
        <div class="box-success-action-message">
            {{__('The winner of this edition has been deleted successfully')}}
        </div>
    </x-jet-action-message>
    <div class="grid grid-cols-6 gap-2 mb-2">
        <div class="col-span-2">
            <a href="{{route('d-editions-miss-congeniality-create')}}">
                <x-btn.button-success class="my-2 py-2">
                    {{__('New Miss Congeniality')}}
                </x-btn.button-success>
            </a>
        </div>
        <div class="col-span-1">
            <select wire:model="pagination"
            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="">{{__('Show')}}</option>
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
    </div>
    <div class="flex gap-2 mb-2">
        <select wire:model="country_id"
            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">{{__('Countries...')}}</option>
            @foreach ($countries as $name => $id)
                <option value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>
        <select wire:model="edition_id"
            class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">{{__('Editions...')}}</option>
            @foreach ($editions as $name => $id)
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
                        {{ __($column) }}
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
                <th class="p-2">{{__('Actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($congenialities as $congeniality)
                <tr class="border-b">
                    <td class="p-2">{{ $congeniality->id }}</td>
                    <td class="p-2">{{ $congeniality->edition->year }}</td>
                    <td class="p-2">{{ $congeniality->edition->name }}</td>
                    <td class="p-2">{{ $congeniality->candidate->country->name }}</td>
                    <td class="p-2">{{ $congeniality->candidate->first_name.' '.$congeniality->candidate->second_name.' '.$congeniality->candidate->first_last_name.' '.$congeniality->candidate->second_last_name }}</td>
                    <td class="p-2">
                        <a href="{{ route('d-editions-miss-congeniality-edit', $congeniality) }}" class="mr-2">{{__('Edit')}}</a>
                        <x-jet-danger-button
                            wire:click="selectedCongenialityToDelete({{ $congeniality }})">
                            {{__('Delete')}}
                        </x-jet-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $congenialities->links() }}

    <!-- Remove Team Member Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingDeleteCongeniality">
        <x-slot name="title">
            <div class="">
                {{ __('Delete Miss Congeniality') }}
            </div>
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this winner?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="close_delete_modal()" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</x-card.card-primary>
