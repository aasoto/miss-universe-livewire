<?php

namespace App\Http\Livewire\Dashboard\Editions\MissCongeniality;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Candidate;
use App\Models\Country;
use App\Models\Editions\MissCongeniality;
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

    public $confirmingDeleteCongeniality, $congenialityToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $congenialities = MissCongeniality::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->country_id) {
            $candidates = Candidate::where('country_id', $this->country_id)->get();
            foreach ($candidates as $key => $value) {
                $congenialities->where('candidate_id', $value['id']);
            }
        }

        if ($this->edition_id) {
            $congenialities->where('edition_id', $this->edition_id);
        }

        $congenialities = $congenialities->paginate($this->pagination);
        return view('livewire.dashboard.editions.miss-congeniality.index', compact('congenialities'))->layout('layouts.dashboard.pages');
    }

    public function selectedCongenialityToDelete(MissCongeniality $congeniality)
    {
        $this->confirmingDeleteCongeniality = true;
        $this->congenialityToDelete = $congeniality;
    }

    public function delete()
    {
        $this->confirmingDeleteCongeniality = false;
        $this->congenialityToDelete->delete();
        $this->emit('deleted');
    }

    public function close_delete_modal()
    {
        $this->confirmingDeleteCongeniality = false;
    }
}
