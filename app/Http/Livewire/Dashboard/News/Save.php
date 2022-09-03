<?php

namespace App\Http\Livewire\Dashboard\News;

use App\Models\News;
use Livewire\Component;

class Save extends Component
{
    public $title;
    public $subtitle;
    public $content;

    public $news;

    protected $rules = [
        "title" => "required|max:200|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
        "subtitle" => "required|min:5|max:200",
        "content" => "required|min:7"
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->news = News::findOrFail($id);
            $this->title = $this->news->title;
            $this->subtitle = $this->news->subtitle;
            $this->content = $this->news->content;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.news.save');
    }

    public function submit()
    {
        $this -> validate();

        if ($this->news) {
            $this->news->update([
                'title' => $this->title,
                'subtitle' => $this->subtitle,
                'content' => $this->content,
            ]);
            $this->emit('updated');
        } else {
            News::create(
                [
                    'title' => $this->title,
                    'slug' => str($this->title)->slug(),
                    'subtitle' => $this->subtitle,
                    'content' => $this->content,
                ]
            );
            $this->emit('created');
        }
    }
}
