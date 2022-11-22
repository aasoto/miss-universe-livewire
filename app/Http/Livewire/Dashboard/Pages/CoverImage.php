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

        /****************** WITHDRAWALS *************** */
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

        /****************** RETURNS *************** */
        if (strpos(url()->current(), 'dashboard/editions/return')) {
            $this->title = 'List of returns';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/return/create')) {
            $this->title = 'Add return';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/return/edit')) {
            $this->title = 'Modify return';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** CONTESTANTS *************** */
        if (strpos(url()->current(), 'dashboard/editions/contestant')) {
            $this->title = 'List of contestants';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/contestant/create')) {
            $this->title = 'Add contestant';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/contestant/edit')) {
            $this->title = 'Modify contestant';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** WINNERS *************** */
        if (strpos(url()->current(), 'dashboard/editions/winner')) {
            $this->title = 'List of winners';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/winner/create')) {
            $this->title = 'Add winner';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/winner/edit')) {
            $this->title = 'Modify winner';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** FIRST RUNNER UP *************** */
        if (strpos(url()->current(), 'dashboard/editions/first_runner_up')) {
            $this->title = 'List of first runners up';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/first_runner_up/create')) {
            $this->title = 'Add first runner up';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/first_runner_up/edit')) {
            $this->title = 'Modify first runner up';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** SECOND RUNNER UP *************** */
        if (strpos(url()->current(), 'dashboard/editions/second_runner_up')) {
            $this->title = 'List of second runners up';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/second_runner_up/create')) {
            $this->title = 'Add second runner up';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/second_runner_up/edit')) {
            $this->title = 'Modify second runner up';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** THIRD RUNNER UP *************** */
        if (strpos(url()->current(), 'dashboard/editions/third_runner_up')) {
            $this->title = 'List of thrid runners up';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/third_runner_up/create')) {
            $this->title = 'Add thrid runner up';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/third_runner_up/edit')) {
            $this->title = 'Modify thrid runner up';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** FOURTH RUNNER UP *************** */
        if (strpos(url()->current(), 'dashboard/editions/fourth_runner_up')) {
            $this->title = 'List of fourth runners up';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/fourth_runner_up/create')) {
            $this->title = 'Add fourth runner up';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/fourth_runner_up/edit')) {
            $this->title = 'Modify fourth runner up';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** RUNNERS UP *************** */
        if (strpos(url()->current(), 'dashboard/editions/runners_ups')) {
            $this->title = 'List of runners up';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/runners_ups/create')) {
            $this->title = 'Add runner up';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/runners_ups/edit')) {
            $this->title = 'Modify runner up';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** SEMIFINALISTS *************** */
        if (strpos(url()->current(), 'dashboard/editions/semifinalists')) {
            $this->title = 'List of semifinalists';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/semifinalists/create')) {
            $this->title = 'Add semifinalist';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/semifinalists/edit')) {
            $this->title = 'Modify semifinalist';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** QUARTERFINALISTS *************** */
        if (strpos(url()->current(), 'dashboard/editions/quarterfinalists')) {
            $this->title = 'List of quarterfinalists';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/quarterfinalists/create')) {
            $this->title = 'Add quarterfinalist';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/quarterfinalists/edit')) {
            $this->title = 'Modify quarterfinalist';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        /****************** EIGHTERFINALISTS *************** */
        if (strpos(url()->current(), 'dashboard/editions/eighterfinalists')) {
            $this->title = 'List of eighterfinalists';
            $this->cover_image = '../'.$this->cover_image;
        }
        if (strpos(url()->current(), 'editions/eighterfinalists/create')) {
            $this->title = 'Add eighterfinalist';
            $this->cover_image = $this->cover_image;
        }
        if (strpos(url()->current(), 'editions/eighterfinalists/edit')) {
            $this->title = 'Modify eighterfinalist';
            $this->cover_image = '../../../../../storage/app/public/images/dashboard/cover-images/fondo-naranja.svg';
        }

        if ($this->title == null) {
            $this->title = '';
        }
    }
}
