@slot('header')
    {{__('Carousel')}}
@endslot
<div>
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

                        {{--<div x-text="active"></div>
                        <div x-text="$wire.step"></div>
                        <div x-text="$wire.get('step')"></div>--}}
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
                        <x-jet-input-error for="button_1_type"/>
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            wire:model="button_1_type">
                            <option value="">{{__('Select type...')}}</option>
                            <option value="default">{{__('Default')}}</option>
                            <option value="gradient_monochrome">{{__('Gradient monochrome')}}</option>
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
                        <x-jet-input-error for="button_2_type"/>
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            wire:model="button_2_type">
                            <option value="">{{__('Select type...')}}</option>
                            <option value="default">{{__('Default')}}</option>
                            <option value="gradient_monochrome">{{__('Gradient monochrome')}}</option>
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
</div>
