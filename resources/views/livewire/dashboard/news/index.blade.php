<div>
    <h1>Listado de noticias</h1>
    <x-jet-action-message on="deleted">
        {{__('Deleted news successfully')}}
    </x-jet-action-message>
    <table class="table w-full">
        <thead>
            <tr>
                <th>Título</th>
                <th>Subtitulo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $n)
                <tr>
                    <td>{{ $n->title }}</td>
                    <td>{{ $n->subtitle }}</td>
                    <td>
                        <a href="{{ route('d-news-edit', $n) }}">Editar</a>
                        <x-jet-danger-button
                        onclick="confirm('¿Seguro que desea eliminar el registro seleccionado?') || event.stopImmediatePropagation()"
                        wire:click="delete({{ $n }})">
                            Eliminar
                        </x-jet-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $news->links() }}
</div>
