<?php

namespace App\Http\Livewire\Web\Navigation;

use Livewire\Component;

class Menu extends Component
{
    public $redirect;

    public function render()
    {
        $this->redirection();
        return view('livewire.web.navigation.menu');
    }

    public function redirection()
    {
        if (strpos(url()->current(), 'editions')) {
            $this->redirect = '../';
        }
    }
}
