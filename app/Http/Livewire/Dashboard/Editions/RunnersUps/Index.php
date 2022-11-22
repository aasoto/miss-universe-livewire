<?php

namespace App\Http\Livewire\Dashboard\Editions\RunnersUps;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Candidate;
use App\Models\Country;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\RunnersUp;
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

    public $confirmingDeleteRunnerUp, $runnerUpToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $runners_ups = RunnersUp::orderBy($this->sortColumn, $this->sortDirection);
        if ($this->country_id) {
            $candidates = Candidate::where('country_id', $this->country_id)->get();
            foreach ($candidates as $key => $value) {
                $runners_ups->where('candidate_id', $value['id']);
            }
        }

        if ($this->edition_id) {
            $runners_ups->where('edition_id', $this->edition_id);
        }

        $runners_ups = $runners_ups->paginate($this->pagination);
        return view('livewire.dashboard.editions.runners-ups.index', compact('runners_ups'))->layout('layouts.dashboard.pages');
    }

    public function selectedRunnerUpToDelete(RunnersUp $runner_up)
    {
        $this->confirmingDeleteRunnerUp = true;
        $this->runnerUpToDelete = $runner_up;
    }

    public function delete()
    {
        $this->confirmingDeleteRunnerUp = false;
        $this->runnerUpToDelete->delete();
        $this->emit('deleted');
    }

    public function close_delete_modal()
    {
        $this->confirmingDeleteRunnerUp = false;
    }
}
