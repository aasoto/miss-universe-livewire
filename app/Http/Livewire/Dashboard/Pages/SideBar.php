<?php

namespace App\Http\Livewire\Dashboard\Pages;

use Livewire\Component;

class SideBar extends Component
{
    public $colour, $redirect, $list_blur_shadow;

    public function mount($colour, $redirect, $list_blur_shadow)
    {
        $this->colour = $colour;
        $this->redirect = $redirect;
        $this->list_blur_shadow = $list_blur_shadow;
    }

    public function render()
    {
        return view('livewire.dashboard.pages.side-bar');
    }
}
