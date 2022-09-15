<?php

namespace App\Http\Livewire\Blog\News\Comments;

use App\Models\comment;
use Livewire\Component;

class All extends Component
{
    public $news_id;
    public $comments;

    protected $listeners = ['addComment' => 'add'];

    protected $rules = [
        'news_id' => 'required|integer',
        'message' => 'required|string|max:750'
    ];

    public function mount($news_id)
    {
        $this->news_id = $news_id;
    }

    public function add($news_id, $message)
    {
        comment::create([
            'user_id' => auth()->id(),
            'news_id' => $news_id,
            'message' => $message
        ]);
    }

    public function render()
    {
        $this->comments = comment::where('news_id', $this->news_id)->orderByDesc('id')->get();
        return view('livewire.blog.news.comments.all');
    }

    public function delete($comment_id) {
        $comment = comment::find($comment_id);
        $comment -> delete();
    }

    public function update($comment_id) {

    }
}
