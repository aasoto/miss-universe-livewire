<section class="pt-32">
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
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 dark:gap-9">
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="year">
                    {{__('Year')}}
                    <span class="text-red-600 font-bold">*</span>
                </label>
                <x-jet-input-error for='year' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="year" type="number">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="name">
                    {{__('Name')}}
                    <span class="text-red-600 font-bold">*</span>
                </label>
                <x-jet-input-error for='name' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="name" type="text">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="official_name">
                    {{__('Official name')}}
                </label>
                <x-jet-input-error for='official_name' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="official_name" type="text">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="start_concentration">
                    {{__('Start concentration')}}
                </label>
                <x-jet-input-error for='start_concentration' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="start_concentration" type="date">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="end_concentration">
                    {{__('End concentration')}}
                </label>
                <x-jet-input-error for='end_concentration' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="end_concentration" type="date">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="hotel_concentration">
                    {{__('Hotel concentration')}}
                </label>
                <x-jet-input-error for='hotel_concentration' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="hotel_concentration" type="text">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="date_preliminary">
                    {{__('Preliminary competition date')}}
                </label>
                <x-jet-input-error for='date_preliminary' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="date_preliminary" type="date">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="date">
                    {{__('Final date')}}
                </label>
                <x-jet-input-error for='date' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="date" type="date">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="broadcaster_id">
                    {{__('Main broadcaster channel')}}
                </label>
                <x-jet-input-error for='broadcaster_id' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="broadcaster_id">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select...')}}</option>
                    @foreach ($broadcasters as $name => $id)
                        <option class="bg-transparent dark:bg-slate-800" value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="broadcaster_2">
                    {{__('Secondary broadcaster channel')}}
                </label>
                <x-jet-input-error for='broadcaster_2' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="broadcaster_2">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select...')}}</option>
                    @foreach ($broadcasters as $name => $id)
                        <option class="bg-transparent dark:bg-slate-800" value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="place_id">
                    {{__('Place venue')}}
                </label>
                <x-jet-input-error for='place_id' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="place_id">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select...')}}</option>
                    @foreach ($places as $key => $value)
                        <option class="bg-transparent dark:bg-slate-800" value="{{$value['id']}}">{{$value['name'].', '.$value['city_venue']['city'].', '.$value['city_venue']['country']['name'].'.'}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="owner_id">
                    {{__('Owner')}}
                </label>
                <x-jet-input-error for='owner_id' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="owner_id">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select...')}}</option>
                    @foreach ($owners as $key => $value)
                        <option class="bg-transparent dark:bg-slate-800" value="{{$value['id']}}">{{$value['business_name'].' - '.$value['owner_name'].'.'}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="entrants">
                    {{__('Entrants')}}
                </label>
                <x-jet-input-error for='entrants' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="entrants" type="number">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="placements">
                    {{__('Placements')}}
                </label>
                <x-jet-input-error for='placements' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="placements" type="number">
            </div>
            <div class="col-span-1 lg:col-span-2 relative">
                <table class="container mx-0 w-[85%] mt-2 sm:w-full">
                    <thead class="sticky top-5 md:top-18 z-40 h-12 w-full bg-gray-300">
                        <tr class="text-xs iPhoneSE:text-base text-gray-800 font-bold">
                            <th class="rounded-l-3xl px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
                                {{__('Name')}}
                            </th>
                            <th class="px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
                                {{__('Broadcaster')}}
                            </th>
                            <th class="rounded-r-3xl px-3 sm:px-6 py-3 text-xs md:text-base break-words iPhoneSE:break-normal translate-x-4 md:translate-x-0">
                                {{__('Role')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($presenters as $p)
                        <tr class="w-full border-b text-xs iPhoneSE:text-base border-gray-300">
                            <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                                {{ $p->presenter->name }}
                            </td>
                            <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                                {{ $p->presenter->broadcaster->name }}
                            </td>
                            <td class="px-1 sm:px-2 py-3 text-xs md:text-base break-words iPhoneSE:break-normal">
                                @foreach ($roles as $key => $rol)
                                    @if ($p->presenter->rol == $key)
                                        {{ __($rol) }}
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-span-1 lg:col-span-2 text-center">
                <label class="text-lg text-gray-500 dark:text-white mt-5 px-4"
                    for="">
                    {{__('Final top')}}
                </label>
                <div class="flex flex-row justify-evenly items-center">
                    <div class="flex flex-row justify-center gap-3">
                        <x-jet-label for="">Top 3</x-jet-label>
                        @if ($top_3)
                        <input checked id="check_top_3" wire:model="top_3" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        @else
                        <input id="check_top_3" type="checkbox" wire:model="top_3" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        @endif
                    </div>
                    <div class="flex flex-row justify-center gap-3">
                        <x-jet-label for="">Top 5</x-jet-label>
                        @if ($top_5)
                        <input checked id="check_top_5" wire:model="top_5" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        @else
                        <input id="check_top_5" type="checkbox" wire:model="top_5" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        @endif
                    </div>
                    <div class="flex flex-row justify-center gap-3">
                        <x-jet-label for="">Top 6</x-jet-label>
                        @if ($top_6)
                        <input checked id="check_top_6" wire:model="top_6" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        @else
                        <input id="check_top_6" type="checkbox" wire:model="top_6" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-2">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="description">
                    {{ __('Description') }}
                    <span class="text-red-600 font-bold">*</span>
                </label>
                <x-jet-input-error for='description' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <div
                    class="z-10 w-full rounded-3xl border-2 text-gray-800 bg-white dark:bg-transparent border-gray-500 dark:border-white px-0.5 py-3">
                    <div wire:ignore>
                        <textarea id="ckdescription" rows="6">
                            {!! $description !!}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-2 relative">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="description">
                    {{ __('Description HTML view') }}
                </label>
                <x-jet-input-error for='description'  class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <textarea wire:model="description"
                    class="w-full rounded-3xl border-2 text-gray-800 bg-white dark:bg-transparent border-gray-500 dark:border-white px-0.5 py-3"></textarea>
            </div>
            <div class="col-span-1 lg:col-span-2">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="content">
                    {{ __('Content') }}
                </label>
                <x-jet-input-error for='content' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <div
                    class="z-10 w-full rounded-3xl border-2 text-gray-800 bg-white dark:bg-transparent border-gray-500 dark:border-white px-0.5 py-3">
                    <div wire:ignore>
                        <textarea id="ckcontent" rows="6">
                            {!! $content !!}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-2 relative">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="content">
                    {{ __('Content HTML view') }}
                </label>
                <x-jet-input-error for='content'  class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <textarea wire:model="content"
                    class="w-full rounded-3xl border-2 text-gray-800 bg-white dark:bg-transparent border-gray-500 dark:border-white px-0.5 py-3"></textarea>
            </div>
            <div class="col-span-1 lg:col-span-2">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="extra_data">
                    {{ __('Extra data') }}
                </label>
                <x-jet-input-error for='extra_data' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <div
                    class="z-10 w-full rounded-3xl border-2 text-gray-800 bg-white dark:bg-transparent border-gray-500 dark:border-white px-0.5 py-3">
                    <div wire:ignore>
                        <textarea id="ckextradata" rows="6">
                            {!! $extra_data !!}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="col-span-1 lg:col-span-2 relative">
                <label
                    class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="extra_data">
                    {{ __('Extra data HTML view') }}
                </label>
                <x-jet-input-error for='extra_data'  class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <textarea wire:model="extra_data"
                    class="w-full rounded-3xl border-2 text-gray-800 bg-white dark:bg-transparent border-gray-500 dark:border-white px-0.5 py-3"></textarea>
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="logo">
                    {{__('Official logo')}}
                </label>
                <x-jet-input-error for='logo' class="absolute right-28 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input type="file" wire:model="logo" class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2">
                @if ($miss_universe && $miss_universe->logo)
                <div class="flex justify-center items-center">
                    <img class="w-60 mt-5 rounded-lg" src="{{ $miss_universe->getLogoUrl() }}"/>
                </div>
                @endif
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="background">
                    {{__('Background image')}}
                </label>
                <x-jet-input-error for='background' class="absolute right-28 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input type="file" wire:model="background" class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2">
                @if ($miss_universe && $miss_universe->background)
                <div class="flex justify-center items-center">
                    <img class="w-60 mt-5 rounded-lg" src="{{ $miss_universe->getBackgroundUrl() }}"/>
                </div>
                @endif
            </div>
        </div>
        <div class="mt-6 py-6 w-full flex justify-center items-center">
            <button type="submit" class="rounded-full w-2/3 px-4 py-3 text-white font-bold {{$send_button}} hover:scale-110 transition">
                {{__('Save')}}
            </button>
        </div>
    </form>
</section>

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

