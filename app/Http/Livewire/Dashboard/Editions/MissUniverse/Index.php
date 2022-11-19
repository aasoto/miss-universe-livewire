<?php

namespace App\Http\Livewire\Dashboard\Editions\MissUniverse;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Editions\Broadcaster;
use App\Models\Editions\CityVenue;
use App\Models\Editions\MissUniverse;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use Order;

    protected $queryString = ['city_venue_id', 'broadcaster_id', 'search', 'pagination', 'sortColumn', 'sortDirection'];

    public $pagination = 10;

    public $search;

    public $broadcasters, $city_venues;

    public $broadcaster_id, $broadcaster_2, $city_venue_id;

    public $columns = [
        'id' => 'ID',
        'year' => 'Año',
        'name' => 'Nombre',
        'official_name' => 'Nombre Oficial',
        'city_venue_id' => 'Sede',
        'broadcaster_id' => 'Canal de televisión',
        'broadcaster_2' => 'Canal de TV 2'
    ];

    public $confirmingDeleteMissUniverse, $missUniverseToDelete;

    public function render()
    {
        $this->broadcasters = Broadcaster::get();
        $this->city_venues = CityVenue::get();
        $miss_universe = MissUniverse::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->search) {
            $miss_universe->where( function ($query) {
                $query->orWhere('id', 'like', '%'.$this->search.'%')
                ->orWhere('year', 'like', '%'.$this->search.'%')
                ->orWhere('name', 'like', '%'.$this->search.'%')
                ->orWhere('official_name', 'like', '%'.$this->search.'%');
            });
        }

        if ($this->broadcaster_id) {
            $miss_universe->where('broadcaster_id', $this->broadcaster_id);
        }

        if ($this->broadcaster_2) {
            $miss_universe->where('broadcaster_2', $this->broadcaster_2);
        }

        if ($this->city_venue_id) {
            $miss_universe->where('city_venue_id', $this->city_venue_id);
        }

       $miss_universe = $miss_universe->paginate($this->pagination);
        return view('livewire.dashboard.editions.miss-universe.index', compact('miss_universe'))->layout('layouts.dashboard.pages');
    }

    public function searchBroadcaster2($id)
    {
        $name = Broadcaster::where('id', $id)->get('name');
        return $name[0]->name;
    }

    public function selectedMissUniverseToDelete(MissUniverse $miss_universe)
    {
        $this->confirmingDeleteMissUniverse = true;
        $this->missUniverseToDelete = $miss_universe;
    }

    public function delete()
    {
        $this->confirmingDeleteMissUniverse = false;
        $this->missUniverseToDelete->delete();
        $this->emit('deleted');
    }
}
