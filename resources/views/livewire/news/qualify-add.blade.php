<div>
    @livewire('news.qualify-item', ['newsId' => $news->id])
    <button class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" wire:click="$emit('addQualificationToQualifies', {{$news}})">Calificar</button>
    <div class="fixed bottom-0 right-14 m-5">
        <div title="Número total de noticias calificadas" class="bg-red-500 rounded-full w-5 h-5 text-white text-sm text-center shadow absolute -top-2 -right-1">{{$total_qualified}}</div>
        <div title="Total de noticias calificadas" class="p-2 bg-pink-500 rounded-full shadow w-10 h-10 border-pink-800 border-4 text-white">
            <i class="fa-solid fa-circle-check mr-8 mb-5"></i>
        </div>
    </div>
    <div class="fixed bottom-0 right-0 m-5">
        <div title="Calificación promedio dada" class="bg-red-500 rounded-full w-5 h-5 text-white text-sm text-center shadow absolute -top-2 -right-1">{{$average}}</div>
        <div title="Promedio de calificaciones" class="p-2 bg-pink-500 rounded-full shadow w-10 h-10 border-pink-800 border-4 text-white">
            <i class="fa-solid fa-star mr-8 mb-5"></i>
        </div>
    </div>
</div>
