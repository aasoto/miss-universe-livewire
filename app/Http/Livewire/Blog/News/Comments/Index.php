<?php

namespace App\Http\Livewire\Blog\News\Comments;

use Livewire\Component;

class Index extends Component
{
    public $message, $news_id, $new = false;

    public function mount($news_id)
    {
        $this->news_id = $news_id;
    }

    public function render()
    {
        return view('livewire.blog.news.comments.index');
    }

    public function submit()
    {
        $this->emit('addComment', $this->news_id, $this->message);
        $this->emit('created');
        $this->new = true;
        $this->message = '';
    }
}
