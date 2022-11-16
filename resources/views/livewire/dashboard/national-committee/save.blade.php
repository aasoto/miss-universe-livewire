<section class="pt-32">
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{__('Created national committee successfully')}}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{__('Updated national committee successfully')}}
        </div>
    </x-jet-action-message>
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 dark:gap-9">
            <div class="col-span-1 lg:col-span-2 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 translate-y-2 dark:-translate-y-1"
                    for="country">
                    {{__('Country')}}
                </label>
                <span class="fi fi-{{$flag}} fis rounded-full scale-150 translate-x-8 translate-y-8"></span>
                <select class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white pl-20 py-2"
                    wire:model="country_id">
                    <option value="">{{__('Select...')}}</option>
                    @foreach ($countries as $name => $id)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="business_name">
                    {{__('Business name')}}
                </label>
                <x-jet-input-error for='business_name' />
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="business_name" type="text">
            </div>
            <div class="col-span-1">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="national_director">
                    {{__('National director')}}
                </label>
                <x-jet-input-error for='national_director' />
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="national_director" type="text">
            </div>
        </div>
        <div class="mt-6 py-6 w-full flex justify-center items-center">
            <button type="submit" class="rounded-full w-2/3 px-4 py-3 text-white font-bold bg-gradient-to-l from-lime-400 via-lime-500 to-green-900 hover:scale-110 transition">
                {{__('Save')}}
            </button>
        </div>
    </form>
</section>
{{-- <div>
    <x-form.form-primary submit="submit" class="items-center">
        @slot('title')
            {{__('Ingresar comité nacional')}}
        @endslot
        @slot('form')
            <div class="col-span-6 mb-0">
                <x-jet-label>País</x-jet-label>
            </div>
            <div class="col-span-6 flex gap-2">
                <span class="fi fi-{{$flag}}" style="width: 50px;"></span>
                <x-jet-input-error for='country_id'/>
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="country_id">
                    <option value="">Seleccionar...</option>
                    @foreach ($countries as $name => $id)
                        <option value="{{$id}}">{{$name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Razón social</x-jet-label>
                <x-jet-input-error for='business_name'/>
                <x-jet-input type="text" wire:model="business_name" class="w-full"/>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label for="">Director nacional</x-jet-label>
                <x-jet-input-error for='national_director'/>
                <x-jet-input type="text" wire:model="national_director" class="w-full"/>
            </div>
        @endslot

        @slot('actions')
            <x-jet-button type="submit">Enviar</x-jet-button>
        @endslot
    </x-form.form-primary>
</div> --}}
