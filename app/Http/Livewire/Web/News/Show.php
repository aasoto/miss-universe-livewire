<?php

namespace App\Http\Livewire\Web\News;

use App\Models\comment;
use App\Models\News;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ["add_comment", "verify_owner", "delete_comment", "confirm_alert_deleted", "update_comment"];

    public $data_news, $user_editor, $comments, $verified_comment, $new_comment;
    public $auth_user_id, $auth_user_name, $auth_user_profile_photo_path, $deleted_comment;
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }
    public function render()
    {
        $this->data_news = News::where('slug', $this->slug)->get();
        $this->data_news = json_decode(json_encode($this->data_news));
        $this->user_editor = User::where('id', $this->data_news[0]->user_id)->get();
        $this->user_editor[0]->country = $this->user_editor[0]->country;
        $this->user_editor = json_decode(json_encode($this->user_editor));
        $this->comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.id', 'comments.message', 'comments.user_id', 'comments.plus', 'users.name', 'users.profile_photo_path')
            ->where('news_id', '=', $this->data_news[0]->id)
            ->orderBy('comments.id', 'desc')
            ->get();
        $this->comments = json_decode(json_encode($this->comments));
        $this->auth_user_id = auth()->id();
        if (auth()->id()) {
            $this->auth_user_name = Auth::user()->name;
            $this->auth_user_profile_photo_path = Auth::user()->profile_photo_path;
        }
        return view('livewire.web.news.show')->layout('layouts.web.layout');
    }

    public function add_comment($message, $news_id)
    {
        $this->new_comment = comment::create([
            'user_id' => auth()->id(),
            'news_id' => $news_id,
            'message' => $message
        ]);
        $this->new_comment = $this->new_comment->message;
    }

    public function delete_comment($comment_id)
    {
        $this->deleted_comment = comment::where('id', $comment_id)->delete();
    }

    public function confirm_alert_deleted(){
        $this->deleted_comment = false;
    }

    public function update_comment($comment_id, $message)
    {
        comment::where("id", $comment_id)->update(['message' => $message]);
    }
}
