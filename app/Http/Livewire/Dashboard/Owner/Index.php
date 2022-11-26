<?php

namespace App\Http\Livewire\Dashboard\Owner;

use App\Http\Livewire\Dashboard\Traits\Order;
use App\Models\Country;
use App\Models\Owner;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use Order;

    protected $queryString = ['country_id', 'search', 'pagination', 'sortColumn', 'sortDirection'];

    public $pagination = 10;

    public $search;

    public $countries;

    public $country_id;

    public $columns = [
        'id' => 'ID',
        'country_id' => 'Country',
        'business_name' => 'Business name',
        'owner_name' => 'Owner name'
    ];

    public $confirmingDeleteOwner, $ownerToDelete;

    public function render()
    {
        $this->countries = Country::pluck('id', 'name');
        $owners = Owner::orderBy($this->sortColumn, $this->sortDirection);

        if ($this->search) {
            $owners->where( function ($query) {
                $query->orWhere('business_name', 'like', '%'.$this->search.'%')
                ->orWhere('owner_name', 'like', '%'.$this->search.'%')
                ->orWhere('owner_occupation', 'like', '%'.$this->search.'%');
            });
        }

        if ($this->country_id) {
            $owners->where('country_id', $this->country_id);
        }

        $owners = $owners->paginate($this->pagination);
        return view('livewire.dashboard.owner.index', compact('owners'))->layout('layouts.dashboard.pages');
    }

    public function selectedOwnerToDelete(Owner $owner)
    {
        $this->confirmingDeleteOwner = true;
        $this->candidateToDelete = $owner;
    }

    public function delete()
    {
        $this->confirmingDeleteOwner = false;
        $this->ownerToDelete->delete();
        $this->emit('deleted');
    }
}
