<?php

namespace App\Http\Livewire\Web;

use App\Models\Carousel;
use App\Models\Editions\MissUniverse;
use App\Models\News;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ["slug_edition"];

    public $carousels, $news, $editions, $current_slug_edition;

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

        $this->editions = MissUniverse::get();
        for ($i=0; $i < count($this->editions); $i++) {
            $this->editions[$i]->description = str($this->editions[$i]->description)->substr(0, 250);
            $this->editions[$i]->description = $this->editions[$i]->description.'...</p>';
        }
        $this->editions = json_decode(json_encode($this->editions));
        return view('livewire.web.index')->layout('layouts.web.layout');
    }

    function slug_edition ($slug)
    {
        $this->current_slug_edition = $slug;
    }
}
