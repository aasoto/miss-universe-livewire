<?php

namespace App\Http\Livewire\Dashboard\Editions\BestNationalCostumes;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Candidate;
use App\Models\Country;
use App\Models\Editions\BestNationalCostume;
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

    public $confirmingDeleteBestNationalCostume, $bestNationalCostumeToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $best_national_costumes = BestNationalCostume::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->country_id) {
            $candidates = Candidate::where('country_id', $this->country_id)->get();
            foreach ($candidates as $key => $value) {
                $best_national_costumes->where('candidate_id', $value['id']);
            }
        }

        if ($this->edition_id) {
            $best_national_costumes->where('edition_id', $this->edition_id);
        }

        $best_national_costumes = $best_national_costumes->paginate($this->pagination);
        return view('livewire.dashboard.editions.best-national-costumes.index', compact('best_national_costumes'));
    }

    public function selectedBestNationalCostumeToDelete(BestNationalCostume $best_national_costume)
    {
        $this->confirmingDeleteBestNationalCostume = true;
        $this->bestNationalCostumeToDelete = $best_national_costume;
    }

    public function delete()
    {
        $this->confirmingDeleteBestNationalCostume = false;
        $this->bestNationalCostumeToDelete->delete();
        $this->emit('deleted');
    }

    public function close_delete_modal()
    {
        $this->confirmingDeleteBestNationalCostume = false;
    }
}
