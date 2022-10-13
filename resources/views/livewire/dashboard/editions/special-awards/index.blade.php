@slot('header')
{{__('Editions - Special Awards')}}
@endslot

<x-card.card-primary class="items-center">
    @slot('title')
        {{__('Special Awards')}}
    @endslot
    <x-jet-action-message on="deleted">
        <div class="box-success-action-message">
            {{__('The special award has been deleted successfully')}}
        </div>
    </x-jet-action-message>
    <div class="grid grid-cols-6 gap-2 mb-2">
        <div class="col-span-2">
            <a href="{{route('d-editions-special-awards-create')}}">
                <x-btn.button-success class="my-2 py-2">
                    {{__('New special award')}}
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
            @foreach ($special_awards as $special_award)
                <tr class="border-b">
                    <td class="p-2">{{ $special_award->id }}</td>
                    <td class="p-2">{{ $special_award->edition->year }}</td>
                    <td class="p-2">{{ $special_award->edition->name }}</td>
                    <td class="p-2">{{ $special_award->name }}</td>
                    <td class="p-2">{{ $special_award->candidate->country->name }}</td>
                    <td class="p-2">{{ $special_award->candidate->first_name.' '.$special_award->candidate->second_name.' '.$special_award->candidate->first_last_name.' '.$special_award->candidate->second_last_name }}</td>
                    <td class="p-2">
                        <a href="{{ route('d-editions-special-awards-edit', $special_award) }}" class="mr-2">{{__('Edit')}}</a>
                        <x-jet-danger-button
                            wire:click="selectedSpecialAwardToDelete({{ $special_award }})">
                            {{__('Delete')}}
                        </x-jet-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $special_awards->links() }}

    <!-- Remove Team Member Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingDeleteSpecialAward">
        <x-slot name="title">
            <div class="">
                {{ __('Delete special award') }}
            </div>
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this award?') }}
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
