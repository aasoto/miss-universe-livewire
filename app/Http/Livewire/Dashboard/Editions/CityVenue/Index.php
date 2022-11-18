<?php

namespace App\Http\Livewire\Dashboard\Editions\CityVenue;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Country;
use App\Models\Editions\CityVenue;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use Order;

    protected $queryString = ['country_id', 'search', 'pagination', 'sortColumn', 'sortDirection'];

    public $pagination = 10;

    public $search;

    public $countries;

    public $country_id;

    public $columns = [
        'id' => 'ID',
        'city' => 'Ciudad',
        'state' => 'Estado',
        'country_id' => 'País'
    ];

    public $confirmingDeleteCityVenue, $cityVenueToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $city_venues = CityVenue::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->search) {
            $city_venues->where( function ($query) {
                $query->orWhere('id', 'like', '%'.$this->search.'%')
                ->orWhere('city', 'like', '%'.$this->search.'%')
                ->orWhere('state', 'like', '%'.$this->search.'%');
            });
        }

        if ($this->country_id) {
            $city_venues->where('country_id', $this->country_id);
        }

       $city_venues = $city_venues->paginate($this->pagination);
        return view('livewire.dashboard.editions.city-venue.index', compact('city_venues'))->layout('layouts.dashboard.pages');
    }

    public function selectedCityVenueToDelete(CityVenue $city_venue)
    {
        $this->confirmingDeleteCityVenue = true;
        $this->cityVenueToDelete = $city_venue;
    }

    public function delete()
    {
        $this->confirmingDeleteCityVenue = false;
        $this->cityVenueToDelete->delete();
        $this->emit('deleted');
    }
}
