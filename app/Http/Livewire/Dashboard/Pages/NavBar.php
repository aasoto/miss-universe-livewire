<?php

namespace App\Http\Livewire\Dashboard\Pages;

use Livewire\Component;

class NavBar extends Component
{
    public $profile_photo, $name, $role;

    public function mount($redirect)
    {
        $this->redirect = $redirect;
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
        return view('livewire.dashboard.pages.nav-bar');
    }
}
