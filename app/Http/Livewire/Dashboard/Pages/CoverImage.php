<?php

namespace App\Http\Livewire\Dashboard\Pages;

use Livewire\Component;

class CoverImage extends Component
{
    public $title, $cover_image;

    public function mount ($cover_image)
    {
        $this->cover_image = $cover_image;
    }

    public function render()
    {
        $this->guess_title();

        return view('livewire.dashboard.pages.cover-image');
    }

    public function guess_title ()
    {
        /****************** CANDIDATES *************** */
        if (strpos(url()->current(), 'dashboard/candidate')) {
            $this->title = 'List of candidates';
        }
        if (strpos(url()->current(), 'candidate/create')) {
            $this->title = 'Add candidate';
        }
        if (strpos(url()->current(), 'candidate/edit')) {
            $this->title = 'Modify candidate';
            $this->cover_image = '../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** NATIONAL COMMITTEES *************** */
        if (strpos(url()->current(), 'dashboard/national-committee')) {
            $this->title = 'List of national committees';
        }
        if (strpos(url()->current(), 'national-committee/create')) {
            $this->title = 'Add national committee';
        }
        if (strpos(url()->current(), 'national-committee/edit')) {
            $this->title = 'Modify national committee';
            $this->cover_image = '../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }
        if ($this->title == null) {
            $this->title = '';
        }

        /****************** NEWS *************** */
        if (strpos(url()->current(), 'dashboard/news')) {
            $this->title = 'List of news';
        }
        if (strpos(url()->current(), 'news/create')) {
            $this->title = 'Add news';
        }
        if (strpos(url()->current(), 'news/edit')) {
            $this->title = 'Modify news';
            $this->cover_image = '../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }
    }
}
