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
        $this->costumize_section();
        return view('livewire.dashboard.pages.side-bar');
    }

    public function costumize_section ()
    {
        if (strpos(url()->current(), 'editions')) {
            $this->redirect = '../'.$this->redirect;
            if (strpos(url()->current(), 'create') && strpos(url()->current(), 'editions')) {
                $this->colour = 'from-lime-400 dark:from-lime-300 via-lime-700 dark:via-lime-500 to-green-800 dark:to-green-700';
                $this->redirect = $this->redirect;
                $this->list_blur_shadow = 'group-hover:bg-lime-200 dark:group-hover:bg-lime-900/30';
            }

            if (strpos(url()->current(), 'edit/') && strpos(url()->current(), 'editions')) {
                $this->colour = 'from-yellow-400 dark:from-yellow-300 via-yellow-500 dark:via-yellow-400 to-orange-500 dark:to-orange-400';
                $this->redirect = '../'.$this->redirect;
                $this->list_blur_shadow = 'group-hover:bg-yellow-200 dark:group-hover:bg-yellow-900/30';
            }
            return;
        }

        if (strpos(url()->current(), 'edit/')) {
            $this->colour = 'from-yellow-400 dark:from-yellow-300 via-yellow-500 dark:via-yellow-400 to-orange-500 dark:to-orange-400';
            $this->redirect = '../'.$this->redirect;
            $this->list_blur_shadow = 'group-hover:bg-yellow-200 dark:group-hover:bg-yellow-900/30';
        } elseif (strpos(url()->current(), 'create')) {
            $this->colour = 'from-lime-400 dark:from-lime-300 via-lime-700 dark:via-lime-500 to-green-800 dark:to-green-700';
            $this->redirect = $this->redirect;
            $this->list_blur_shadow = 'group-hover:bg-lime-200 dark:group-hover:bg-lime-900/30';
        } else {
            $this->colour = 'from-cyan-400 dark:from-cyan-300 via-sky-700 dark:via-sky-500 to-blue-800 dark:to-blue-700';
            $this->redirect = $this->redirect;
            $this->list_blur_shadow = 'group-hover:bg-cyan-100 dark:group-hover:bg-blue-900/30';
        }

    }
}
