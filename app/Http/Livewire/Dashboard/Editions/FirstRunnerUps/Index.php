<?php

namespace App\Http\Livewire\Dashboard\Editions\FirstRunnerUps;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Candidate;
use App\Models\Country;
use App\Models\Editions\FirstRunnerUp;
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

    public $confirmingDeleteFirstRunnerUp, $firstRunnerUpToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $first_runner_ups = FirstRunnerUp::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->country_id) {
            $candidates = Candidate::where('country_id', $this->country_id)->get();
            foreach ($candidates as $key => $value) {
                $first_runner_ups->where('candidate_id', $value['id']);
            }
        }

        if ($this->edition_id) {
            $first_runner_ups->where('edition_id', $this->edition_id);
        }

        $first_runner_ups = $first_runner_ups->paginate($this->pagination);
        return view('livewire.dashboard.editions.first-runner-ups.index', compact('first_runner_ups'))->layout('layouts.dashboard.pages');
    }

    public function selectedFirstRunnerUpToDelete(FirstRunnerUp $first_runner_up)
    {
        $this->confirmingDeleteFirstRunnerUp = true;
        $this->firstRunnerUpToDelete = $first_runner_up;
    }

    public function delete()
    {
        $this->confirmingDeleteFirstRunnerUp = false;
        $this->firstRunnerUpToDelete->delete();
        $this->emit('deleted');
    }

    public function close_delete_modal()
    {
        $this->confirmingDeleteFirstRunnerUp = false;
    }
}
