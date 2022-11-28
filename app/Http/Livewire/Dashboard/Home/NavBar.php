<?php

namespace App\Http\Livewire\Dashboard\Home;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavBar extends Component
{
    public $profile_photo, $name, $roles;

    public function render()
    {
        $this->profile_photo = auth()->user()->profile_photo_path;
        $this->name = auth()->user()->name;
        if (auth()->user()->roles == 'admin') {
            $this->roles = 'Administrator';
        } else {
            if (auth()->user()->role == 'normal') {
                $this->roles = 'Editor';
            } else {
                $this->roles = 'Unknown';
            }
        }
        return view('livewire.dashboard.home.nav-bar');
    }
}
