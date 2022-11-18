<section>
    <div class="pt-24 flex flex-col justify-center items-center">
        <x-jet-action-message on="deleted">
            <div class="box-success-action-message">
                {{__('Broadcaster deleted successfully')}}
            </div>
        </x-jet-action-message>
        <div class="grid grid-cols-3 w-full lg:grid-cols-6 gap-2 mb-2">
            <div class="col-span-2">
                <a href="{{ route('d-editions-broadcaster-create') }}">
                    <button
                        class="w-full rounded-full px-4 py-2 bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 text-white text-medium font-bold hover:bg-green-700 hover:scale-110 transition duration-200">
                        {{ __('Add broadcaster') }}
                    </button>
                </a>
            </div>
            <div class="col-span-1">
                <select wire:model="pagination"
                class="w-full bg-transparent border-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-full">
                    <option value="">{{__('Show...')}}</option>
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
                <input
                    class="rounded-full bg-transparent w-full px-4 py-2 border border-gray-400 text-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50"
                    type="text" wire:model="search" placeholder="{{ __('Search') }}">
            </div>
            <div class="col-span-3 lg:col-span-6">
                <select wire:model="country_id"
                    class="rounded-full bg-transparent w-full px-4 py-2 border border-gray-400 text-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50">
                    <option value="">{{ __('Country...') }}</option>
                    @foreach ($countries as $name => $id)
                        <option value="{{ $id }}">{{ $name }}</option>
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
                @foreach ($broadcasters as $broadcaster)
                    <tr class="w-full border-b text-xs iPhoneSE:text-base border-gray-300">
                        <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                            {{ $broadcaster->id }}
                        </td>
                        <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                            {{ $broadcaster->country->name }}
                        </td>
                        <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                            <img src="{{asset('../storage/app/public/images/editions/broadcasters/'.$broadcaster->logo_light_theme) }}" class="w-12 h-5 object-contain" alt="logo-{{$broadcaster->name}}">
                        </td>
                        <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                            {{ $broadcaster->name }}
                        </td>
                        <td class="flex gap-1 justify-center items-center px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                            <button
                                class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-cyan-500 to-blue-900 text-white">
                                <i class="scale-[0.6] md:scale-100 fa-solid fa-eye"></i>
                            </button>
                            <a href="{{ route('d-editions-broadcaster-edit', $broadcaster) }}">
                                <button
                                    class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-yellow-500 to-amber-600 text-white">
                                    <i class="scale-[0.6] md:scale-100 fa-solid fa-pen"></i>
                                </button>
                            </a>
                            <button wire:click="selectedBroadcasterToDelete({{ $broadcaster }})"
                                class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-red-500 to-red-900 text-white">
                                <i class="scale-[0.6] md:scale-100 fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $broadcasters->links() }}
    </div>
</section>

<x-jet-confirmation-modal wire:model="confirmingDeleteBroadcaster">
    <x-slot name="title">
        <div class="">
            {{ __('Delete broadcaster') }}
        </div>
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you would like to delete this broadcaster?') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmingDeleteBroadcaster')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
            {{ __('Delete') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>
