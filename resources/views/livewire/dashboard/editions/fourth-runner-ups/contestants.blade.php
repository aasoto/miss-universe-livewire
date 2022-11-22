<table class="container mt-5 mx-0 w-[85%] sm:w-full">
    <thead class="sticky top-5 md:top-18 z-40 h-12 w-full bg-gray-300">
        <tr class="text-xs iPhoneSE:text-base text-gray-800 font-bold">
            @php
                $first = true;
            @endphp
            @foreach ($columns as $key => $column)
                @if ($first)
                <th class="rounded-l-3xl px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
                @php
                    $first = false;
                @endphp
                @else
                <th class="px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
                @endif
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
            <th class="rounded-r-3xl px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
                {{__('Actions')}}
            </th>
        </tr>
    </thead>
    <tbody>
    @foreach ($contestants as $contestant)
        <tr class="w-full border-b text-xs iPhoneSE:text-base border-gray-300">
            <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                <span class="fi fi-{{$contestant->candidate->country->iso3166_1_alpha2}} fis rounded-full scale-[2] mr-5"></span>
                {{ $contestant->candidate->country->name }}
            </td>
            <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                {{ $contestant->candidate->first_name.' '.$contestant->candidate->second_name.' '.$contestant->candidate->first_last_name.' '.$contestant->candidate->second_last_name }}
            </td>
            <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                <div class="text-center">
                    <button wire:click="confirmAction({{$contestant->candidate->id}})" class="w-full rounded-full px-4 py-2 bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 text-white text-medium font-bold hover:bg-green-700 hover:scale-110 transition duration-200">
                        {{__('Fourth runner up')}}
                    </button>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<br>
<!-- Add Winner Confirmation Modal -->
<x-modals.question-modal wire:model="confirming_fourth_runner_up">
    <x-slot name="title">
        <div class="">
            {{ __('Confirm fourth runner up') }}
        </div>
    </x-slot>
    <x-slot name="content">
        {{ __('Are you sure that this contestant is the fourth runner up of this edition?') }}
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
