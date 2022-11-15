<?php

namespace App\Http\Livewire\Dashboard\Pages;

use Livewire\Component;

class CoverImage extends Component
{
    public $text, $cover_image;

    public function mount ($text, $cover_image)
    {
        $this->text = $text;
        $this->cover_image = $cover_image;
    }

    public function render()
    {
        if (strpos(url()->current(), 'edit')) {
            $this->text = 'Modify candidate';
            $this->cover_image = '../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }
        return view('livewire.dashboard.pages.cover-image');
    }
}
