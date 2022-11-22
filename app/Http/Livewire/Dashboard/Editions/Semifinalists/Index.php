<?php

namespace App\Http\Livewire\Dashboard\Editions\Semifinalists;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Candidate;
use App\Models\Country;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\Semifinalist;
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
        'year' => 'Year',
        'edition_id' => 'Edition',
        'country_id' => 'Country',
        'first_name' => 'Contestant'
    ];

    public $confirmingDeleteSemifinalist, $semifinalistUpToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $semifinalists = Semifinalist::orderBy($this->sortColumn, $this->sortDirection);
        if ($this->country_id) {
            $candidates = Candidate::where('country_id', $this->country_id)->get();
            foreach ($candidates as $key => $value) {
                $semifinalists->where('candidate_id', $value['id']);
            }
        }

        if ($this->edition_id) {
            $semifinalists->where('edition_id', $this->edition_id);
        }

        $semifinalists = $semifinalists->paginate($this->pagination);
        return view('livewire.dashboard.editions.semifinalists.index', compact('semifinalists'))->layout('layouts.dashboard.pages');
    }

    public function selectedSemifinalistToDelete(Semifinalist $semifinalist)
    {
        $this->confirmingDeleteSemifinalist = true;
        $this->semifinalistToDelete = $semifinalist;
    }

    public function delete()
    {
        $this->confirmingDeleteSemifinalist = false;
        $this->semifinalistToDelete->delete();
        $this->emit('deleted');
    }

    public function close_delete_modal()
    {
        $this->confirmingDeleteSemifinalist = false;
    }
}
