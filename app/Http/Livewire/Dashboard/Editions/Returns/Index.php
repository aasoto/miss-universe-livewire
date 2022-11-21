<?php

namespace App\Http\Livewire\Dashboard\Editions\Returns;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Country;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\Returns;
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
        '' => 'Año',
        'edition_id' => 'Edición',
        'country_id' => 'País'
    ];

    public $confirmingDeleteReturn, $returnToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $returns = Returns::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->country_id) {
            $returns->where('country_id', $this->country_id);
        }

        if ($this->edition_id) {
            $returns->where('edition_id', $this->edition_id);
        }

        $returns = $returns->paginate($this->pagination);
        return view('livewire.dashboard.editions.returns.index', compact('returns'))->layout('layouts.dashboard.pages');
    }

    public function selectedReturnToDelete(Returns $return)
    {
        $this->confirmingDeleteReturn = true;
        $this->returnToDelete = $return;
    }

    public function delete()
    {
        $this->confirmingDeleteReturn = false;
        $this->returnToDelete->delete();
        $this->emit('deleted');
    }
}
