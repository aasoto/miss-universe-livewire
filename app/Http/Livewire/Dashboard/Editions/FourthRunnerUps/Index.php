<?php

namespace App\Http\Livewire\Dashboard\Editions\FourthRunnerUps;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Country;
use App\Models\Editions\FourthRunnerUp;
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

    public $confirmingDeleteFourthRunnerUp, $fourthRunnerUpToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $fourth_runner_ups = FourthRunnerUp::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->country_id) {
            $candidates = Candidate::where('country_id', $this->country_id)->get();
            foreach ($candidates as $key => $value) {
                $fourth_runner_ups->where('candidate_id', $value['id']);
            }
        }

        if ($this->edition_id) {
            $fourth_runner_ups->where('edition_id', $this->edition_id);
        }

        $fourth_runner_ups = $fourth_runner_ups->paginate($this->pagination);
        return view('livewire.dashboard.editions.fourth-runner-ups.index', compact('fourth_runner_ups'))->layout('layouts.dashboard.pages');
    }

    public function selectedFourthRunnerUpToDelete(FourthRunnerUp $fourth_runner_up)
    {
        $this->confirmingDeleteFourthRunnerUp = true;
        $this->fourthRunnerUpToDelete = $fourth_runner_up;
    }

    public function delete()
    {
        $this->confirmingDeleteFourthRunnerUp = false;
        $this->fourthRunnerUpToDelete->delete();
        $this->emit('deleted');
    }

    public function close_delete_modal()
    {
        $this->confirmingDeleteFourthRunnerUp = false;
    }
}
