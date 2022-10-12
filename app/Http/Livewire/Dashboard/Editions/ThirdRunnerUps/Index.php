<?php

namespace App\Http\Livewire\Dashboard\Editions\ThirdRunnerUps;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Country;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\ThirdRunnerUp;
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

    public $confirmingDeleteThirdRunnerUp, $thirdRunnerUpToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $third_runner_ups = ThirdRunnerUp::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->country_id) {
            $candidates = Candidate::where('country_id', $this->country_id)->get();
            foreach ($candidates as $key => $value) {
                $third_runner_ups->where('candidate_id', $value['id']);
            }
        }

        if ($this->edition_id) {
            $third_runner_ups->where('edition_id', $this->edition_id);
        }

        $third_runner_ups = $third_runner_ups->paginate($this->pagination);
        return view('livewire.dashboard.editions.third-runner-ups.index', compact('third_runner_ups'));
    }

    public function selectedThirdRunnerUpToDelete(ThirdRunnerUp $third_runner_up)
    {
        $this->confirmingDeleteThirdRunnerUp = true;
        $this->thirdRunnerUpToDelete = $third_runner_up;
    }

    public function delete()
    {
        $this->confirmingDeleteThirdRunnerUp = false;
        $this->thirdRunnerUpToDelete->delete();
        $this->emit('deleted');
    }

    public function close_delete_modal()
    {
        $this->confirmingDeleteThirdRunnerUp = false;
    }
}
