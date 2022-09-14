<div>

<p>Calificaciones</p>
@foreach ($qualifies as $qualify)
    @livewire('news.qualify-item', ['newsId' => $qualify[0]['id']])
@endforeach
</div>
