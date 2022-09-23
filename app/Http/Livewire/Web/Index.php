<?php

namespace App\Http\Livewire\Web;

use App\Models\Carousel;
use Livewire\Component;

class Index extends Component
{
    public $carousels;

    public function render()
    {
        $this->carousels = Carousel::where('visible', true)->orderBy('number')->get()->toArray();
        $this->carousels = json_encode($this->carousels);
        $this->carousels = json_decode($this->carousels);
        return view('livewire.web.index')->layout('layouts.web.layout');
    }
}
