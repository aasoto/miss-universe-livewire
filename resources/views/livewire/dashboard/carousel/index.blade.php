@slot('header')
    {{__('Carousels')}}
@endslot

<x-card.card-primary class="items-center">
    @slot('title')
        {{__('List of carousels')}}
    @endslot
    <x-jet-action-message on="deleted">
        <div class="box-success-action-message">
            {{__('Deleted item of carousel successfully')}}
        </div>
    </x-jet-action-message>
    <a href="{{route('d-carousel-create')}}">
        <x-btn.button-success class="my-2">
            {{__('NEW ITEM')}}
        </x-btn.button-success>
    </a>
    <table class="table w-full">
        <thead class="text-left bg-gray-100">
            <tr class="border-b">
                <th class="p-2">{{__('Image')}}</th>
                <th class="p-2">{{__('Title')}}</th>
                <th class="p-2">{{__('Secondary image')}}</th>
                <th class="p-2">{{__('Actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carousels as $carousel)
                <tr class="border-b">
                    <td class="p-2">
                        <img src="{{mix('storage/app/public/images/carousels/background/').$carousel->image}}" alt="" class="w-20 h-10">
                    </td>
                    <td class="p-2">
                        @if ($carousel->title != null)
                            {{ $carousel->title }}
                        @else
                            <label class="italic">Importado</label>
                        @endif
                    </td>
                    <td class="p-2">
                        @if ($carousel->secondary_image != null)
                            <img src="{{mix('storage/app/public/images/carousels/secondaries_images/').$carousel->secondary_image}}" alt="" class="w-20 h-10">
                        @endif
                    </td>
                    <td class="p-2">
                        <a href="{{ route('d-carousel-edit', $carousel) }}" class="mr-2">Editar</a>
                        <x-jet-danger-button
                            wire:click="selectedCarouselToDelete({{ $carousel }})">
                            Eliminar
                        </x-jet-danger-button>
                    </td>
                    {{--<td class="p-2">{{ $candidate->first_name.' '.$candidate->second_name.' '.$candidate->first_last_name.' '.$candidate->second_last_name }}</td>
                    <td class="p-2">{{ $candidate->national_committee->business_name }}</td>
                    <td class="p-2">
                        <a href="{{ route('d-candidate-edit', $candidate) }}" class="mr-2">Editar</a>
                        <x-jet-danger-button
                            wire:click="selectedCandidateToDelete({{ $candidate }})">
                            Eliminar
                        </x-jet-danger-button>
                    </td>--}}
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $carousels->links() }}

    <!-- Remove Team Member Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingDeleteCarousel">
        <x-slot name="title">
            <div class="">
                {{ __('Delete carousel') }}
            </div>
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to delete this item?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingDeleteCarousel')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete()" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</x-card.card-primary>
