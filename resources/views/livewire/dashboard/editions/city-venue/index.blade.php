<section>
    <div class="pt-24 flex flex-col justify-center items-center">
        <x-jet-action-message on="deleted">
            <div class="box-success-action-message">
                {{__('City venue deleted successfully')}}
            </div>
        </x-jet-action-message>
        <div class="grid grid-cols-3 md:grid-cols-6 gap-3 mb-2 w-full">
            <div class="col-span-2">
                <a href="{{ route('d-editions-city-venue-create') }}">
                    <button
                        class="w-full rounded-full px-4 py-2 bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 text-white text-medium font-bold hover:bg-green-700 hover:scale-[1.02] transition duration-200">
                        {{ __('Add city venue') }}
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
            <div class="col-span-3">
                <input
                    class="rounded-full bg-transparent w-full px-4 py-2 border border-gray-400 text-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50"
                    type="text" wire:model="search" placeholder="{{ __('Search') }}">
            </div>
            <div class="col-span-3 md:col-span-6">
                <label class="absolute text-md text-gray-400 bg-white dark:bg-transparent mt-0 dark:mt-5 px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="country_id">
                    {{__('Country')}}
                </label>
                <select wire:model="country_id"
                    class="rounded-full bg-transparent w-full mt-0 dark:mt-5 px-4 py-2 border border-gray-400 text-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{ __('Select...') }}</option>
                    @foreach ($countries as $name => $id)
                        <option class="bg-transparent dark:bg-slate-800" value="{{ $id }}">{{ $name }}</option>
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
                @foreach ($city_venues as $city_venue)
                    <tr class="w-full border-b text-xs iPhoneSE:text-base border-gray-300">
                        <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                            {{ $city_venue->id }}
                        </td>
                        <td class="px-1 sm:px-2 py-3 text-xs md:text-base font-bold break-words iPhoneSE:break-normal">
                            {{ $city_venue->city }}
                        </td>
                        <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                            {{ $city_venue->state }}
                        </td>
                        <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                            {{ __($city_venue->country->name) }}
                        </td>
                        <td class="flex gap-1 justify-center items-center px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                            <button
                                class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-cyan-500 to-blue-900 text-white">
                                <i class="scale-[0.6] md:scale-100 fa-solid fa-eye"></i>
                            </button>
                            <a href="{{ route('d-editions-city-venue-edit', $city_venue) }}">
                                <button
                                    class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-yellow-500 to-amber-600 text-white">
                                    <i class="scale-[0.6] md:scale-100 fa-solid fa-pen"></i>
                                </button>
                            </a>
                            <button wire:click="selectedCityVenueToDelete({{ $city_venue }})"
                                class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-red-500 to-red-900 text-white">
                                <i class="scale-[0.6] md:scale-100 fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $city_venues->links() }}
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
    </div>
</section>


