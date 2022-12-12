<?php

namespace App\Http\Livewire\Web\News;

use App\Models\News;
use Livewire\Component;

class Tag extends Component
{
    public $tag, $tagged_news;

    public function mount($tag){
        $this->tag = $tag;
        $delete = '+';
        $add = ' ';
        $this->tag = str_replace($delete, $add, $this->tag);
    }
    public function render()
    {
        $this->tagged_news = News::where('tags', 'like', '%'.$this->tag.'%')->orderByDesc('id')->get();
        $this->tagged_news = json_decode(json_encode($this->tagged_news));
        return view('livewire.web.news.tag')->layout('layouts.web.layout');
    }
}
