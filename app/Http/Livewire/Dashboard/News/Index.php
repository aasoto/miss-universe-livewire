<?php

namespace App\Http\Livewire\Dashboard\News;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $news = News::paginate(10);
        return view('livewire.dashboard.news.index', compact('news'));
    }

    public function delete(News $news)
    {
        $news->delete();
        $this->emit('deleted');
    }
}
