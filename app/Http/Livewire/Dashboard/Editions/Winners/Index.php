<?php

namespace App\Http\Livewire\Dashboard\Editions\Winners;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Candidate;
use App\Models\Country;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\Winner;
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
        'year' => 'Año',
        'edition_id' => 'Edición',
        'country_id' => 'País',
        'first_name' => 'Nombre'
    ];

    public $confirmingDeleteWinner, $winnerToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $winners = Winner::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->country_id) {
            $candidates = Candidate::where('country_id', $this->country_id)->get();
            foreach ($candidates as $key => $value) {
                $winners->where('candidate_id', $value['id']);
            }
        }

        if ($this->edition_id) {
            $winners->where('edition_id', $this->edition_id);
        }

        $winners = $winners->paginate($this->pagination);
        return view('livewire.dashboard.editions.winners.index', compact('winners'));
    }

    public function selectedWinnerToDelete(Winner $winner)
    {
        $this->confirmingDeleteWinner = true;
        $this->winnerToDelete = $winner;
    }

    public function delete()
    {
        $this->confirmingDeleteWinner = false;
        $this->winnerToDelete->delete();
        $this->emit('deleted');
    }
}
