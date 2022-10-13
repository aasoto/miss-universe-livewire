<table class="my-3 table w-full">
    <thead class="text-left bg-gray-100">
        <tr class="border-b">
            @foreach ($columns as $key => $column)
                <th class="p-2">
                    {{ $column }}
                </th>
            @endforeach
            <th class="p-2">{{__('Actions')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contestants as $contestant)
            <tr class="border-b">
                <td class="p-2">
                    <span class="fi fi-{{$contestant->candidate->country->iso3166_1_alpha2}}"></span>
                    {{ $contestant->candidate->country->name }}
                </td>
                <td class="p-2">{{ $contestant->candidate->first_name.' '.$contestant->candidate->second_name.' '.$contestant->candidate->first_last_name.' '.$contestant->candidate->second_last_name }}</td>
                <td class="p-2">
                    <div class="text-center">
                        <button wire:click="confirmAction({{$contestant->candidate->id}})" class="m-1 p-2 bg-green-500 hover:bg-green-800 hover:cursor-pointer rounded-md shadow-md shadow-gray-300 font-bold text-white">
                            {{__('Best national costume')}}
                        </button>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<br>
<!-- Add Winner Confirmation Modal -->
<x-modals.question-modal wire:model="confirming_best_national_costume">
    <x-slot name="title">
        <div class="">
            {{ __('Confirm best national costume') }}
        </div>
    </x-slot>
    <x-slot name="content">
        {{ __('Are you sure that this contestant is the best national costume of this edition?') }}
    </x-slot>
    <x-slot name="footer">
        <button class=""></button>
        <x-jet-secondary-button wire:click="close_confirming_modal()" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        <button  wire:click="submit()" wire:loading.attr="disabled" class="ml-3 inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">
            {{__("Yes, I'm sure")}}
        </button>
    </x-slot>
</x-modals.question-modal>
