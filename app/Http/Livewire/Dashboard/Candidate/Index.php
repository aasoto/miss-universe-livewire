<?php

namespace App\Http\Livewire\Dashboard\Candidate;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Candidate;
use App\Models\Country;
use App\Models\NationalCommittee;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use Order;

    protected $listeners = ['redirect_index' => 'render'];

    protected $queryString = ['country_id', 'national_committee_id', 'search', 'pagination', 'sortColumn', 'sortDirection'];

    public $pagination = 10;

    public $search;

    public $countries, $national_committees;

    public $country_id, $national_committee_id;

    public $columns = [
        'id' => 'ID',
        'country_id' => 'Country',
        'first_name' => 'Name',
        'national_committee_id' => 'National committee'
    ];

    public $confirmingDeleteCandidate, $candidateToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $this->national_committees = NationalCommittee::pluck('id', 'business_name');
        $candidates = Candidate::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->search) {
            $candidates->where( function ($query) {
                $query->orWhere('id', 'like', '%'.$this->search.'%')
                ->orWhere('first_name', 'like', '%'.$this->search.'%')
                ->orWhere('second_name', 'like', '%'.$this->search.'%')
                ->orWhere('first_last_name', 'like', '%'.$this->search.'%')
                ->orWhere('second_last_name', 'like', '%'.$this->search.'%');
            });
        }

        if ($this->country_id) {
            $candidates->where('country_id', $this->country_id);
        }
        if ($this->national_committee_id) {
            $candidates->where('national_committee_id', $this->national_committee_id);
        }

        $candidates = $candidates->paginate($this->pagination);
        return view('livewire.dashboard.candidate.index', compact('candidates'))->layout('layouts.dashboard.pages');
    }

    public function selectedCandidateToDelete(Candidate $candidate)
    {
        $this->confirmingDeleteCandidate = true;
        $this->candidateToDelete = $candidate;
    }

    public function delete()
    {
        $this->confirmingDeleteCandidate = false;
        $this->candidateToDelete->delete();
        $this->emit('deleted');
    }
}
