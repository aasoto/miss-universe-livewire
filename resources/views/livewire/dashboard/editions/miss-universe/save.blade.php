@slot('header')
{{__('Ingresar - Miss Universe')}}
@endslot

<div class = "items-center flex flex-col sm:justify-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:w-11/12 mt-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="bg-green-500 py-3">
            <h2 class="text-3xl text-center text-white">{{__('Miss Universe Editions')}}</h2>
        </div>
        <div class="px-6 py-4">
            <x-jet-action-message on="created">
                <div class="box-success-action-message">
                    {{__('Miss universe edition created successfully')}}
                </div>
            </x-jet-action-message>
            <x-jet-action-message on="updated">
                <div class="box-success-action-message">
                    {{__('Miss universe edition updated successfully')}}
                </div>
            </x-jet-action-message>
            <form wire:submit.prevent="submit">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="">Año</x-jet-label>
                            <x-jet-input-error for='year'/>
                            <x-jet-input type="number" wire:model="year" class="w-full"/>
                        </div>
                        <div class="col-span-6 sm:col-span-3 mb-0">
                            <x-jet-label for="">Nombre</x-jet-label>
                            <x-jet-input-error for='name'/>
                            <x-jet-input type="text" wire:model="name" class="w-full"/>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-jet-label for="">Nombre oficial</x-jet-label>
                            <x-jet-input-error for='official_name'/>
                            <x-jet-input type="text" wire:model="official_name" class="w-full"/>
                        </div>
                        <div class="col-span-6 sm:col-span-3 mb-0">
                            <x-jet-label for="">Inicio de concentración</x-jet-label>
                            <x-jet-input-error for='start_concentration'/>
                            <x-jet-input type="date" wire:model="start_concentration" class="w-full"/>
                        </div>
                        <div class="col-span-6 sm:col-span-3 mb-0">
                            <x-jet-label for="">Final de la concentración</x-jet-label>
                            <x-jet-input-error for='end_concentration'/>
                            <x-jet-input type="date" wire:model="end_concentration" class="w-full"/>
                        </div>
                        <div class="col-span-6 sm:col-span-3 mb-0">
                            <x-jet-label for="">Hotel sede</x-jet-label>
                            <x-jet-input-error for='hotel_concentration'/>
                            <x-jet-input type="text" wire:model="hotel_concentration" class="w-full"/>
                        </div>
                        <div class="col-span-6 sm:col-span-3 mb-0">
                            <x-jet-label for="">Fecha de la preliminar</x-jet-label>
                            <x-jet-input-error for='date_preliminary'/>
                            <x-jet-input type="date" wire:model="date_preliminary" class="w-full"/>
                        </div>
                        <div class="col-span-6 sm:col-span-3 mb-0">
                            <x-jet-label for="">Fecha de la final</x-jet-label>
                            <x-jet-input-error for='date'/>
                            <x-jet-input type="date" wire:model="date" class="w-full"/>
                        </div>
                        <div class="col-span-6 sm:col-span-3 mb-0">
                            <x-jet-label for="">Canal de televisión</x-jet-label>
                            <x-jet-input-error for='broadcaster_id'/>
                            <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                wire:model="broadcaster_id">
                                <option value="">Seleccionar...</option>
                                @foreach ($broadcasters as $name => $id)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3 mb-0">
                            <x-jet-label for="">Canal de televisión secondario</x-jet-label>
                            <x-jet-input-error for='broadcaster_2'/>
                            <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                wire:model="broadcaster_2">
                                <option value="">Seleccionar...</option>
                                @foreach ($broadcasters as $name => $id)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3 mb-0">
                            <x-jet-label for="">Recinto sede final</x-jet-label>
                            <x-jet-input-error for='place_id'/>
                            <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                wire:model="place_id">
                                <option value="">Seleccionar...</option>
                                @foreach ($places as $key => $value)
                                    <option value="{{$value['id']}}">{{$value['name'].', '.$value['city_venue']['city'].', '.$value['city_venue']['country']['name'].'.'}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3 mb-0">
                            <x-jet-label for="">Presentador noche final</x-jet-label>
                            <x-jet-input-error for='presenter_id'/>
                            <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                wire:model="presenter_id">
                                <option value="">Seleccionar...</option>
                                @foreach ($presenters as $name => $id)
                                    <option value="{{$id}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-6 mb-0">
                            <x-jet-label for="">Descripción</x-jet-label>
                            <x-jet-input-error for='description'/>
                            <div wire:ignore>
                                <div id="ckdescription">
                                    {!! $description !!}
                                </div>
                            </div>
                            <input type="hidden" wire:model="description">
                        </div>
                        <div class="col-span-6 mb-0">
                            <x-jet-label for="">Contenido</x-jet-label>
                            <x-jet-input-error for='content'/>
                            <div wire:ignore>
                                <div id="ckcontent">
                                    {!! $content !!}
                                </div>
                            </div>
                            <input type="hidden" wire:model="content">
                        </div>
                        <div class="col-span-2 mb-0">
                            <div class="flex flex-row justify-center gap-3">
                                <x-jet-label for="">Top 3</x-jet-label>
                                @if ($top_3)
                                <input checked id="check_top_3" wire:model="top_3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                @else
                                <input id="check_top_3" type="checkbox" wire:model="top_3" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                @endif
                            </div>
                        </div>
                        <div class="col-span-2 mb-0">
                            <div class="flex flex-row justify-center gap-3">
                                <x-jet-label for="">Top 5</x-jet-label>
                                @if ($top_5)
                                <input checked id="check_top_5" wire:model="top_5" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                @else
                                <input id="check_top_5" type="checkbox" wire:model="top_5" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                @endif
                            </div>
                        </div>
                        <div class="col-span-2 mb-0">
                            <div class="flex flex-row justify-center gap-3">
                                <x-jet-label for="">Top 6</x-jet-label>
                                @if ($top_6)
                                <input checked id="check_top_6" wire:model="top_6" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                @else
                                <input id="check_top_6" type="checkbox" wire:model="top_6" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                @endif
                            </div>
                        </div>
                        <div class="col-span-6 mb-0">
                            <x-jet-label for="">Información extra acerca de las candidatas</x-jet-label>
                            <x-jet-input-error for='extra_data'/>
                            <div wire:ignore>
                                <div id="ckextradata">
                                    {!! $extra_data !!}
                                </div>
                            </div>
                            <input type="hidden" wire:model="extra_data">
                        </div>
                        <div class="col-span-6 sm:col-span-3 mb-0">
                            <x-jet-label for="">Logo oficial de la edición</x-jet-label>
                            <x-jet-input-error for='logo'/>
                            <x-jet-input type="file" wire:model="logo" class="w-full"/>
                            @if ($miss_universe && $miss_universe->logo)
                                <img class="w-40 mt-3" src="{{ $miss_universe->getLogoUrl() }}"/>
                            @endif
                        </div>
                        <div class="col-span-6 sm:col-span-3 mb-0">
                            <x-jet-label for="">Portada</x-jet-label>
                            <x-jet-input-error for='background'/>
                            <x-jet-input type="file" wire:model="background" class="w-full"/>
                            @if ($miss_universe && $miss_universe->background)
                                <img class="w-40 mt-3" src="{{ $miss_universe->getBackgroundUrl() }}"/>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <x-jet-button type="submit">Enviar</x-jet-button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Importar plugin ckeditor --}}
