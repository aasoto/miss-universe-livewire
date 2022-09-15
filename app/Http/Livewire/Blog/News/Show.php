<?php

namespace App\Http\Livewire\Blog\News;

use App\Models\News;
use Livewire\Component;

class Show extends Component
{

    public $news;
    public $message;

    public function mount($slug)
    {
        $this->news = News::where('slug', $slug)->first();
    }


    public function render()
    {

        return view('livewire.blog.news.show')->layout('layouts.web');
    }
}
