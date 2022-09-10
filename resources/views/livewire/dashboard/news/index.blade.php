@slot('header')
    {{__('News')}}
@endslot
<x-card.card-primary class="items-center">
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
                        {{--onclick="confirm('¿Seguro que desea eliminar el registro seleccionado?') || event.stopImmediatePropagation()"--}}
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

    <!-- Remove Team Member Confirmation Modal -->
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
</x-card.card-primary>
