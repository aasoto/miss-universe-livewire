<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $url = url()->current();
        if (strpos($url, 'teams') || strpos($url, 'profile')){
            return view('layouts.app');
        } else {
            return view('layouts.dashboard.home');
        }
    }
}
