<section>
    <!-- <h2 class="text-xl md:text-2xl my-4 font-medium text-center text-rose-700 dark:text-rose-300">Concursantes</h2> -->
    <div class="pt-24 flex flex-col justify-center items-center">
        <x-jet-action-message on="deleted">
            <div class="box-success-action-message">
                {{__('Deleted candidate successfully')}}
            </div>
        </x-jet-action-message>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-2 mb-2 w-full">
            <div class="col-span-1 md:col-span-2">
                <a href="{{ route('d-candidate-create') }}">
                    <button
                        class="w-full rounded-full px-4 py-2 bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 text-white text-medium font-bold hover:bg-green-700 hover:scale-110 transition duration-200">
                        {{ __('New candidate') }}
                    </button>
                </a>
            </div>
            <div class="col-span-1">
                <select wire:model="pagination"
                    class="w-full bg-transparent border-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-full">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{ __('Show') }}</option>
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
            <div class="col-span-1 md:col-span-3">
                <input
                    class="rounded-full bg-transparent w-full px-4 py-2 border border-gray-400 text-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50"
                    type="text" wire:model="search" placeholder="{{ __('Search') }}">
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-2 mb-2 w-full">
            <div class="basis-0 md:basis-1/2">
                <select wire:model="country_id"
                    class="rounded-full bg-transparent w-full px-4 py-2 border border-gray-400 text-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{ __('Country...') }}</option>
                    @foreach ($countries as $name => $id)
                        <option class="bg-transparent dark:bg-slate-800" value="{{ $id }}">{{ __($name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="basis-0 md:basis-1/2">
                <select wire:model="national_committee_id"
                    class="rounded-full bg-transparent w-full px-4 py-2 border border-gray-400 text-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{ __('National committees...') }}</option>
                    @foreach ($national_committees as $business_name => $id)
                        <option class="bg-transparent dark:bg-slate-800" value="{{ $id }}">{{ $business_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <table class="container mx-0 iPhoneSE:mx-5 md:mx-10 w-[85%] sm:w-full">
            <thead class="sticky top-5 md:top-18 z-40 h-12 w-full bg-gray-300 rounded-full">
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
            <tbody class="w-full">
                @foreach ($candidates as $candidate)
                    <tr class="w-full border-b text-xs iPhoneSE:text-base border-gray-300">
                        <td class="px-1 sm:px-2 py-3 text-xs md:text-base font-bold break-words iPhoneSE:break-normal">
                            {{ $candidate->id }}
                        </td>
                        <td class="px-1 sm:px-2 py-3 text-xs md:text-base font-bold break-words iPhoneSE:break-normal">
                            <span>
                                <i
                                    class="fi fi-{{ $candidate->country->iso3166_1_alpha2 }} fis rounded-full scale-125"></i>
                            </span>
                            <span>{{ __($candidate->country->name) }}</span>
                        </td>
                        <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                            {{ $candidate->first_name . ' ' . $candidate->second_name . ' ' . $candidate->first_last_name . ' ' . $candidate->second_last_name }}
                        </td>
                        <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                            {{ $candidate->national_committee->business_name }}
                        </td>
                        <td
                            class="flex gap-1 justify-center items-center px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                            <button
                                class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-cyan-500 to-blue-900 text-white">
                                <i class="scale-[0.6] md:scale-100 fa-solid fa-eye"></i>
                            </button>
                            <a href="{{ route('d-candidate-edit', $candidate) }}">
                                <button
                                    class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-yellow-500 to-amber-600 text-white">
                                    <i class="scale-[0.6] md:scale-100 fa-solid fa-pen"></i>
                                </button>
                            </a>
                            <button wire:click="selectedCandidateToDelete({{ $candidate }})"
                                class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-red-500 to-red-900 text-white">
                                <i class="scale-[0.6] md:scale-100 fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $candidates->links() }}
        {{-- <div x-show="confirmingDeleteCandidate">
            <div class="flex justify-center">
                <div
                    class="container z-50 absolute top-1/2 w-6/12 h-auto bg-white/70 dark:bg-slate-800/70 backdrop-blur-xl shadow-lg rounded-lg">
                    <div class="text-green-500 text-center text-9xl">
                        <span><i class="my-10 fa-solid fa-check-circle"></i></span>
                    </div>
                    <h3 class="text-gray-800 dark:text-white my-6 text-3xl text-center font-bold">Usuario eliminado
                        correctamente!</h3>
                    <div class="text-center">
                        <button @click="delete_close()"
                            class="mt-4 rounded-full py-3 px-6 text-white text-2xl font-semibold bg-blue-500">Aceptar</button>
                    </div>
                </div>
            </div>
        </div> --}}
        <x-modals.question-modal wire:model="confirmingDeleteCandidate">
            <x-slot name="title">
                <div class="">
                    {{ __('Delete candidate') }}
                </div>
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you would like to delete this candidate?') }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingDeleteCandidate')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-jet-danger-button>
            </x-slot>
        </x-modals.question-modal>
        {{-- <div class="z-50 absolute">

            <x-jet-confirmation-modal wire:model="confirmingDeleteCandidate">
                <x-slot name="title">
                    <div class="">
                        {{ __('Delete candidate') }}
                    </div>
                </x-slot>

                <x-slot name="content">
                    {{ __('Are you sure you would like to delete this candidate?') }}
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('confirmingDeleteCandidate')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
                        {{ __('Delete') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-confirmation-modal>
        </div> --}}
    </div>
</section>
