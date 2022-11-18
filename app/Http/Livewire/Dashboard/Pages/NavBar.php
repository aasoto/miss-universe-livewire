<?php

namespace App\Http\Livewire\Dashboard\Pages;

use Livewire\Component;

class NavBar extends Component
{
    public $profile_photo, $name, $role, $redirect, $check_color;

    public function mount($redirect, $check_color)
    {
        $this->redirect = $redirect;
        $this->check_color = $check_color;
    }

    public function render()
    {
        $this->profile_photo = auth()->user()->profile_photo_path;
        $this->name = auth()->user()->name;
        if (auth()->user()->role == 'admin') {
            $this->role = 'Administrator';
        } else {
            if (auth()->user()->role == 'normal') {
                $this->role = 'Editor';
            } else {
                $this->role = 'Unknown';
            }
        }

        $this->costumize_section();

        return view('livewire.dashboard.pages.nav-bar');
    }

    public function costumize_section ()
    {
        if (strpos(url()->current(), 'edit/')) {
            $this->redirect = '../'.$this->redirect;
            $this->check_color = 'from-yellow-400 dark:from-yellow-300 via-yellow-500 dark:via-yellow-400 to-orange-500 dark:to-orange-400';
        }

        if (strpos(url()->current(), 'editions') && strpos(url()->current(), 'create')) {
            $this->redirect = '../'.$this->redirect;
            $this->check_color = 'from-lime-400 dark:from-lime-300 via-lime-700 dark:via-lime-500 to-green-800 dark:to-green-700';
            return;
        }

        if (strpos(url()->current(), 'editions') && strpos(url()->current(), 'edit/')) {
            $this->redirect = '../'.$this->redirect;
            $this->check_color = 'from-yellow-400 dark:from-yellow-300 via-yellow-500 dark:via-yellow-400 to-orange-500 dark:to-orange-400';
            return;
        }

        if (strpos(url()->current(), 'editions')) {
            $this->redirect = '../'.$this->redirect;
            $this->check_color = 'from-cyan-400 dark:from-cyan-300 via-sky-700 dark:via-sky-500 to-blue-800 dark:to-blue-700';
        }


    }
}
