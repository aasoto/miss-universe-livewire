<section>
    <div class="pt-24 flex flex-col justify-center items-center mb-5">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-2 mb-2 w-full">
            <div class="col-span-1 md:col-span-2">
                <a href="{{ route('d-nationalcommittee-create') }}">
                    <button
                        class="w-full rounded-full px-4 py-2 bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 text-white text-medium font-bold hover:bg-green-700 hover:scale-110 transition duration-200">
                        {{ __('New national committee') }}
                    </button>
                </a>
            </div>
            <div class="col-span-1">
                <select wire:model="pagination"
                    class="w-full bg-transparent border-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-full">
                    <option value="">{{ __('Show') }}</option>
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
        <div class="flex flex-col md:flex-row gap-2 mb-2 w-full">
            <div class="basis-0 md:basis-1/2">
                <input
                    class="rounded-full bg-transparent w-full px-4 py-2 border border-gray-400 text-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50"
                    type="text" wire:model="search" placeholder="{{ __('Search') }}">
            </div>
            <div class="basis-0 md:basis-1/2">
                <select wire:model="country_id"
                    class="rounded-full bg-transparent w-full px-4 py-2 border border-gray-400 text-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50">
                    <option value="">{{ __('Country...') }}</option>
                    @foreach ($countries as $name => $id)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <table class="container mx-0 iPhoneSE:mx-5 md:mx-10 w-[85%] sm:w-full">
            <thead class="sticky top-5 md:top-18 z-40 h-12 w-full bg-gray-300 rounded-full">
                <tr class="text-xs iPhoneSE:text-base text-gray-800 font-bold">
                    @foreach ($columns as $key => $column)
                        <th
                            class="px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
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
                    <th
                        class="px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
                        Acciones</th>
                </tr>
            </thead>
            <tbody class="w-full">
            @foreach ($national_committees as $national_committee)
                <tr class="w-full border-b text-xs iPhoneSE:text-base border-gray-300">
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base font-bold break-words iPhoneSE:break-normal">
                        {{$national_committee->id}}
                    </td>
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base font-bold break-words iPhoneSE:break-normal">
                        <span class="fi fi-{{$national_committee->country->iso3166_1_alpha2}} fis rounded-full scale-125"></span>
                        {{$national_committee->country->name}}
                    </td>
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                        {{$national_committee->business_name}}
                    </td>
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                        {{$national_committee->national_director}}
                    </td>
                    <td class="flex gap-1 justify-center items-center px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                        <button
                            class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-cyan-500 to-blue-900 text-white">
                            <i class="scale-[0.6] md:scale-100 fa-solid fa-eye"></i>
                        </button>
                        <a href="{{ route('d-nationalcommittee-edit', $national_committee) }}">
                            <button
                                class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-yellow-500 to-amber-600 text-white">
                                <i class="scale-[0.6] md:scale-100 fa-solid fa-pen"></i>
                            </button>
                        </a>
                        <button wire:click="selectedNationalCommitteeToDelete({{ $national_committee }})"
                            class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-red-500 to-red-900 text-white">
                            <i class="scale-[0.6] md:scale-100 fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $national_committees->links() }}
    <br>
</section>
<x-modals.question-modal wire:model="confirmingDeleteNationalCommittee">
    <x-slot name="title">
        <div class="">
            {{ __('Delete national committee') }}
        </div>
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you would like to delete this national committee?') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmingDeleteNationalCommittee')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
            {{ __('Delete') }}
        </x-jet-danger-button>
    </x-slot>
</x-modals.question-modal>


