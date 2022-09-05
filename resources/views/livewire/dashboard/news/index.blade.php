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
    <a href="{{route('d-news-create')}}">
        <x-btn.button-success class="my-2">
            {{__('NUEVA NOTICIA')}}
        </x-btn.button-success>
    </a>
    <table class="table w-full">
        <thead class="text-left bg-gray-100">
            <tr class="border-b">
                <th class="p-2">Título</th>
                <th class="p-2">Subtitulo</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $n)
                <tr class="border-b">
                    <td class="p-2">{{ $n->title }}</td>
                    <td class="p-2">{{ $n->subtitle }}</td>
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
