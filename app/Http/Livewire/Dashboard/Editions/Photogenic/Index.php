<?php

namespace App\Http\Livewire\Dashboard\Editions\Photogenic;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Candidate;
use App\Models\Country;
use App\Models\Editions\MissUniverse;
use App\Models\Editions\Photogenic;
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

    public $confirmingDeletePhotogenic, $photogenicToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->editions = MissUniverse::pluck('id', 'name');
        $photogenics = Photogenic::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->country_id) {
            $candidates = Candidate::where('country_id', $this->country_id)->get();
            foreach ($candidates as $key => $value) {
                $photogenics->where('candidate_id', $value['id']);
            }
        }

        if ($this->edition_id) {
            $photogenics->where('edition_id', $this->edition_id);
        }

        $photogenics = $photogenics->paginate($this->pagination);
        return view('livewire.dashboard.editions.photogenic.index', compact('photogenics'))->layout('layouts.dashboard.pages');
    }

    public function selectedPhotogenicToDelete(Photogenic $photogenic)
    {
        $this->confirmingDeletePhotogenic = true;
        $this->photogenicToDelete = $photogenic;
    }

    public function delete()
    {
        $this->confirmingDeletePhotogenic = false;
        $this->photogenicToDelete->delete();
        $this->emit('deleted');
    }

    public function close_delete_modal()
    {
        $this->confirmingDeletePhotogenic = false;
    }
}
