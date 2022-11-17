<section>
    <div class="pt-24 flex flex-col justify-center items-center">
        <x-jet-action-message on="deleted">
            <div class="box-success-action-message">
                {{__('Deleted item of carousel successfully')}}
            </div>
        </x-jet-action-message>
        <div class="flex fex-row justify-center items-center mb-2 w-full">
            <div class="basis-1/2">
                <a href="{{ route('d-carousel-create') }}">
                    <button
                        class="w-full rounded-full px-4 py-2 bg-gradient-to-r from-lime-400 dark:from-lime-200 to-green-900 dark:to-green-700 text-white text-medium font-bold hover:bg-green-700 hover:scale-110 transition duration-200">
                        {{ __('New item') }}
                    </button>
                </a>
            </div>
        </div>
        <div x-data="data_carousel_list()" x-init="order_carousel()">
            <table class="container mx-0 w-[85%] sm:w-full">
                <thead class="sticky top-5 md:top-18 z-40 h-12 w-full bg-gray-300">
                    <tr class="text-xs iPhoneSE:text-base text-gray-800 font-bold">
                        <th class="rounded-l-3xl px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
                            <i class="fa-solid fa-eye"></i>
                        </th>
                        <th class="px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
                            {{__('Image')}}
                        </th>
                        <th class="px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
                            {{__('Title')}}
                        </th>
                        <th class="px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
                            {{__('Secondary image')}}
                        </th>
                        <th class="rounded-r-3xl px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
                            {{__('Actions')}}
                        </th>
                    </tr>
                </thead>
                <tbody x-ref="items">
                    <template x-for="carousel in filter_Carousel()">
                        <tr class="w-full border-b text-xs iPhoneSE:text-base border-gray-300" :id="carousel.id">
                            <td class="px-1 sm:px-2 py-3 text-xs md:text-base font-bold break-words iPhoneSE:break-normal">
                                <input @change="status(carousel)" type="checkbox" x-model="carousel.visible" :checked="carousel.visible == 1">
                            </td>
                            <td class="px-1 sm:px-2 py-3 text-xs md:text-base font-bold break-words iPhoneSE:break-normal">
                                <img :src="`{{mix('storage/app/public/images/carousels/background/')}}${carousel.image}`" alt="" class="w-20 h-10">
                            </td>
                            <td class="px-1 sm:px-2 py-3 text-xs md:text-base font-bold break-words iPhoneSE:break-normal">
                                <template x-if="carousel.title">
                                    <span @click="carousel.editMode=true" x-show="!carousel.editMode" x-text="carousel.title"></span>
                                    <input @keyup.enter="carousel.editMode=false; $wire.emit('update',carousel)"
                                        type="text" x-show="!carousel.editMode" x-model="carousel.title" class="borde-2 border-gray-800 w-full rounded-md shadow-md">
                                </template>
                                <template x-if="!carousel.title">
                                    <label class="italic">Importado</label>
                                </template>
                            </td>
                            <td class="px-1 sm:px-2 py-3 text-xs md:text-base font-bold break-words iPhoneSE:break-normal">
                                <template x-if="carousel.secondary_image">
                                    <img :src="`{{mix('storage/app/public/images/carousels/secondaries_images/')}}${carousel.secondary_image}`" alt="" class="w-20 h-10">
                                </template>
                            </td>
                            <td class="flex gap-1 justify-center items-center px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                                <button
                                    class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-cyan-500 to-blue-900 text-white">
                                    <i class="scale-[0.6] md:scale-100 fa-solid fa-eye"></i>
                                </button>
                                <a x-bind:href="`carousel/edit/${carousel.id}`">
                                    <button
                                        class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-yellow-500 to-amber-600 text-white">
                                        <i class="scale-[0.6] md:scale-100 fa-solid fa-pen"></i>
                                    </button>
                                </a>
                                <button @click="js_confirmingDeleteCarousel(carousel)"
                                    class="rounded-full my-1 py-1 md:py-2 px-2 md:px-3 bg-gradient-to-r from-red-500 to-red-900 text-white">
                                    <i class="scale-[0.6] md:scale-100 fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</section>

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
