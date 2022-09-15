<?php

namespace App\Http\Livewire\Blog\News\Comments;

use Livewire\Component;

class Added extends Component
{
    public $message, $news_id;

    public function mount($news_id, $message)
    {
        $this->news_id = $news_id;
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.blog.news.comments.added');
    }
}
