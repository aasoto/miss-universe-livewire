<br>
<img class="mx-auto w-5/6 h-80 rounded-lg shadow-lg" src="{{$news->getImageURL()}}" alt="">
<div class="flex flex-wrap -mt-12 mx-auto w-4/6 shadow-lg">
    <div class="rounded-lg bg-white p-4 sm:p-8">
        <div class="font-inter font-extrabold text-4xl text-black tracking-tight">{{ $news->title }}</div>
        <div class="mt-1 font-medium text-sm text-slate-500">{{ $news->date_publish }}</div>
        <div class="font-inter font-bold text-lg text-black tracking-tight">{{ $news->subtitle }}</div>
        <p class="mt-4 leading-7 text-slate-500">{!! $news->content !!}</p>
        <p class="mt-4 leading-7 text-slate-500">{!! $news->content !!}</p>
        <p class="mt-4 leading-7 text-slate-500">{!! $news->content !!}</p>
        <p class="mt-4 leading-7 text-slate-500">{!! $news->content !!}</p>
        <p class="mt-4 leading-7 text-slate-500">{!! $news->content !!}</p>
    </div>
</div>
<br>
@if (auth()->check())
<div class="flex flex-wrap mx-auto w-4/6 shadow-lg">
    <div class="flex flex-wrap w-full rounded-lg bg-white p-4 sm:p-8">
        @if ($news->posted == 'yes')
            @livewire('news.qualify', ['news' => $news, 'type' => 'add'])
            {{-- @livewire('news.qualify') --}}
        @endif
    </div>
</div>
<br>
@endif
@if ($news->posted == 'yes')
    @livewire('blog.news.comments.index', ['news_id' => $news->id])
@endif
<br><br>
