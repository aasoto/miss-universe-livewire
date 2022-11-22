<?php

namespace App\Http\Livewire\Dashboard\Editions\SecondRunnerUps;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Country;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\SecondRunnerUp;
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

    public $confirmingDeleteSecondRunnerUp, $secondRunnerUpToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $second_runner_ups = SecondRunnerUp::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->country_id) {
            $candidates = Candidate::where('country_id', $this->country_id)->get();
            foreach ($candidates as $key => $value) {
                $second_runner_ups->where('candidate_id', $value['id']);
            }
        }

        if ($this->edition_id) {
            $second_runner_ups->where('edition_id', $this->edition_id);
        }

        $second_runner_ups = $second_runner_ups->paginate($this->pagination);
        return view('livewire.dashboard.editions.second-runner-ups.index', compact('second_runner_ups'))->layout('layouts.dashboard.pages');
    }

    public function selectedSecondRunnerUpToDelete(SecondRunnerUp $second_runner_up)
    {
        $this->confirmingDeleteSecondRunnerUp = true;
        $this->secondRunnerUpToDelete = $second_runner_up;
    }

    public function delete()
    {
        $this->confirmingDeleteSecondRunnerUp = false;
        $this->secondRunnerUpToDelete->delete();
        $this->emit('deleted');
    }

    public function close_delete_modal()
    {
        $this->confirmingDeleteSecondRunnerUp = false;
    }
}
