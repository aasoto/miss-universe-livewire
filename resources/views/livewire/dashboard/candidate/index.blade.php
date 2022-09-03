<div>
    <h1>Listado de candidatas</h1>
    <x-jet-action-message on="deleted">
        {{__('Deleted candidate successfully')}}
    </x-jet-action-message>
    <table class="table w-full">
        <thead>
            <tr>
                <th>País</th>
                <th>Nombres</th>
                <th>Comité nacional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidates as $candidate)
                <tr>
                    <td>{{ $candidate->country->name }}</td>
                    <td>{{ $candidate->first_name.' '.$candidate->second_name.' '.$candidate->first_last_name.' '.$candidate->second_last_name }}</td>
                    <td>{{ $candidate->national_committee->business_name }}</td>
                    <td>
                        <a href="{{ route('d-candidate-edit', $candidate) }}">Editar</a>
                        <x-jet-danger-button
                        onclick="confirm('¿Seguro que desea eliminar el registro seleccionado?') || event.stopImmediatePropagation()"
                        wire:click="delete({{ $candidate }})">
                            Eliminar
                        </x-jet-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $candidates->links() }}
</div>
