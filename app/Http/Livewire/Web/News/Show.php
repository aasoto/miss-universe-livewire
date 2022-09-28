<?php

namespace App\Http\Livewire\Web\News;

use App\Models\comment;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ["add_comment", "verify_owner"];

    public $data_news, $user_editor, $comments, $auth_user_id, $verified_comment;
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }
    public function render()
    {
        $this->data_news = News::where('slug', $this->slug)->get();
        $this->data_news = json_decode(json_encode($this->data_news));
        $this->user_editor = User::where('id', $this->data_news[0]->user_id)->get();
        $this->user_editor = json_decode(json_encode($this->user_editor));
        $this->comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.id', 'comments.message', 'comments.user_id', 'comments.plus', 'users.name', 'users.profile_photo_path')
            ->where('news_id', '=', $this->data_news[0]->id)
            ->orderBy('comments.id', 'desc')
            ->get();
        $this->comments = json_decode(json_encode($this->comments));
        $this->auth_user_id = auth()->id();
        return view('livewire.web.news.show')->layout('layouts.web.layout');
    }

    public function add_comment($message, $news_id)
    {
        comment::create([
            'user_id' => auth()->id(),
            'news_id' => $news_id,
            'message' => $message
        ]);
    }
}
