<?php

namespace App\Http\Livewire\Dashboard\Editions\Eighterfinalists;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Candidate;
use App\Models\Country;
use App\Models\Editions\Eighterfinalist;
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
        'year' => 'Year',
        'edition_id' => 'Edition',
        'country_id' => 'Country',
        'first_name' => 'Contestant'
    ];

    public $confirmingDeleteEighterfinalist, $eighterfinalistToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $eighterfinalists = Eighterfinalist::orderBy($this->sortColumn, $this->sortDirection);
        if ($this->country_id) {
            $candidates = Candidate::where('country_id', $this->country_id)->get();
            foreach ($candidates as $key => $value) {
                $eighterfinalists->where('candidate_id', $value['id']);
            }
        }

        if ($this->edition_id) {
            $eighterfinalists->where('edition_id', $this->edition_id);
        }

        $eighterfinalists = $eighterfinalists->paginate($this->pagination);
        return view('livewire.dashboard.editions.eighterfinalists.index', compact('eighterfinalists'))->layout('layouts.dashboard.pages');
    }

    public function selectedEighterfinalistToDelete(Eighterfinalist $eighterfinalist)
    {
        $this->confirmingDeleteEighterfinalist = true;
        $this->eighterfinalistToDelete = $eighterfinalist;
    }

    public function delete()
    {
        $this->confirmingDeleteEighterfinalist = false;
        $this->eighterfinalistToDelete->delete();
        $this->emit('deleted');
    }

    public function close_delete_modal()
    {
        $this->confirmingDeleteEighterfinalist = false;
    }
}
