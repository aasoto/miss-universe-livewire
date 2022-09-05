@slot('header')
{{__('Candidates')}}
@endslot

<x-card.card-primary class="items-center">
    @slot('title')
        Listado de candidatas
    @endslot
    <x-jet-action-message on="deleted">
        <div class="box-success-action-message">
            {{__('Deleted candidate successfully')}}
        </div>
    </x-jet-action-message>
    <a href="{{route('d-candidate-create')}}">
        <x-btn.button-success class="my-2">
            {{__('NUEVA CANDIDATA')}}
        </x-btn.button-success>
    </a>
    <table class="table w-full">
        <thead class="text-left bg-gray-100">
            <tr class="border-b">
                <th class="p-2">País</th>
                <th class="p-2">Nombres</th>
                <th class="p-2">Comité nacional</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidates as $candidate)
                <tr class="border-b">
                    <td class="p-2">{{ $candidate->country->name }}</td>
                    <td class="p-2">{{ $candidate->first_name.' '.$candidate->second_name.' '.$candidate->first_last_name.' '.$candidate->second_last_name }}</td>
                    <td class="p-2">{{ $candidate->national_committee->business_name }}</td>
                    <td class="p-2">
                        <a href="{{ route('d-candidate-edit', $candidate) }}" class="mr-2">Editar</a>
                        <x-jet-danger-button
                            {{--onclick="confirm('¿Seguro que desea eliminar el registro seleccionado?') || event.stopImmediatePropagation()"--}}
                            wire:click="selectedCandidateToDelete({{ $candidate }})">
                            Eliminar
                        </x-jet-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $candidates->links() }}

    <!-- Remove Team Member Confirmation Modal -->
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
</x-card.card-primary>
