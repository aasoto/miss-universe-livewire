<?php

namespace App\Http\Livewire\Dashboard\Pages;

use Livewire\Component;

class CoverImage extends Component
{
    public $title, $cover_image, $redirect = '';

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

        /****************** CAROUSEL *************** */
        if (strpos(url()->current(), 'dashboard/carousel')) {
            $this->title = 'List of carousel items';
        }
        if (strpos(url()->current(), 'carousel/create')) {
            $this->title = 'Add item';
        }
        if (strpos(url()->current(), 'carousel/edit')) {
            $this->title = 'Modify item';
            $this->cover_image = '../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /*************------ EDITIONS ------****************** */
        /****************** BROADCASTER *************** */
        if (strpos(url()->current(), 'dashboard/editions/broadcaster')) {
            $this->title = 'List of broadcasters';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/broadcaster/create')) {
            $this->title = 'Add broadcaster';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/broadcaster/edit')) {
            $this->title = 'Modify broadcaster';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** CITY VENUE *************** */
        if (strpos(url()->current(), 'dashboard/editions/city_venue')) {
            $this->title = 'List of cities venue';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/city_venue/create')) {
            $this->title = 'Add cities venue';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/city_venue/edit')) {
            $this->title = 'Modify cities venue';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** PLACE *************** */
        if (strpos(url()->current(), 'dashboard/editions/place')) {
            $this->title = 'List of places';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/place/create')) {
            $this->title = 'Add places';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/place/edit')) {
            $this->title = 'Modify place';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** PRESENTER *************** */
        if (strpos(url()->current(), 'dashboard/editions/presenter')) {
            $this->title = 'List of presenters';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/presenter/create')) {
            $this->title = 'Add presenter';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/presenter/edit')) {
            $this->title = 'Modify presenter';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** MISS UNIVERSE *************** */
        if (strpos(url()->current(), 'dashboard/editions/miss_universe')) {
            $this->title = 'List of Miss Universe Editions';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/miss_universe/create')) {
            $this->title = 'Add Edition';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/miss_universe/edit')) {
            $this->title = 'Modify Miss Universe Edition';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** ENTERTAINMENT SHOW *************** */
        if (strpos(url()->current(), 'dashboard/editions/entertainment_show')) {
            $this->title = 'List of entertainment shows';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/entertainment_show/create')) {
            $this->title = 'Add entertainment show';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/entertainment_show/edit')) {
            $this->title = 'Modify entertaiment show';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** DEBUTS *************** */
        if (strpos(url()->current(), 'dashboard/editions/debut')) {
            $this->title = 'List of debuts';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/debut/create')) {
            $this->title = 'Add debut';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/debut/edit')) {
            $this->title = 'Modify debut';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** DEBUTS *************** */
        if (strpos(url()->current(), 'dashboard/editions/withdrawal')) {
            $this->title = 'List of withdrawals';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/withdrawal/create')) {
            $this->title = 'Add withdrawal';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/withdrawal/edit')) {
            $this->title = 'Modify withdrawal';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        if ($this->title == null) {
            $this->title = '';
        }
    }
}
