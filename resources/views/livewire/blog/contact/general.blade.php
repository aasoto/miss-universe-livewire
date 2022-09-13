<div class="mx-auto my-4">
    <div class="flex">
        <div x-data="{ active:@entangle('step') }" class="flex mx-auto flex-col sm:flex-row">
            <div class="step active-pink" :class="{ 'active-pink': active == 1 }">
                ROL
            </div>
            @if ($step == 2)
            <div class="step" :class="{ 'active-pink': active == 2 }">
                INFORMACIÓN EMPRESA
            </div>
            @elseif ($step == 3)
            <div class="step" :class="{ 'active-pink': active == 3 }">
                INFORMACIÓN PERSONAL
            </div>
            @else
            <div class="step">
                INFORMACIÓN
            </div>
            @endif
            <div class="step" :class="{ 'active-pink': active == 4 }">
                DETALLES
            </div>
        </div>
    </div>
    <br>
    @if ($step == 1)
        <form wire:submit.prevent="submit" class="flex flex-col max-w-sm mx-auto">
            <x-jet-label>{{ __('País de origen') }}</x-jet-label>
            <x-jet-input-error for="country_id" />
            <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                wire:model="country_id">
                <option value="">Seleccionar...</option>
                @foreach ($countries as $name => $id)
                    <option value="{{$id}}">{{$name}}</option>
                @endforeach
            </select>
            <x-jet-label>{{ __('Tipo de interesado') }}</x-jet-label>
            <x-jet-input-error for="type_id" />
            <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                wire:model="type_id">
                <option value="">Seleccionar...</option>
                @foreach ($types as $interested => $id)
                    <option value="{{$id}}">{{$interested}}</option>
                @endforeach
            </select>
            <div class="flex mt-5 justify-end">
                <x-jet-button type="submit" class="">Enviar</x-jet-button>
            </div>
        </form>
    @endif
    @if ($step == 2)
        @livewire('blog.contact.company')
    @endif
    @if ($step == 3)
        @livewire('blog.contact.person')
    @endif
    @if ($step == 4)
        @livewire('blog.contact.detail')
    @endif

</div>
