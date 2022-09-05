@slot('header')
    {{__('National committees')}}
@endslot
<x-card.card-primary class="items-center">
    @slot('title')
        Listado de comités nacionales
    @endslot
    <x-jet-action-message on="deleted">
        <div class="box-success-action-message">
            {{__('Deleted national committee successfully')}}
        </div>
    </x-jet-action-message>
    <a href="{{route('d-nationalcommittee-create')}}">
        <x-btn.button-success class="my-2">
            {{__('NUEVO COMITÉ NACIONAL')}}
        </x-btn.button-success>
    </a>
    <table class="table w-full">
        <thead class="text-left bg-gray-100">
            <tr class="border-b">
                <th class="p-2">País</th>
                <th class="p-2">Razón social</th>
                <th class="p-2">Director nacional</th>
                <th class="p-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($national_committees as $national_committee)
                <tr class="border-b">
                    <td class="p-2">{{$national_committee->country->name}}</td>
                    <td class="p-2">{{$national_committee->business_name}}</td>
                    <td class="p-2">{{$national_committee->national_director}}</td>
                    <td class="p-2">
                        <a href="{{ route('d-nationalcommittee-edit', $national_committee) }}">Editar</a>
                        <x-jet-danger-button
                        {{--onclick="confirm('¿Seguro que desea eliminar el registro seleccionado?') || event.stopImmediatePropagation()"--}}
                        wire:click="selectedNationalCommitteeToDelete({{ $national_committee }})">
                            Eliminar
                        </x-jet-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $national_committees->links() }}
    <!-- Remove Team Member Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingDeleteNationalCommittee">
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
    </x-jet-confirmation-modal>
</x-card.card-primary>
