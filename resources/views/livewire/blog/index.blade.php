@slot('header')
    {{__('Noticias Miss Universe')}}
@endslot
<x-card.card class="items-center">
    @slot('title')
    <div class="text-5xl font-extrabold ...">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
            Listado de noticias
        </span>
      </div>
    @endslot
    <div class="grid grid-cols-2 mb-2 gap-2">
        <x-jet-input type="text" wire:model="search" class="w-full" placeholder="Buscar"></x-jet-input>
        <div class="grid grid-cols-2 gap-2">
            <x-jet-input type="date" wire:model="from" title="Desde" class="w-full"></x-jet-input>
            <x-jet-input type="date" wire:model="to" title="Hasta" class="w-full"></x-jet-input>
        </div>
    </div>
    <div class="flex gap-2 mb-2">
        <select wire:model="posted"
        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">Posteado</option>
            <option value="yes">Sí</option>
            <option value="not">No</option>
        </select>
        <select wire:model="category_id"
        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">Categoría</option>
            @foreach ($categories as $name => $id)
                <option value="{{$id}}">{{$name}}</option>
            @endforeach
        </select>
        <select wire:model="type"
        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="">Tipo</option>
            <option value="article">Articulo</option>
            <option value="news">Noticia</option>
        </select>
    </div>
    <div class="divide-pink">
        @foreach ($news as $n)
        <div class="py-4">
            <div class="grid grid-cols-6 gap-2 mb-2">
                <div class="col-span-6 sm:col-span-2">
                    <a href="{{ route('web-news-show', $n->slug) }}">
                        <img class="h-40 w-80 shadow-lg rounded-md" src="{{ $n->getImageUrl() }}" alt="">
                    </a>
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <a href="{{ route('web-news-show', $n->slug) }}">
                        <p class="text-2xl">{{$n->title}}</p>
                    </a>
                    <p class="text-sm">{{$n->date_publish}}&nbsp;&nbsp;<a class="bg-pink-600 text-white rounded-md" href="#">&nbsp;{{$n->category->name}}&nbsp;</a></p>
                    <a href="{{ route('web-news-show', $n->slug) }}">
                        <p class="text-lg">{{$n->subtitle}}</p>
                        <p class="text-sm text-justify">{{str($n->content)->substr(0, 250)}}...</p>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    {{ $news->links() }}
</x-card.card>
<br>
<div class="flex mx-auto w-full sm:max-w-4xl bg-white rounded-lg shadow-lg">
    @livewire('blog.contact.general')
</div>
<br>
