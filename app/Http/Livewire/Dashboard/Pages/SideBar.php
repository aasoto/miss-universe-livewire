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
        if (strpos(url()->current(), 'edit')) {
            $this->colour = 'from-yellow-400 dark:from-yellow-300 via-yellow-500 dark:via-yellow-400 to-orange-500 dark:to-orange-400';
            $this->redirect = '../'.$this->redirect;
            $this->list_blur_shadow = 'group-hover:bg-yellow-200 dark:group-hover:bg-yellow-900/30';
        }
        return view('livewire.dashboard.pages.side-bar');
    }
}
