<?php

namespace App\Http\Livewire\Dashboard\Editions\Quarterfinalists;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Candidate;
use App\Models\Country;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\Quarterfinalist;
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

    public $confirmingDeleteQuarterfinalist, $quarterfinalistUpToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $quarterfinalists = Quarterfinalist::orderBy($this->sortColumn, $this->sortDirection);
        if ($this->country_id) {
            $candidates = Candidate::where('country_id', $this->country_id)->get();
            foreach ($candidates as $key => $value) {
                $quarterfinalists->where('candidate_id', $value['id']);
            }
        }

        if ($this->edition_id) {
            $quarterfinalists->where('edition_id', $this->edition_id);
        }

        $quarterfinalists = $quarterfinalists->paginate($this->pagination);
        return view('livewire.dashboard.editions.quarterfinalists.index', compact('quarterfinalists'))->layout('layouts.dashboard.pages');
    }

    public function selectedQuarterfinalistToDelete(Quarterfinalist $quarterfinalist)
    {
        $this->confirmingDeleteQuarterfinalist = true;
        $this->quarterfinalistToDelete = $quarterfinalist;
    }

    public function delete()
    {
        $this->confirmingDeleteQuarterfinalist = false;
        $this->quarterfinalistToDelete->delete();
        $this->emit('deleted');
    }

    public function close_delete_modal()
    {
        $this->confirmingDeleteQuarterfinalist = false;
    }
}
