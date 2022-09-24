<?php

namespace App\Http\Livewire\Dashboard\News;

use App\Models\Category;
use App\Models\News;
use Livewire\Component;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $background;
    public $title;
    public $subtitle;
    public $content;
    public $date_publish;
    public $posted;
    public $category_id;
    public $type;

    public $news;

    protected $rules = [
        "background" => "nullable|image|mimes:jpeg,jpg,png|max:10240",
        "title" => "required|string|max:200",
        "subtitle" => "nullable|string|max:200",
        "content" => "required|min:7",
        "date_publish" => "nullable|date",
        "posted" => "nullable|string|max:3",
        "category_id" => "required|integer",
        "type" => "nullable|string|max:10"
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->news = News::findOrFail($id);
            $this->title = $this->news->title;
            $this->subtitle = $this->news->subtitle;
            $this->content = $this->news->content;
            $this->date_publish = $this->news->date_publish;
            $this->posted = $this->news->posted;
            $this->category_id = $this->news->category_id;
            $this->type = $this->news->type;
        }
    }

    public function render()
    {
        $categories = Category::pluck('id','name');
        return view('livewire.dashboard.news.save', compact('categories'));
    }

    public function submit()
    {
        $this -> validate();

        if ($this->news) {
            $this->news->update([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'subtitle' => $this->subtitle,
                'content' => $this->content,
                'date_publish' => $this->date_publish,
                'posted' => $this->posted,
                'category_id' => $this->category_id,
                'type' => $this->type
            ]);
            $this->emit('updated');
        } else {
            $this->news = News::create(
                [
                    'title' => $this->title,
                    'slug' => str($this->title)->slug(),
                    'subtitle' => $this->subtitle,
                    'content' => $this->content,
                    'date_publish' => $this->date_publish,
                    'posted' => $this->posted,
                    'category_id' => $this->category_id,
                    'type' => $this->type,
                    'user_id' => auth()->id()
                ]
            );
            $this->emit('created');
        }

        if ($this->background) {
            $imageName = $this->news->id.'_news.'.$this->background->getClientOriginalExtension();
            $this->background->storeAs('images/news/background', $imageName, 'public');

            $this->news->update([
                'background' => $imageName
            ]);
        }
    }
}
