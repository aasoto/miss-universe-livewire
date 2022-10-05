<?php

namespace App\Http\Livewire\Dashboard\Editions\Broadcaster;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Country;
use App\Models\Editions\Broadcaster;
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
        'country_id' => 'País',
        'logo' => 'Logo',
        'name' => 'Nombre'
    ];

    public $confirmingDeleteBroadcaster, $broadcasterToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $broadcasters = Broadcaster::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->search) {
            $broadcasters->where( function ($query) {
                $query->orWhere('id', 'like', '%'.$this->search.'%')
                ->orWhere('name', 'like', '%'.$this->search.'%');
            });
        }

        if ($this->country_id) {
            $broadcasters->where('country_id', $this->country_id);
        }

       $broadcasters =$broadcasters->paginate($this->pagination);
        return view('livewire.dashboard.editions.broadcaster.index', compact('broadcasters'));
    }

    public function selectedBroadcastToDelete(Broadcaster $broadcaster)
    {
        $this->confirmingDeleteBroadcaster = true;
        $this->broadcasterToDelete = $broadcaster;
    }

    public function delete()
    {
        $this->confirmingDeleteBroadcaster = false;
        $this->broadcasterToDelete->delete();
        $this->emit('deleted');
    }
}
