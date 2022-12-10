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
    public $tag, $tags = array();

    public $news;

    public $send_button;

    protected $rules = [
        "background" => "nullable|image|mimes:jpeg,jpg,png|max:10240",
        "title" => "required|string|max:200",
        "subtitle" => "nullable|string|max:200",
        "content" => "required|min:7",
        "date_publish" => "nullable|date",
        "posted" => "nullable|string|max:3",
        "category_id" => "required|integer",
        "type" => "nullable|string|max:10",
        "tag" => "nullable|string",
        "tags" => "nullable|array"
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
            $this->load_tags($this->news->tags);
        }
    }

    public function render()
    {
        $this->customize_send_button();
        $categories = Category::pluck('id','name');
        return view('livewire.dashboard.news.save', compact('categories'))->layout('layouts.dashboard.add.app');
    }

    public function customize_send_button ()
    {
        if (strpos(url()->current(), 'news/create')) {
            $this->send_button = 'bg-gradient-to-l from-lime-400 via-lime-500 to-green-900';
        }
        if (strpos(url()->current(), 'news/edit')) {
            $this->send_button = 'bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-700';
        }
    }

    public function add_tags_list ()
    {
        array_push($this->tags, $this->tag);
        $this->tag = '';
    }

    public function remove_tag ($key) {
        $tags_temp = array();
        for ($i=0; $i < count($this->tags); $i++) {
            if($i != $key) {
                array_push($tags_temp, $this->tags[$i]);
            }
        }
        $this->tags = $tags_temp;
    }

    public function load_tags ($tags) {
        if ($tags) {
            $tags = json_decode($tags, true);
            foreach ($tags as $key => $value) {
                array_push($this->tags, $value);
            }
        }
    }

    public function submit()
    {
        $this -> validate();
        $this->tags = json_encode($this->tags);
        if ($this->news) {
            $this->news->update([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'subtitle' => $this->subtitle,
                'content' => $this->content,
                'date_publish' => $this->date_publish,
                'posted' => $this->posted,
                'category_id' => $this->category_id,
                'type' => $this->type,
                'tags' => $this->tags
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
                    'tags' => $this->tags,
                    'user_id' => auth()->id()
                ]
            );
            $this->emit('created');
        }

        $this->tags = json_decode($this->tags);

        if ($this->background) {
            $imageName = $this->news->id.'_news.'.$this->background->getClientOriginalExtension();
            $this->background->storeAs('images/news/background', $imageName, 'public');

            $this->news->update([
                'background' => $imageName
            ]);
        }
    }
}
