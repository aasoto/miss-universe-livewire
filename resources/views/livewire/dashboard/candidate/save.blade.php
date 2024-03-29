<section class="pt-32">
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{ __('Created candidate successfully') }}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{ __('Updated candidate successfully') }}
        </div>
    </x-jet-action-message>
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 dark:gap-9">
            <div class="col-span-1 lg:col-span-2 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="country">
                    {{__('Country')}}
                </label>
                <x-jet-input-error for='country_id' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2"
                    wire:model="country_id">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select...')}}</option>
                    @foreach ($countries as $name => $id)
                        <option class="bg-transparent dark:bg-slate-800" value="{{ $id }}">
                            {{ __($name) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="first_name">
                    {{__('First name')}}
                </label>
                <x-jet-input-error for='first_name' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="first_name" type="text">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="first_name">
                    {{__('Second name')}}
                </label>
                <x-jet-input-error for='second_name' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="second_name" type="text">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="first_name">
                    {{__('First surname')}}
                </label>
                <x-jet-input-error for='first_last_name' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="first_last_name"" type="text">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="first_name">
                    {{__('Second surname')}}
                </label>
                <x-jet-input-error for='second_last_name' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="second_last_name" type="text">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="hometown">
                    {{__('Hometown')}}
                </label>
                <x-jet-input-error for='hometown' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="hometown" type="text">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="gender">
                    {{__('Gender')}}
                </label>
                <x-jet-input-error for='gender' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select  class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2"
                    wire:model="gender">
                    <option value="">{{__('Select...')}}</option>
                    <option value="f">{{__('Female')}}</option>
                    <option value="m">{{__('Male')}}</option>
                </select>
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="birthdate">
                    {{__('Birthdate')}}
                </label>
                <x-jet-input-error for='birthdate' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="birthdate" type="date">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="age">
                    {{__('Age')}}
                </label>
                <x-jet-input-error for='age' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="age" type="number">
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="national_committee_id">
                    {{__('National committee')}}
                </label>
                <x-jet-input-error for='national_committee_id' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2"
                    wire:model="national_committee_id">
                    <option value="">{{__('Select...')}}</option>
                    @foreach ($national_committees as $key => $value)
                        <option value="{{ $value['id'] }}">{{ $value['business_name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="first_name">
                    {{__('Official Picture')}}
                </label>
                <x-jet-input-error for='official_picture' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <div class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2">
                    <x-jet-input type="file" wire:model="official_picture" class="w-full"/>
                </div>
                @if ($candidate && $candidate->official_picture)
                <div class="flex justify-center items-center">
                    <img class="w-2/3 mt-5 object-cover object-center rounded-lg" src="{{ $candidate->getImageUrl() }}" />
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


{{-- <div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-jet-action-message on="created">
            <div class="box-success-action-message">
                {{ __('Created candidate successfully') }}
            </div>
        </x-jet-action-message>
        <x-jet-action-message on="updated">
            <div class="box-success-action-message">
                {{ __('Updated candidate successfully') }}
            </div>
        </x-jet-action-message>
        <x-jet-form-section submit="submit">

            @slot('title')
                {{ __('Candidate') }}
            @endslot

            @slot('description')
                {{ 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore sunt quos pariatur nam, aliquam reprehenderit aliquid quisquam magni est molestiae exercitationem, ut similique ad totam laborum. Expedita, suscipit. Nisi, ratione.' }}
            @endslot

            @slot('form')
                <div class="col-span-6">
                    <x-jet-label>País</x-jet-label>
                    <x-jet-input-error for='country_id' />
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model="country_id">
                        <option value="">Seleccionar...</option>
                        @foreach ($countries as $name => $id)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="">Primer nombre</x-jet-label>
                    <x-jet-input-error for='first_name' />
                    <x-jet-input type="text" wire:model="first_name" class="w-full" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="">Segundo nombre</x-jet-label>
                    <x-jet-input-error for='second_name' />
                    <x-jet-input type="text" wire:model="second_name" class="w-full" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="">Primer apellido</x-jet-label>
                    <x-jet-input-error for='first_last_name' />
                    <x-jet-input type="text" wire:model="first_last_name" class="w-full" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="">Segundo apellido</x-jet-label>
                    <x-jet-input-error for='second_last_name' />
                    <x-jet-input type="text" wire:model="second_last_name" class="w-full" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="">Genero</x-jet-label>
                    <x-jet-input-error for='gender' />
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model="gender">
                        <option value="">Seleccionar...</option>
                        <option value="f">Femenino</option>
                        <option value="m">Masculino</option>
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="">Fecha de nacimiento</x-jet-label>
                    <x-jet-input-error for='birthdate' />
                    <x-jet-input type="date" wire:model="birthdate" class="w-full" />
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label>Comité nacional</x-jet-label>
                    <x-jet-input-error for='national_committee_id' />
                    <select
                        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        wire:model="national_committee_id">
                        <option value="">Seleccionar...</option>
                        @foreach ($national_committees as $key => $value)
                            <option value="{{ $value['id'] }}">{{ $value['business_name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-jet-label for="">Foto oficial</x-jet-label>
                    <x-jet-input-error for='official_picture' />
                    <x-jet-input type="file" wire:model="official_picture" class="w-full" />

                    @if ($candidate && $candidate->official_picture)
                        <img class="w-40 mt-3" src="{{ $candidate->getImageUrl() }}" />
                    @endif
                </div>
            @endslot

            @slot('actions')
                <x-jet-button type="submit">Enviar</x-jet-button>
            @endslot

        </x-jet-form-section>
    </div>
</div> --}}
