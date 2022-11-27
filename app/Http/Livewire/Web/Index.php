<?php

namespace App\Http\Livewire\Web;

use App\Models\Carousel;
use App\Models\News;
use Livewire\Component;

class Index extends Component
{
    public $carousels, $news;

    public function render()
    {
        $this->carousels = Carousel::where('visible', true)->orderBy('number')->get()->toArray();
        $this->carousels = json_encode($this->carousels);
        $this->carousels = json_decode($this->carousels);
        $this->news = News::orderBy('id', 'desc')->take(8)->get();
        for ($i=0; $i < count($this->news); $i++) {
            $this->news[$i]->content = str($this->news[$i]->content)->substr(0, 250);
        }
        $this->news = json_decode(json_encode($this->news));
        return view('livewire.web.index')->layout('layouts.web.layout');
    }
}
