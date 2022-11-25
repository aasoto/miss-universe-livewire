<?php

namespace App\Http\Livewire\Dashboard\Editions\Debuts;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Country;
use App\Models\Editions\Debut;
use App\Models\Editions\MissUniverse;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use Order;

    protected $queryString = ['country_id', 'edition_id', 'pagination', 'sortColumn', 'sortDirection'];

    public $pagination = 10;

    public $countries, $editions;

    public $country_id, $edition_id;

    public $columns = [
        'id' => 'ID',
        '' => 'Year',
        'edition_id' => 'Edition',
        'country_id' => 'Country'
    ];

    public $confirmingDeleteDebut, $debutToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $debuts = Debut::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->country_id) {
            $debuts->where('country_id', $this->country_id);
        }

        if ($this->edition_id) {
            $debuts->where('edition_id', $this->edition_id);
        }

        $debuts = $debuts->paginate($this->pagination);
        return view('livewire.dashboard.editions.debuts.index', compact('debuts'))->layout('layouts.dashboard.pages');
    }

    public function selectedDebutToDelete(Debut $debut)
    {
        $this->confirmingDeleteDebut = true;
        $this->debutToDelete = $debut;
    }

    public function delete()
    {
        $this->confirmingDeleteDebut = false;
        $this->debutToDelete->delete();
        $this->emit('deleted');
    }
}
