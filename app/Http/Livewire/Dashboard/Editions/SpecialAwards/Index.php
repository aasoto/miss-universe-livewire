<?php

namespace App\Http\Livewire\Dashboard\Editions\SpecialAwards;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Country;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\SpecialAward;
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
        'name' => 'Award',
        'country_id' => 'Country',
        'first_name' => 'Contestant'
    ];

    public $confirmingDeleteSpecialAward, $specialAwardToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $special_awards = SpecialAward::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->country_id) {
            $candidates = Candidate::where('country_id', $this->country_id)->get();
            foreach ($candidates as $key => $value) {
                $special_awards->where('candidate_id', $value['id']);
            }
        }

        if ($this->edition_id) {
            $special_awards->where('edition_id', $this->edition_id);
        }

        $special_awards = $special_awards->paginate($this->pagination);
        return view('livewire.dashboard.editions.special-awards.index', compact('special_awards'));
    }

    public function selectedSpecialAwardToDelete(SpecialAward $special_award)
    {
        $this->confirmingDeleteSpecialAward = true;
        $this->specialAwardToDelete = $special_award;
    }

    public function delete()
    {
        $this->confirmingDeleteSpecialAward = false;
        $this->specialAwardToDelete->delete();
        $this->emit('deleted');
    }

    public function close_delete_modal()
    {
        $this->confirmingDeleteSpecialAward = false;
    }
}
