<?php

namespace App\Http\Livewire\Dashboard\NationalCommittee;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Country;
use App\Models\NationalCommittee;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use Order;

    protected $queryString = ['country_id', 'business_name', 'national_director'];

    public $pagination = 10;

    public $country_id, $business_name, $national_director;

    public $search;

    public $columns = [
        'id' => 'ID',
        'country_id' => 'País',
        'business_name' => 'Razón social',
        'national_director' => 'Director nacional'
    ];

    public $confirmingDeleteNationalCommittee, $nationalCommitteeToDelete;

    public function render()
    {
        $national_committees = NationalCommittee::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->search) {
            $national_committees->where( function ($query) {
                $query->orWhere('id', 'like', '%'.$this->search.'%')
                ->orWhere('business_name', 'like', '%'.$this->search.'%')
                ->orWhere('national_director', 'like', '%'.$this->search.'%');
            });
        }

        if ($this->country_id) {
            $national_committees->where('country_id', $this->country_id);
        }

        $national_committees = $national_committees->paginate($this->pagination);
        $countries = Country::pluck('id', 'name');
        return view('livewire.dashboard.national-committee.index', compact('national_committees', 'countries'));
    }

    public function selectedNationalCommitteeToDelete(NationalCommittee $nationalcommittee)
    {
        $this->confirmingDeleteNationalCommittee = true;
        $this->nationalCommitteeToDelete = $nationalcommittee;
    }

    public function delete()
    {
        $this->confirmingDeleteNationalCommittee = false;
        $this->nationalCommitteeToDelete->delete();
        $this->emit('deleted');
    }
}
