
<section class="pt-32">
    <x-jet-action-message on="created">
        <div class="box-success-action-message">
            {{__('Created carousel item successfully')}}
        </div>
    </x-jet-action-message>
    <x-jet-action-message on="updated">
        <div class="box-success-action-message">
            {{__('Updated carousel item successfully')}}
        </div>
    </x-jet-action-message>
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-6 gap-5">
            <div class="col-span-6 mb-0 dark:mb-5">
                <div x-data="{ active_new:@entangle('step') }" class="flex mx-auto flex-col sm:flex-row">
                    <div class="step_new active_new" :class="{ 'active_new': active_new == 1 }">
                        {{__('Type')}}
                    </div>
                    @if ($type == 'import')
                    <div class="step_new" :class="{ 'active_new': active_new == 2 }">
                        {{__('Import Image')}}
                    </div>
                    @endif
                    @if ($type == 'make')
                    <div class="step_new" :class="{ 'active_new': active_new == 3 }">
                        {{__('Make Item')}}
                    </div>
                    @endif
                </div>
            </div>
            @if($step == 1)
                <div class="col-span-6">
                    <select class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2"
                        wire:model="type">
                        <option class="bg-transparent dark:bg-slate-800" class="text-gray-900" value="">{{__('Select...')}}</option>
                        <option class="bg-transparent dark:bg-slate-800" class="text-gray-900" value="import">{{__('Import Image')}}</option>
                        <option class="bg-transparent dark:bg-slate-800" class="text-gray-900" value="make">{{__('Make Item')}}</option>
                    </select>
                </div>
            @endif
            @if($step == 2)
                <div class="col-span-6">
                    <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                        for="image">
                        {{__('Import image')}}
                    </label>
                    <x-jet-input-error for='image'/>
                    <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="image" type="file">
                    @if ($carousel && $carousel->image)
                        <img class="w-40 mt-3 rounded-lg" src="{{ $carousel->getImageUrlBackground() }}"/>
                    @endif
                    <input class="w-full my-4 rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="link_redirect" type="text" placeholder="{{__('Redirect link')}}">
                </div>
            @endif
            @if($step == 3)
                <div class="col-span-6 mb-0 dark:mb-3">
                    <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                        for="image">
                        {{__('Image')}}
                    </label>
                    <x-jet-input-error for='image'/>
                    <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="image" type="file">
                    @if ($carousel && $carousel->image)
                    <div class="flex justify-center items-center">
                        <img class="rounded-lg w-60 mt-3" src="{{ $carousel->getImageUrlBackground() }}"/>
                    </div>
                    @endif
                </div>
                <div class="col-span-6 sm:col-span-3 mb-0 dark:mb-3">
                    <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                        for="title">
                        {{__('Title')}}
                    </label>
                    <x-jet-input-error for='title' />
                    <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                        wire:model="title" type="text">
                </div>
                <div class="col-span-6 sm:col-span-3 mb-0 dark:mb-3">
                    <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                        for="subtitle">
                        {{__('Subtitle')}}
                    </label>
                    <x-jet-input-error for='subtitle' />
                    <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                        wire:model="subtitle" type="text">
                </div>
                <div class="col-span-6">
                    <label class="absolute text-md text-gray-500 dark:text-white bg-white dark:bg-transparent px-4 translate-x-8 dark:translate-x-3 -translate-y-3 dark:-translate-y-7"
                        for="secondary_image">
                        {{__('Secondary image')}}
                    </label>
                    <x-jet-input-error for='secondary_image'/>
                    <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="secondary_image" type="file">
                    @if ($carousel && $carousel->secondary_image)
                    <div class="flex justify-center items-center">
                        <img class="rounded-lg w-60 mt-3" src="{{ $carousel->getImageUrlSecondaryImage() }}"/>
                    </div>
                    @endif
                </div>
                <div class="col-span-6 -mb-3">
                    <label class="text-gray-600 dark:text-white">
                        {{__('Button 1')}}
                    </label>
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-input-error for='button_1_text'/>
                    <input type="text" wire:model="button_1_text" placeholder="{{__('Text')}}" class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-input-error for="button_1_color"/>
                    <select class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                        wire:model="button_1_color">
                        <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select color...')}}</option>
                        <option value="0 0 0" class="bg-black text-white">{{__('Black')}}</option>
                        <option value="255 255 255" class="bg-white-500 focus:bg-white-800 text-black">{{__('White')}}</option>
                        <option value="100 116 139" class="bg-slate-500 focus:bg-slate-800 text-white">{{__('Slate')}}</option>
                        <option value="107 114 128" class="bg-gray-500 focus:bg-gray-800 text-white">{{__('Gray')}}</option>
                        <option value="113 113 122" class="bg-zinc-500 focus:bg-zinc-800 text-white">{{__('Zinc')}}</option>
                        <option value="115 115 115" class="bg-neutral-500 focus:bg-neutral-800 text-white">{{__('Neutral')}}</option>
                        <option value="120 113 108" class="bg-stone-500 focus:bg-stone-800 text-white">{{__('Stone')}}</option>
                        <option value="239 68 68" class="bg-red-500 focus:bg-red-800 text-white">{{__('Red')}}</option>
                        <option value="249 115 22" class="bg-orange-500 focus:bg-orange-800 text-white">{{__('Orange')}}</option>
                        <option value="245 158 11" class="bg-amber-500 focus:bg-amber-800 text-white">{{__('Amber')}}</option>
                        <option value="234 179 8" class="bg-yellow-500 focus:bg-yellow-800 text-white">{{__('Yellow')}}</option>
                        <option value="132 204 22" class="bg-lime-500 focus:bg-lime-800 text-white">{{__('Lime')}}</option>
                        <option value="134 239 172" class="bg-green-500 focus:bg-green-800 text-white">{{__('Green')}}</option>
                        <option value="5 150 105" class="bg-emerald-500 focus:bg-emerald-800 text-white">{{__('Emerald')}}</option>
                        <option value="20 184 166" class="bg-teal-500 focus:bg-teal-800 text-white">{{__('Teal')}}</option>
                        <option value="6 182 212" class="bg-cyan-500 focus:bg-cyan-800 text-white">{{__('Cyan')}}</option>
                        <option value="14 165 233" class="bg-sky-500 focus:bg-sky-800 text-white">{{__('Sky')}}</option>
                        <option value="59 130 246" class="bg-blue-500 hover:bg-blue-800 text-white">{{__('Blue')}}</option>
                        <option value="99 102 241" class="bg-indigo-500 focus:bg-indigo-800 text-white">{{__('Indigo')}}</option>
                        <option value="139 92 246" class="bg-violet-500 focus:bg-violet-800 text-white">{{__('Violet')}}</option>
                        <option value="168 85 247" class="bg-purple-500 focus:bg-purple-800 text-white">{{__('Purple')}}</option>
                        <option value="217 70 239" class="bg-fuchsia-500 focus:bg-fuchsia-800 text-white">{{__('Fuchsia')}}</option>
                        <option value="236 72 153" class="bg-pink-500 focus:bg-pink-800 text-white">{{__('Pink')}}</option>
                        <option value="244 63 94" class="bg-rose-500 focus:bg-rose-800 text-white">{{__('Rose')}}</option>
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-input-error for='button_1_link'/>
                    <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="button_1_link" placeholder="{{__('Link')}}" type="text">
                </div>
                <div class="col-span-6 -mb-3">
                    <label class="text-gray-600 dark:text-white">
                        {{__('Button 2')}}
                    </label>
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-input-error for='button_2_text'/>
                    <input type="text" wire:model="button_2_text" placeholder="{{__('Text')}}" class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2">
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-input-error for="button_2_color"/>
                    <select class="w-full rounded-full border-2 bg-transparent border-gray-500 dark:border-white px-10 py-2 focus:border-green-300 focus:ring focus:ring-green-200 focus:ring-opacity-50"
                        wire:model="button_2_color">
                        <option class="bg-transparent dark:bg-slate-800" value="">{{__('Select color...')}}</option>
                        <option value="0 0 0" class="bg-black text-white">{{__('Black')}}</option>
                        <option value="255 255 255" class="bg-white-500 focus:bg-white-800 text-black">{{__('White')}}</option>
                        <option value="100 116 139" class="bg-slate-500 focus:bg-slate-800 text-white">{{__('Slate')}}</option>
                        <option value="107 114 128" class="bg-gray-500 focus:bg-gray-800 text-white">{{__('Gray')}}</option>
                        <option value="113 113 122" class="bg-zinc-500 focus:bg-zinc-800 text-white">{{__('Zinc')}}</option>
                        <option value="115 115 115" class="bg-neutral-500 focus:bg-neutral-800 text-white">{{__('Neutral')}}</option>
                        <option value="120 113 108" class="bg-stone-500 focus:bg-stone-800 text-white">{{__('Stone')}}</option>
                        <option value="239 68 68" class="bg-red-500 focus:bg-red-800 text-white">{{__('Red')}}</option>
                        <option value="249 115 22" class="bg-orange-500 focus:bg-orange-800 text-white">{{__('Orange')}}</option>
                        <option value="245 158 11" class="bg-amber-500 focus:bg-amber-800 text-white">{{__('Amber')}}</option>
                        <option value="234 179 8" class="bg-yellow-500 focus:bg-yellow-800 text-white">{{__('Yellow')}}</option>
                        <option value="132 204 22" class="bg-lime-500 focus:bg-lime-800 text-white">{{__('Lime')}}</option>
                        <option value="134 239 172" class="bg-green-500 focus:bg-green-800 text-white">{{__('Green')}}</option>
                        <option value="5 150 105" class="bg-emerald-500 focus:bg-emerald-800 text-white">{{__('Emerald')}}</option>
                        <option value="20 184 166" class="bg-teal-500 focus:bg-teal-800 text-white">{{__('Teal')}}</option>
                        <option value="6 182 212" class="bg-cyan-500 focus:bg-cyan-800 text-white">{{__('Cyan')}}</option>
                        <option value="14 165 233" class="bg-sky-500 focus:bg-sky-800 text-white">{{__('Sky')}}</option>
                        <option value="59 130 246" class="bg-blue-500 hover:bg-blue-800 text-white">{{__('Blue')}}</option>
                        <option value="99 102 241" class="bg-indigo-500 focus:bg-indigo-800 text-white">{{__('Indigo')}}</option>
                        <option value="139 92 246" class="bg-violet-500 focus:bg-violet-800 text-white">{{__('Violet')}}</option>
                        <option value="168 85 247" class="bg-purple-500 focus:bg-purple-800 text-white">{{__('Purple')}}</option>
                        <option value="217 70 239" class="bg-fuchsia-500 focus:bg-fuchsia-800 text-white">{{__('Fuchsia')}}</option>
                        <option value="236 72 153" class="bg-pink-500 focus:bg-pink-800 text-white">{{__('Pink')}}</option>
                        <option value="244 63 94" class="bg-rose-500 focus:bg-rose-800 text-white">{{__('Rose')}}</option>
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-jet-input-error for='button_2_link'/>
                    <input class="w-full rounded-full border-2 bg-white dark:bg-transparent border-gray-500 dark:border-white px-4 py-2"
                    wire:model="button_2_link" placeholder="{{__('Link')}}" type="text">
                </div>
            @endif
            <div class="col-span-6 flex items-center justify-end gap-3 w-full pb-6 text-right">
                @if ($step == 1)
                    <button wire:click="nextStep()" class="rounded-full w-32 px-4 py-2 text-white font-bold {{ $send_button_color }} hover:scale-110 transition duration-200">
                        {{__('Next')}}
                    </button>
                @else
                    <button wire:click="previousStep()" class="rounded-full w-32 px-4 py-2 font-bold border-2 border-gray-900 dark:border-white bg-transparent hover:bg-gray-900 dark:hover:bg-white text-gray-900 hover:text-white dark:text-white dark:hover:text-gray-900 hover:scale-110 transition duration-200">
                        {{__('Previous')}}
                    </button>
                    <button wire:click="authorize_send()" type="submit" class="rounded-full w-32 px-4 py-2 text-white font-bold {{ $send_button_color }} hover:scale-110 transition duration-200">
                        {{__('Send')}}
                    </button>
                @endif
            </div>
        </div>
    </form>
