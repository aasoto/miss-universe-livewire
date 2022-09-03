<div>
    <h1>Listado de comités nacionales</h1>
    <x-jet-action-message on="deleted">
        {{__('Deleted national committee successfully')}}
    </x-jet-action-message>
    <table class="table w-full">
        <thead>
            <tr>
                <th>País</th>
                <th>Razón social</th>
                <th>Director nacional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($national_committees as $national_committee)
                <tr>
                    <td>{{$national_committee->country->name}}</td>
                    <td>{{$national_committee->business_name}}</td>
                    <td>{{$national_committee->national_director}}</td>
                    <td>
                        <a href="{{ route('d-nationalcommittee-edit', $national_committee) }}">Editar</a>
                        <x-jet-danger-button
                        onclick="confirm('¿Seguro que desea eliminar el registro seleccionado?') || event.stopImmediatePropagation()"
                        wire:click="delete({{ $national_committee }})">
                            Eliminar
                        </x-jet-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $national_committees->links() }}
</div>
