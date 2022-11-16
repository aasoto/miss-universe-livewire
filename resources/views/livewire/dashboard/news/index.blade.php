<section>
    <div class="pt-24 flex flex-col justify-center items-center">
        <x-jet-action-message on="deleted">
            <div class="box-success-action-message">
                {{__('Deleted news successfully')}}
            </div>
        </x-jet-action-message>
        <div class="grid grid-cols-2 md:grid-cols-6 lg:grid-cols-12 gap-3 mb-2 w-full">
            <div class="col-span-1 md:col-span-5">
                <a href="{{ route('d-news-create') }}">
                    <button
                        class="w-full rounded-full px-4 py-2 bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 text-white text-medium font-bold hover:bg-green-700 hover:scale-110 transition duration-200">
                        {{ __('Add news') }}
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
            <div class="col-span-6">
                <input
                    class="rounded-full bg-transparent w-full px-4 py-2 border border-gray-400 text-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50"
                    type="text" wire:model="search" placeholder="{{ __('Search') }}">
            </div>
            <div class="col-span-1 md:col-span-3 lg:col-span-6">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent mt-0 dark:mt-4 px-4 scale-[0.8] translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="from">
                    {{__('From')}}
                </label>
                <x-jet-input-error for='from' />
                <input class="w-full rounded-full bg-transparent border bg-white dark:bg-transparent border-gray-400 text-gray-400 mt-0 dark:mt-3 px-4 py-2"
                    wire:model="from" type="date">
            </div>
            <div class="col-span-1 md:col-span-3 lg:col-span-6">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent mt-0 dark:mt-4 px-4 scale-[0.8] translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="to">
                    {{__('To')}}
                </label>
                <x-jet-input-error for='to' />
                <input class="w-full rounded-full bg-transparent border bg-white dark:bg-transparent border-gray-400 text-gray-400 mt-0 dark:mt-3 px-4 py-2"
                    wire:model="to" type="date">
            </div>
            <div class="col-span-2 lg:col-span-4">
                <select wire:model="posted"
                    class="w-full bg-transparent border-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-full">
                    <option value="">{{__('Posted...')}}</option>
                    <option value="yes">{{__('Yes')}}</option>
                    <option value="not">{{__('Not')}}</option>
                </select>
            </div>
            <div class="col-span-2 lg:col-span-4">
                <select wire:model="category_id"
                class="w-full bg-transparent border-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-full">
                    <option value="">{{__('Category...')}}</option>
                    @foreach ($categories as $name => $id)
                        <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-2 lg:col-span-4">
                <select wire:model="type"
                class="w-full bg-transparent border-gray-400 focus:border-cyan-300 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-full">
                    <option value="">{{__('Type...')}}</option>
                    <option value="article">{{__('Article')}}</option>
                    <option value="news">{{__('News')}}</option>
                </select>
            </div>
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
            @foreach ($news as $n)
                <tr class="w-full border-b text-xs iPhoneSE:text-base border-gray-300">
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base font-bold break-words iPhoneSE:break-normal">
                        {{ $n->id }}
                    </td>
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base font-bold break-words iPhoneSE:break-normal">
                        {{ $n->title }}
                    </td>
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                        {{ str($n->subtitle)->substr(0, 15) }}
                    </td>
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                        {{ $n->date_publish }}
                    </td>
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                        {{ $n->posted }}
                    </td>
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                        {{ $n->type }}
                    </td>
                    <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                        {{ $n->category->name }}
                    </td>
                    <td class="flex gap-1 justify-center items-center px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                        <button
                            class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-cyan-500 to-blue-900 text-white">
                            <i class="scale-[0.6] md:scale-100 fa-solid fa-eye"></i>
                        </button>
                        <a href="{{ route('d-news-edit', $n) }}">
                            <button
                                class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-yellow-500 to-amber-600 text-white">
                                <i class="scale-[0.6] md:scale-100 fa-solid fa-pen"></i>
                            </button>
                        </a>
                        <button wire:click="selectedNewsToDelete({{ $n }})"
                            class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-red-500 to-red-900 text-white">
                            <i class="scale-[0.6] md:scale-100 fa-solid fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $news->links() }}
    <x-jet-confirmation-modal wire:model="confirmingDeleteNews">
        <x-slot name="title">
            <div class="">
                {{ __('Delete news') }}
            </div>
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this news?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingDeleteNews')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</section>
{{-- <x-card.card-primary class="items-center">
    @slot('title')
        Listado de noticias
    @endslot
    <x-jet-action-message on="deleted">
        <div class="box-success-action-message">
            {{__('Deleted news successfully')}}
        </div>
    </x-jet-action-message>
    <div class="grid grid-cols-6 gap-2 mb-2">
        <div class="col-span-6 sm:col-span-1">
            <a href="{{route('d-news-create')}}">
                <x-btn.button-success class="py-3">
                    {{__('Nueva noticia')}}
                </x-btn.button-success>
            </a>
        </div>
        <div class="col-span-6 sm:col-span-1">
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
    </div>

    <div class="grid grid-cols-2 mb-2 gap-2">
        <x-jet-input type="text" wire:model="search" class="w-full" placeholder="Buscar"></x-jet-input>
        <div class="grid grid-cols-2 gap-2">
            <x-jet-input type="date" wire:model="from" title="Desde" class="w-full"></x-jet-input>
            <x-jet-input type="date" wire:model="to" title="Hasta" class="w-full"></x-jet-input>
        </div>
    </div>
    <div class="flex gap-2 mb-2">
        <select wire:model="posted"
        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">Posteado</option>
            <option value="yes">Sí</option>
            <option value="not">No</option>
        </select>
        <select wire:model="category_id"
        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">Categoría</option>
            @foreach ($categories as $name => $id)
                <option value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>
        <select wire:model="type"
        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">Tipo</option>
            <option value="article">Articulo</option>
            <option value="news">Noticia</option>
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
            @foreach ($news as $n)
                <tr class="border-b">
                    <td class="p-2">{{ $n->id }}</td>
                    <td class="p-2">{{ $n->title }}</td>
                    <td class="p-2">{{ str($n->subtitle)->substr(0, 15) }}</td>
                    <td class="p-2">{{ $n->date_publish }}</td>
                    <td class="p-2">{{ $n->posted }}</td>
                    <td class="p-2">{{ $n->type }}</td>
                    <td class="p-2">{{ $n->category->name }}</td>
                    <td class="p-2">
                        <a href="{{ route('d-news-edit', $n) }}">Editar</a>
                        <x-jet-danger-button
                        wire:click="selectedNewsToDelete({{ $n }})">
                            Eliminar
                        </x-jet-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $news->links() }}

    <x-jet-confirmation-modal wire:model="confirmingDeleteNews">
        <x-slot name="title">
            <div class="">
                {{ __('Delete news') }}
            </div>
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this news?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingDeleteNews')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</x-card.card-primary> --}}
