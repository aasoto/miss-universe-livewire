<?php

namespace App\Http\Livewire\Dashboard\Editions\CityVenue;

use App\Models\Country;
use App\Models\Editions\CityVenue;
use Livewire\Component;

class Save extends Component
{

    public $countries;

    public $city, $state;

    public $country_id;

    public $city_venue;

    public $send_button;

    protected $rules = [
        'country_id' => 'required|integer',
        'city' => 'required|max:200|string',
        'state' => 'nullable|max:200|string'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->city_venue = CityVenue::findOrFail($id);
            $this->country_id = $this->city_venue->country_id;
            $this->city = $this->city_venue->city;
            $this->state = $this->city_venue->state;
        }
    }

    public function render()
    {
        $this->customize_send_button();

        $this->countries = Country::pluck('id', 'name');
        return view('livewire.dashboard.editions.city-venue.save')->layout('layouts.dashboard.add.app');
    }

    public function customize_send_button ()
    {
        if (strpos(url()->current(), 'editions/city_venue/create')) {
            $this->send_button = 'bg-gradient-to-l from-lime-400 via-lime-500 to-green-900';
        }
        if (strpos(url()->current(), 'editions/city_venue/edit')) {
            $this->send_button = 'bg-gradient-to-r from-yellow-400 via-yellow-500 to-orange-700';
        }

    }

    public function submit()
    {
        $this -> validate();

        if ($this->city_venue) {
            $this->city_venue->update([
                'country_id' => $this->country_id,
                'city' => $this->city,
                'state' => $this->state
            ]);
            $this->emit('updated');
        } else {
            $this->city_venue = CityVenue::create([
                'country_id' => $this->country_id,
                'city' => $this->city,
                'state' => $this->state
            ]);
            $this->emit('created');
        }
    }
}
