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
    {{-- <table class="table w-full">
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
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    {{ $carousels->links() }} --}}
    <div x-data="data_carousel_list()" x-init="order_carousel()">
        {{-- <ul x-ref="items" class="table-body">
            <template x-for="carousel in filter_Carousel()">
                <li class="flex content-between border-b-2 border-gray-800" :id="carousel.id">
                    <img :src="`{{mix('storage/app/public/images/carousels/background/')}}${carousel.image}`" alt="" class="w-20 h-10">
                    <span @click="carousel.editMode=true" x-show="!carousel.editMode" x-text="carousel.title"></span>
                    <input @keyup.enter="carousel.editMode=false; $wire.emit('update', carousel)"
                        type="text" x-show="carousel.editMode" x-model="carousel.title" class="borde-2 border-gray-800 w-full rounded-md shadow-md">
                    <img :src="`{{mix('storage/app/public/images/carousels/secondaries_images/')}}${carousel.secondary_image}`" alt="" class="w-20 h-10">
                </li>
            </template>
        </ul> --}}
        <table class="table w-full">
            <thead class="text-left bg-gray-100">
                <tr class="border-b">
                    <th class="p-2"><i class="fa-solid fa-eye"></i></th>
                    <th class="p-2">{{__('Image')}}</th>
                    <th class="p-2">{{__('Title')}}</th>
                    <th class="p-2">{{__('Secondary image')}}</th>
                    <th class="p-2">{{__('Actions')}}</th>
                </tr>
            </thead>
            <tbody x-ref="items" class="table-body">
                <template x-for="carousel in filter_Carousel()">
                    <tr class="border-b" :id="carousel.id">
                        <td class="p-2">
                            <input @change="status(carousel)" type="checkbox" x-model="carousel.visible" :checked="carousel.visible == 1">
                        </td>
                        <td class="p-2">
                            <img :src="`{{mix('storage/app/public/images/carousels/background/')}}${carousel.image}`" alt="" class="w-20 h-10">
                        </td>
                        <td class="p-2">
                            <template x-if="carousel.title">
                                <span @click="carousel.editMode=true" x-show="!carousel.editMode" x-text="carousel.title"></span>
                                <input @keyup.enter="carousel.editMode=false; $wire.emit('update',carousel)"
                                    type="text" x-show="!carousel.editMode" x-model="carousel.title" class="borde-2 border-gray-800 w-full rounded-md shadow-md">
                            </template>
                            <template x-if="!carousel.title">
                                <label class="italic">Importado</label>
                            </template>
                        </td>
                        <td class="p-2">
                            <template x-if="carousel.secondary_image">
                                <img :src="`{{mix('storage/app/public/images/carousels/secondaries_images/')}}${carousel.secondary_image}`" alt="" class="w-20 h-10">
                            </template>
                        </td>
                        <td class="p-2">
                            <a x-bind:href="`carousel/edit/${carousel.id}`" class="mr-2">Editar</a>
                            <x-jet-danger-button
                                @click="js_confirmingDeleteCarousel(carousel)">
                                Eliminar
                            </x-jet-danger-button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
    <br>

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

            <x-jet-danger-button class="ml-3" @click="js_delete()" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</x-card.card-primary>
<script>
    function data_carousel_list() {
        return {
            search: "",
            //editMode: false,
            carousels: @entangle('carousels'),
            order_carousel(){
                Sortable.create(this.$refs.items,{
                    onEnd:(event) => {
                        /*console.log(event.item);
                        console.log(event.oldIndex);
                        console.log(event.newIndex);*/
                        /*var carousel_Aux = []
                        document.querySelectorAll(".table-body").forEach(carouselHTML => {
                            this.carousels.forEach(carousel => {
                                console.log(carouselHTML.id);
                                if (carousel.id == carouselHTML.id) {
                                    carousel_Aux.push(item)
                                }
                            })
                        });
                        console.log(carousel_Aux);*/
                        var carousel = this.carousels[event.oldIndex]
                        this.carousels.splice(event.oldIndex, 1)
                        this.carousels.splice(event.newIndex, 0, carousel)
                        Livewire.emit("setOrden")
                    }
                })
            },
            filter_Carousel(){
                console.log(this.carousels);
                return this.carousels;
            },
            js_confirmingDeleteCarousel(carousel){
                Livewire.emit('selectedCarouselToDelete', carousel)
            },
            status(carousel){
                Livewire.emit('status', carousel.id, carousel.visible)
            }

        }
    }
    function js_delete(){
        Livewire.emit('delete')
    }
</script>
