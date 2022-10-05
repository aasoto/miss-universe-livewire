<?php

namespace App\Http\Livewire\Dashboard\Editions\Places;

use App\Models\Editions\CityVenue;
use App\Models\Editions\Place;
use Livewire\Component;

class Save extends Component
{
    public $city_venues;

    public $name;

    public $city_venue_id;

    public $place;

    protected $rules = [
        'city_venue_id' => 'required|integer',
        'name' => 'required|max:1000|string'
    ];

    public function mount($id = null)
    {
        if ($id != null) {
            $this->place = Place::findOrFail($id);
            $this->city_venue_id = $this->place->city_venue_id;
            $this->name = $this->place->name;
        }
    }

    public function render()
    {
        $this->city_venues = CityVenue::get();
        return view('livewire.dashboard.editions.places.save');
    }

    public function submit()
    {
        $this -> validate();

        if ($this->place) {
            $this->place->update([
                'city_venue_id' => $this->city_venue_id,
                'name' => $this->name
            ]);
            $this->emit('updated');
        } else {
            $this->place = Place::create([
                'city_venue_id' => $this->city_venue_id,
                'name' => $this->name
            ]);
            $this->emit('created');
        }
    }
}
