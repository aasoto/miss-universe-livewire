<section class="pt-32">
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{__('Contestant created successfully')}}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{__('Contestant updated successfully')}}
        </div>
    </x-jet-action-message>
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 dark:gap-9">
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="candidate_id">
                    {{__('Candidates')}}
                </label>
                <x-jet-input-error for='candidate_id' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2"
                    wire:model="candidate_id">
                    @if ($candidate_found)
                    <option class="bg-transparent dark:bg-slate-800" value="{{$candidate_id}}">{{$candidate_found[0]->first_name.' '.$candidate_found[0]->second_name.' '.$candidate_found[0]->first_last_name.' '.$candidate_found[0]->second_last_name}}</option>
                    @else
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select...')}}</option>
                    @endif
                    @foreach ($candidates as $key => $value)
                        <option class="bg-transparent dark:bg-slate-800" value="{{$value['id']}}">{{$value['first_name'].' '.$value['second_name'].' '.$value['first_last_name'].' '.$value['second_last_name']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-1 relative">
                <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                    for="edition_id">
                    {{__('Edition')}}
                </label>
                <x-jet-input-error for='edition_id' class="absolute right-10 bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"/>
                <select class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2"
                    wire:model="edition_id">
                    <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select...')}}</option>
                    @foreach ($editions as $name => $id)
                        <option class="bg-transparent dark:bg-slate-800" value="{{ $id }}">{{ $name }}</option>
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
