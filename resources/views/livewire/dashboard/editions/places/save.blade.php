<section class="pt-32">
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{__('Place created successfully')}}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{__('Place updated successfully')}}
        </div>
    </x-jet-action-message>
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 dark:gap-9">
            <div class="col-span-1">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="name">
                    {{__('Name')}}
                </label>
                <x-jet-input-error for='name' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="name" type="text">
            </div>
            <div class="col-span-1">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="city_venue_id">
                    {{__('City')}}
                </label>
                <x-jet-input-error for='city_venue_id' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2"
                    wire:model="city_venue_id">
                    <option value="">{{__('Select...')}}</option>
                    @foreach ($city_venues as $key => $value)
                        <option value="{{$value['id']}}">{{$value['city'].', '.$value['state'].', '.$value['country']['name'].'.'}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mt-6 py-6 w-full flex justify-center items-center">
            <button type="submit" class="rounded-full w-2/3 px-4 py-3 text-white font-bold {{$send_button}} hover:scale-110 transition">
                {{__('Save')}}
            </button>
        </div>
    </form>
</section>
