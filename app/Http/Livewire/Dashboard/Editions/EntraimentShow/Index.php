<?php

namespace App\Http\Livewire\Dashboard\Editions\EntraimentShow;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Country;
use App\Models\Editions\EntraimentShow;
use App\Models\Editions\MissUniverse;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use Order;

    protected $queryString = ['country_id', 'edition_id', 'search', 'pagination', 'sortColumn', 'sortDirection'];

    public $pagination = 10;

    public $search;

    public $editions, $countries;

    public $edition_id, $country_id;

    public $acts = [
        'opening' => 'Inicio',
        'swimsuit' => 'Traje de baño',
        'evening_gown' => 'Vestido de noche',
        'final_look' => 'Desfile final',
        'other' => 'Otro'
    ];

    public $columns = [
        'id' => 'ID',
        'artist' => 'Artista',
        'country_id' => 'País',
        'edition_id' => 'Edición',
        'act_performing' => 'Acto'
    ];

    public $confirmingDeleteEntraimentShow, $entraimentToDelete;

    public function render()
    {
        $this->editions = MissUniverse::pluck('id', 'name');
        $this->countries = Country::pluck('id', 'name');
        $entraiment_shows = EntraimentShow::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->search) {
            $entraiment_shows->where( function ($query) {
                $query->orWhere('id', 'like', '%'.$this->search.'%')
                ->orWhere('artist', 'like', '%'.$this->search.'%')
                ->orWhere('act_performing', 'like', '%'.$this->search.'%');
            });
        }

        if ($this->country_id) {
            $entraiment_shows->where('country_id', $this->country_id);
        }

        if ($this->edition_id) {
            $entraiment_shows->where('edition_id', $this->edition_id);
        }

        $entraiment_shows = $entraiment_shows->paginate($this->pagination);
        return view('livewire.dashboard.editions.entraiment-show.index', compact('entraiment_shows'));
    }

    public function selectedEntraimentShowToDelete(EntraimentShow $entraiment_show)
    {
        $this->confirmingDeleteEntraimentShow = true;
        $this->entraimentShowToDelete = $entraiment_show;
    }

    public function delete()
    {
        $this->confirmingDeleteEntraimentShow = false;
        $this->entraimentShowToDelete->delete();
        $this->emit('deleted');
    }
}