</section>
{{-- <div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-jet-action-message on="created">
            <div class="box-success-action-message">
                {{__('Created carousel successfully')}}
            </div>
        </x-jet-action-message>
        <x-jet-action-message on="updated">
            <div class="box-success-action-message">
                {{__('Updated carousel successfully')}}
            </div>
        </x-jet-action-message>
        <x-form.form-primary submit="submit" class="items-center">
            @slot('title')
                {{__('New item carousel')}}
            @endslot
            @slot('form')
                <div class="col-span-6">
                    <div x-data="{ active:@entangle('step') }" class="flex mx-auto flex-col sm:flex-row">
                        <div class="step active" :class="{ 'active': active == 1 }">
                            TYPE
                        </div>
                        @if ($type == 'import')
                        <div class="step" :class="{ 'active': active == 2 }">
                            IMPORT IMAGE
                        </div>
                        @endif
                        @if ($type == 'make')
                        <div class="step" :class="{ 'active': active == 3 }">
                            MAKE ITEM
                        </div>
                        @endif
                    </div>
                </div>

                @if($step == 1)
                    <div class="col-span-6">
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            wire:model="type">
                            <option value="">{{__('Select...')}}</option>
                            <option value="import">{{__('Import image')}}</option>
                            <option value="make">{{__('Make item')}}</option>
                        </select>
                    </div>
                @endif
                @if($step == 2)
                    <div class="col-span-6">
                        <x-jet-label for="">{{__('Import image')}}</x-jet-label>
                        <x-jet-input-error for='image'/>
                        <x-jet-input type="file" wire:model="image" class="w-full"/>
                        @if ($carousel && $carousel->image)
                            <img class="w-40 mt-3" src="{{ $carousel->getImageUrlBackground() }}"/>
                        @endif
                        <x-jet-input type="text" wire:model="link_redirect" class="w-full mt-4" placeholder="{{__('Redirect link')}}"/>
                    </div>
                @endif
                @if($step == 3)
                    <div class="col-span-6">
                        <x-jet-label for="">{{__('Image')}}</x-jet-label>
                        <x-jet-input-error for='image'/>
                        <x-jet-input type="file" wire:model="image" class="w-full"/>
                        @if ($carousel && $carousel->image)
                            <img class="w-40 mt-3" src="{{ $carousel->getImageUrlBackground() }}"/>
                        @endif
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="">{{__('Title')}}</x-jet-label>
                        <x-jet-input-error for='title'/>
                        <x-jet-input type="text" wire:model="title" class="w-full"/>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-jet-label for="">{{__('Subtitle')}}</x-jet-label>
                        <x-jet-input-error for='subtitle'/>
                        <x-jet-input type="text" wire:model="subtitle" class="w-full"/>
                    </div>
                    <div class="col-span-6">
                        <x-jet-label for="">{{__('Secondary image')}}</x-jet-label>
                        <x-jet-input-error for='secondary_image'/>
                        <x-jet-input type="file" wire:model="secondary_image" class="w-full"/>
                        @if ($carousel && $carousel->secondary_image)
                            <img class="w-40 mt-3" src="{{ $carousel->getImageUrlSecondaryImage() }}"/>
                        @endif
                    </div>
                    <div class="col-span-6">
                        <x-jet-label>{{__('Button 1')}}</x-jet-label>
                    </div>
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-input-error for='button_1_text'/>
                        <x-jet-input type="text" wire:model="button_1_text" placeholder="{{__('Text')}}" class="w-full"/>
                    </div>
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-input-error for="button_1_color"/>
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            wire:model="button_1_color">
                            <option value="">{{__('Select color...')}}</option>
                            <option value="0 0 0" class="bg-black text-white">{{__('Black')}}</option>
                            <option value="255 255 255" class="bg-white-500 focus:bg-white-800 text-black">{{__('White')}}</option>
                            <option value="100 116 139" class="bg-slate-500 focus:bg-slate-800 text-white">{{__('Slate')}}</option>
                            <option value="107 114 128" class="bg-gray-500 focus:bg-gray-800 text-white">{{__('Gray')}}</option>
                            <option value="113 113 122" class="bg-zinc-500 focus:bg-zinc-800 text-white">{{__('Zinc')}}</option>
                            <option value="115 115 115" class="bg-neutral-500 focus:bg-neutral-800 text-white">{{__('Neutral')}}</option>
                            <option value="120 113 108" class="bg-stone-500 focus:bg-stone-800 text-white">{{__('Stone')}}</option>
                            <option value="239 68 68" class="bg-red-500 focus:bg-red-800 text-white">{{__('Red')}}</option>
                            <option value="249 115 22" class="bg-orange-500 focus:bg-orange-800 text-white">{{__('Orange')}}</option>
                            <option value="245 158 11" class="bg-amber-500 focus:bg-amber-800 text-white">{{__('Amber')}}</option>
                            <option value="234 179 8" class="bg-yellow-500 focus:bg-yellow-800 text-white">{{__('Yellow')}}</option>
                            <option value="132 204 22" class="bg-lime-500 focus:bg-lime-800 text-white">{{__('Lime')}}</option>
                            <option value="134 239 172" class="bg-green-500 focus:bg-green-800 text-white">{{__('Green')}}</option>
                            <option value="5 150 105" class="bg-emerald-500 focus:bg-emerald-800 text-white">{{__('Emerald')}}</option>
                            <option value="20 184 166" class="bg-teal-500 focus:bg-teal-800 text-white">{{__('Teal')}}</option>
                            <option value="6 182 212" class="bg-cyan-500 focus:bg-cyan-800 text-white">{{__('Cyan')}}</option>
                            <option value="14 165 233" class="bg-sky-500 focus:bg-sky-800 text-white">{{__('Sky')}}</option>
                            <option value="59 130 246" class="bg-blue-500 hover:bg-blue-800 text-white">{{__('Blue')}}</option>
                            <option value="99 102 241" class="bg-indigo-500 focus:bg-indigo-800 text-white">{{__('Indigo')}}</option>
                            <option value="139 92 246" class="bg-violet-500 focus:bg-violet-800 text-white">{{__('Violet')}}</option>
                            <option value="168 85 247" class="bg-purple-500 focus:bg-purple-800 text-white">{{__('Purple')}}</option>
                            <option value="217 70 239" class="bg-fuchsia-500 focus:bg-fuchsia-800 text-white">{{__('Fuchsia')}}</option>
                            <option value="236 72 153" class="bg-pink-500 focus:bg-pink-800 text-white">{{__('Pink')}}</option>
                            <option value="244 63 94" class="bg-rose-500 focus:bg-rose-800 text-white">{{__('Rose')}}</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-input-error for='button_1_link'/>
                        <x-jet-input type="text" wire:model="button_1_link" placeholder="{{__('Link')}}" class="w-full"/>
                    </div>
                    <div class="col-span-6">
                        <x-jet-label>{{__('Button 2')}}</x-jet-label>
                    </div>
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-input-error for='buttin_2_text'/>
                        <x-jet-input type="text" wire:model="button_2_text" placeholder="{{__('Text')}}" class="w-full"/>
                    </div>
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-input-error for="button_2_color"/>
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            wire:model="button_2_color">
                            <option value="">{{__('Select color...')}}</option>
                            <option value="0 0 0" class="bg-black text-white">{{__('Black')}}</option>
                            <option value="255 255 255" class="bg-white-500 focus:bg-white-800 text-black">{{__('White')}}</option>
                            <option value="100 116 139" class="bg-slate-500 focus:bg-slate-800 text-white">{{__('Slate')}}</option>
                            <option value="107 114 128" class="bg-gray-500 focus:bg-gray-800 text-white">{{__('Gray')}}</option>
                            <option value="113 113 122" class="bg-zinc-500 focus:bg-zinc-800 text-white">{{__('Zinc')}}</option>
                            <option value="115 115 115" class="bg-neutral-500 focus:bg-neutral-800 text-white">{{__('Neutral')}}</option>
                            <option value="120 113 108" class="bg-stone-500 focus:bg-stone-800 text-white">{{__('Stone')}}</option>
                            <option value="239 68 68" class="bg-red-500 focus:bg-red-800 text-white">{{__('Red')}}</option>
                            <option value="249 115 22" class="bg-orange-500 focus:bg-orange-800 text-white">{{__('Orange')}}</option>
                            <option value="245 158 11" class="bg-amber-500 focus:bg-amber-800 text-white">{{__('Amber')}}</option>
                            <option value="234 179 8" class="bg-yellow-500 focus:bg-yellow-800 text-white">{{__('Yellow')}}</option>
                            <option value="132 204 22" class="bg-lime-500 focus:bg-lime-800 text-white">{{__('Lime')}}</option>
                            <option value="134 239 172" class="bg-green-500 focus:bg-green-800 text-white">{{__('Green')}}</option>
                            <option value="5 150 105" class="bg-emerald-500 focus:bg-emerald-800 text-white">{{__('Emerald')}}</option>
                            <option value="20 184 166" class="bg-teal-500 focus:bg-teal-800 text-white">{{__('Teal')}}</option>
                            <option value="6 182 212" class="bg-cyan-500 focus:bg-cyan-800 text-white">{{__('Cyan')}}</option>
                            <option value="14 165 233" class="bg-sky-500 focus:bg-sky-800 text-white">{{__('Sky')}}</option>
                            <option value="59 130 246" class="bg-blue-500 hover:bg-blue-800 text-white">{{__('Blue')}}</option>
                            <option value="99 102 241" class="bg-indigo-500 focus:bg-indigo-800 text-white">{{__('Indigo')}}</option>
                            <option value="139 92 246" class="bg-violet-500 focus:bg-violet-800 text-white">{{__('Violet')}}</option>
                            <option value="168 85 247" class="bg-purple-500 focus:bg-purple-800 text-white">{{__('Purple')}}</option>
                            <option value="217 70 239" class="bg-fuchsia-500 focus:bg-fuchsia-800 text-white">{{__('Fuchsia')}}</option>
                            <option value="236 72 153" class="bg-pink-500 focus:bg-pink-800 text-white">{{__('Pink')}}</option>
                            <option value="244 63 94" class="bg-rose-500 focus:bg-rose-800 text-white">{{__('Rose')}}</option>
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-2">
                        <x-jet-input-error for='button_2_link'/>
                        <x-jet-input type="text" wire:model="button_2_link" placeholder="{{__('Link')}}" class="w-full"/>
                    </div>
                @endif
            @endslot
            @slot('actions')
                @if ($step == 1)
                    <x-jet-button wire:click="nextStep()">{{__('Next')}}</x-jet-button>
                @else
                    <x-jet-secondary-button wire:click="previousStep()">{{__('Previous')}}</x-jet-secondary-button>
                    <x-jet-button type="submit">{{__('Send')}}</x-jet-button>
                @endif
            @endslot
        </x-form.form-primary>
    </div>
</div> --}}
