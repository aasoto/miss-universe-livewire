<?php

namespace App\Http\Livewire\Dashboard\News;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $confirmingDeleteNews, $newsToDelete;

    public function render()
    {
        $news = News::paginate(10);
        return view('livewire.dashboard.news.index', compact('news'));
    }

    public function selectedNewsToDelete(News $news)
    {
        $this->confirmingDeleteNews = true;
        $this->newsToDelete = $news;
    }

    public function delete()
    {
        $this->confirmingDeleteNews = false;
        $this->newsToDelete->delete();
        $this->emit('deleted');
    }
}
