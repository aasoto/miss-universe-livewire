<?php

namespace App\Http\Livewire\Dashboard\Editions\Places;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\CityVenue;
use App\Models\Editions\Place;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use Order;

    protected $queryString = ['city_venue_id', 'search', 'pagination', 'sortColumn', 'sortDirection'];

    public $pagination = 10;

    public $search;

    public $city_venues;

    public $city_venue_id;

    public $columns = [
        'id' => 'ID',
        'name' => 'Lugar',
        'city_venue' => 'Ciudad'
    ];

    public $confirmingDeletePlace, $placeToDelete;

    public function render()
    {
        $this->city_venues = CityVenue::get();
        $places = Place::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->search) {
            $places->where( function ($query) {
                $query->orWhere('id', 'like', '%'.$this->search.'%')
                ->orWhere('name', 'like', '%'.$this->search.'%');
            });
        }

        if ($this->city_venue_id) {
            $places->where('city_venue_id', $this->city_venue_id);
        }

        $places = $places->paginate($this->pagination);

        return view('livewire.dashboard.editions.places.index', compact('places'))->layout('layouts.dashboard.pages');
    }

    public function selectedPlaceToDelete(Place $place)
    {
        $this->confirmingDeletePlace = true;
        $this->placeToDelete = $place;
    }

    public function delete()
    {
        $this->confirmingDeletePlace = false;
        $this->placeToDelete->delete();
        $this->emit('deleted');
    }
}
