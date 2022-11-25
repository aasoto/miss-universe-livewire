<section>
    <div class="pt-24 flex flex-col justify-center items-center">
        <x-jet-action-message on="deleted">
            <div class="box-success-action-message">
                {{__('Winner deleted successfully')}}
            </div>
        </x-jet-action-message>
        <div class="grid grid-cols-6 lg:grid-cols-12 gap-3 mb-3 w-full">
            <div class="col-span-5">
                <a href="{{ route('d-editions-winner-create') }}">
                    <button
                        class="w-full rounded-full px-4 py-2 bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 text-white text-medium font-bold hover:bg-green-700 hover:scale-110 transition duration-200">
                        {{ __('Add winner') }}
                    </button>
                </a>
            </div>
            <div class="col-span-1">
                <select wire:model="pagination"
                class="w-full bg-transparent border-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-full">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Show...')}}</option>
                    <option class="bg-transparent dark:bg-slate-800" value="10">10</option>
                    <option class="bg-transparent dark:bg-slate-800" value="25">25</option>
                    <option class="bg-transparent dark:bg-slate-800" value="50">50</option>
                    <option class="bg-transparent dark:bg-slate-800" value="100">100</option>
                    <option class="bg-transparent dark:bg-slate-800" value="200">200</option>
                    <option class="bg-transparent dark:bg-slate-800" value="300">300</option>
                    <option class="bg-transparent dark:bg-slate-800" value="500">500</option>
                    <option class="bg-transparent dark:bg-slate-800" value="750">750</option>
                    <option class="bg-transparent dark:bg-slate-800" value="1000">1000</option>
                </select>
            </div>
        </div>
        <div class="grid grid-cols-6 lg:grid-cols-12 gap-3 mb-2 w-full">
            <div class="col-span-6">
                <select wire:model="country_id"
                    class="w-full bg-transparent border-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-full">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Country...')}}</option>
                    @foreach ($countries as $name => $id)
                        <option class="bg-transparent dark:bg-slate-800" value="{{$id}}">{{__($name)}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6">
                <select wire:model="edition_id"
                    class="w-full bg-transparent border-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-full">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Editions...')}}</option>
                    @foreach ($editions as $name => $id)
                        <option class="bg-transparent dark:bg-slate-800" value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <table class="container mx-0 w-[85%] sm:w-full">
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
                    <th class="rounded-r-3xl px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
                        {{__('Actions')}}
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach ($winners as $winner)
                <tr class="w-full border-b text-xs iPhoneSE:text-base border-gray-300">
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base text-center break-words iPhoneSE:break-normal">
                        {{ $winner->id }}
                    </td>
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base font-bold break-words iPhoneSE:break-normal">
                        {{ $winner->edition->year }}
                    </td>
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                        {{ $winner->edition->name }}
                    </td>
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base font-bold break-words iPhoneSE:break-normal">
                        {{ __($winner->candidate->country->name) }}
                    </td>
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                        {{ $winner->candidate->first_name.' '.$winner->candidate->second_name.' '.$winner->candidate->first_last_name.' '.$winner->candidate->second_last_name }}
                    </td>
                    <td class="flex gap-1 justify-center items-center px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                        <button
                            class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-cyan-500 to-blue-900 text-white">
                            <i class="scale-[0.6] md:scale-100 fa-solid fa-eye"></i>
                        </button>
                        <a href="{{ route('d-editions-winner-edit', $winner) }}">
                            <button
                                class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-yellow-500 to-amber-600 text-white">
                                <i class="scale-[0.6] md:scale-100 fa-solid fa-pen"></i>
                            </button>
                        </a>
                        <button wire:click="selectedWinnerToDelete({{ $winner }})"
                            class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-red-500 to-red-900 text-white">
                            <i class="scale-[0.6] md:scale-100 fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        {{ $winners->links() }}

        <x-jet-confirmation-modal wire:model="confirmingDeleteWinner">
            <x-slot name="title">
                <div class="">
                    {{ __('Delete winner') }}
                </div>
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you would like to delete this winner?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingDeleteWinner')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
    </div>
</section>


