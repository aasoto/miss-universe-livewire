<?php

namespace App\Http\Livewire\Dashboard\NationalCommittee;

use App\Models\NationalCommittee;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $confirmingDeleteNationalCommittee, $nationalCommitteeToDelete;

    public function render()
    {
        $national_committees = NationalCommittee::paginate(10);
        return view('livewire.dashboard.national-committee.index', compact('national_committees'));
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