<script src="{{asset('js/ckeditor5-build-classic/ckeditor.js')}}"></script>
<script>

    document.addEventListener('livewire:load', function () {
        var ckeditor = null;
        /* Comunicación ckeditor a description */
        var editor = ClassicEditor.create(document.querySelector('#ckdescription')).then(
            editor => {
                ckeditor = editor;
                editor.model.document.on('change:data', () => {
                    @this.description = editor.getData();
                });
            }
        )

        /* Comunicación description a ckeditor */
        Livewire.hook('message.processed', (message, component) => {
            if (message.updateQueue[0].name == 'description') {
                ckeditor.setData(@this.description);
            }
        })

        /*****************************************************************/

        var ckeditor2 = null;
        /* Comunicación ckeditor a content */
        var editor2 = ClassicEditor.create(document.querySelector('#ckcontent')).then(
            editor2 => {
                ckeditor2 = editor2;
                editor2.model.document.on('change:data', () => {
                    @this.content = editor2.getData();
                });
            }
        )

        /* Comunicación content a ckeditor */
        Livewire.hook('message.processed', (message, component) => {
            if (message.updateQueue[0].name == 'content') {
                ckeditor2.setData(@this.content);
            }
        })

        /*****************************************************************/

        var ckeditor3 = null;
        /* Comunicación ckeditor a content */
        var editor3 = ClassicEditor.create(document.querySelector('#ckextradata')).then(
            editor3 => {
                ckeditor3 = editor3;
                editor3.model.document.on('change:data', () => {
                    @this.extra_data = editor3.getData();
                });
            }
        )

        /* Comunicación content a ckeditor */
        Livewire.hook('message.processed', (message, component) => {
            if (message.updateQueue[0].name == 'extra_data') {
                ckeditor3.setData(@this.extra_data);
            }
        })
    })
</script>

